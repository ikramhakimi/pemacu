(() => {
  const INSTANCE_MAP = new WeakMap();
  const BREAKPOINTS = {
    xs: 0,
    sm: 640,
    md: 768,
    lg: 1024,
    xl: 1280,
    '2xl': 1536,
  };

  const DEFAULT_CONFIG = {
    loadingClasses: '',
    dotsItemClasses: 'size-3 rounded-full border border-brand-300 cursor-pointer transition carousel-active:border-brand-600 carousel-active:bg-brand-600',
    isAutoPlay: false,
    autoPlayInterval: 5000,
    isInfiniteLoop: false,
    isSnap: false,
    isCentered: false,
    slidesQty: {
      xs: 1,
    },
    speed: 500,
    startIndex: 0,
    pauseOnHover: true,
    keyboard: true,
    drag: true,
    threshold: 40,
  };

  const to_number = (value, fallback = 0) => {
    const parsed_value = Number(value);
    return Number.isFinite(parsed_value) ? parsed_value : fallback;
  };

  const clamp = (value, min, max) => {
    if (max < min) {
      return min;
    }

    return Math.min(Math.max(value, min), max);
  };

  const mod = (value, total) => {
    if (total <= 0) {
      return 0;
    }

    return ((value % total) + total) % total;
  };

  const split_class_tokens = (class_string) => {
    return String(class_string || '')
      .trim()
      .split(/\s+/)
      .filter(Boolean);
  };

  const parse_json_config = (raw_value) => {
    if (typeof raw_value !== 'string' || raw_value.trim() === '') {
      return {};
    }

    try {
      const parsed = JSON.parse(raw_value);
      return parsed && typeof parsed === 'object' ? parsed : {};
    } catch (_error) {
      return {};
    }
  };

  const normalize_slides_qty = (slides_qty) => {
    if (typeof slides_qty === 'number') {
      return { xs: Math.max(1, Math.floor(slides_qty)) };
    }

    if (!slides_qty || typeof slides_qty !== 'object') {
      return { xs: 1 };
    }

    const resolved = {};

    Object.keys(BREAKPOINTS).forEach((breakpoint_key) => {
      if (!Object.prototype.hasOwnProperty.call(slides_qty, breakpoint_key)) {
        return;
      }

      const breakpoint_value = Math.max(1, Math.floor(to_number(slides_qty[breakpoint_key], 1)));
      resolved[breakpoint_key] = breakpoint_value;
    });

    if (!Object.keys(resolved).length) {
      return { xs: 1 };
    }

    return resolved;
  };

  class Carousel {
    constructor(root_node, override_config = {}) {
      this.root_node = root_node;
      this.viewport_node = root_node.querySelector('.carousel');
      this.body_node = root_node.querySelector('.carousel-body');
      this.slide_nodes = Array.from(root_node.querySelectorAll('.carousel-slide'));
      this.prev_button = root_node.querySelector('.carousel-prev');
      this.next_button = root_node.querySelector('.carousel-next');
      this.pagination_node = root_node.querySelector('.carousel-pagination');
      this.current_info_node = root_node.querySelector('.carousel-info-current');
      this.total_info_node = root_node.querySelector('.carousel-info-total');
      this.autoplay_timer_node = root_node.querySelector('.carousel-autoplay-timer');
      this.autoplay_timer_progress_node = root_node.querySelector('.carousel-autoplay-timer-progress');
      this.autoplay_timer_text_node = root_node.querySelector('.carousel-autoplay-timer-text');

      this.raw_data_config = parse_json_config(this.root_node.getAttribute('data-carousel'));
      this.config = this.resolve_config(override_config);

      this.current_page = 0;
      this.visible_slides = 1;
      this.total_pages = 1;
      this.slide_width = 0;
      this.auto_play_timeout = null;
      this.auto_play_raf = null;
      this.auto_play_started_at = 0;
      this.auto_play_remaining_ms = this.config.autoPlayInterval;
      this.is_ready = false;
      this.is_dragging = false;
      this.drag_started = false;
      this.drag_start_x = 0;
      this.drag_delta_x = 0;
      this.drag_pointer_id = null;
      this.was_playing_before_drag = false;
      this.motion_reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      this.bound_on_prev = this.on_prev.bind(this);
      this.bound_on_next = this.on_next.bind(this);
      this.bound_on_resize = this.on_resize.bind(this);
      this.bound_on_keydown = this.on_keydown.bind(this);
      this.bound_on_mouse_enter = this.on_mouse_enter.bind(this);
      this.bound_on_mouse_leave = this.on_mouse_leave.bind(this);
      this.bound_on_pointer_down = this.on_pointer_down.bind(this);
      this.bound_on_pointer_move = this.on_pointer_move.bind(this);
      this.bound_on_pointer_up = this.on_pointer_up.bind(this);
      this.bound_on_pointer_cancel = this.on_pointer_cancel.bind(this);
    }

    resolve_config(override_config = {}) {
      const merged_config = {
        ...DEFAULT_CONFIG,
        ...this.raw_data_config,
        ...override_config,
      };

      merged_config.loadingClasses = String(merged_config.loadingClasses || '').trim();
      merged_config.dotsItemClasses = String(merged_config.dotsItemClasses || '').trim();
      merged_config.isAutoPlay = Boolean(merged_config.isAutoPlay);
      merged_config.autoPlayInterval = Math.max(1000, Math.floor(to_number(merged_config.autoPlayInterval, 5000)));
      merged_config.isInfiniteLoop = Boolean(merged_config.isInfiniteLoop);
      merged_config.isSnap = Boolean(merged_config.isSnap);
      merged_config.isCentered = Boolean(merged_config.isCentered);
      merged_config.slidesQty = normalize_slides_qty(merged_config.slidesQty);
      merged_config.speed = Math.max(0, Math.floor(to_number(merged_config.speed, 500)));
      merged_config.startIndex = Math.max(0, Math.floor(to_number(merged_config.startIndex, 0)));
      merged_config.pauseOnHover = Boolean(merged_config.pauseOnHover);
      merged_config.keyboard = Boolean(merged_config.keyboard);
      merged_config.drag = Boolean(merged_config.drag);
      merged_config.threshold = Math.max(8, Math.floor(to_number(merged_config.threshold, 40)));

      return merged_config;
    }

    get_effective_speed() {
      return this.motion_reduced ? 0 : this.config.speed;
    }

    get_resolved_visible_slides() {
      const viewport_width = window.innerWidth;
      const slides_qty = this.config.slidesQty;

      const sorted_breakpoints = Object.keys(BREAKPOINTS)
        .sort((key_a, key_b) => BREAKPOINTS[key_a] - BREAKPOINTS[key_b]);

      let resolved = 1;

      sorted_breakpoints.forEach((breakpoint_key) => {
        if (!Object.prototype.hasOwnProperty.call(slides_qty, breakpoint_key)) {
          return;
        }

        if (viewport_width >= BREAKPOINTS[breakpoint_key]) {
          resolved = Math.max(1, to_number(slides_qty[breakpoint_key], resolved));
        }
      });

      return Math.max(1, Math.min(this.slide_nodes.length || 1, Math.floor(resolved)));
    }

    get_payload() {
      return {
        currentIndex: this.current_page,
        totalPages: this.total_pages,
        visibleSlides: this.visible_slides,
        config: this.config,
      };
    }

    dispatch_event(event_name) {
      this.root_node.dispatchEvent(new CustomEvent(event_name, {
        detail: this.get_payload(),
      }));
    }

    is_autoplay_running() {
      return this.auto_play_timeout !== null;
    }

    init() {
      if (!(this.viewport_node instanceof HTMLElement) || !(this.body_node instanceof HTMLElement)) {
        return;
      }

      if (!this.slide_nodes.length) {
        this.remove_loading_state();
        return;
      }

      if (!this.root_node.hasAttribute('tabindex')) {
        this.root_node.setAttribute('tabindex', '0');
      }

      this.apply_static_layout_classes();
      this.attach_events();
      this.update_metrics();
      this.current_page = clamp(this.config.startIndex, 0, this.total_pages - 1);
      this.render(false);
      this.remove_loading_state();
      this.sync_autoplay_timer_ui(0, this.config.autoPlayInterval);
      this.is_ready = true;
      this.dispatch_event('carousel:init');
      this.start_autoplay_if_enabled();
    }

    reset_autoplay_remaining() {
      this.auto_play_remaining_ms = this.config.autoPlayInterval;
    }

    apply_static_layout_classes() {
      this.body_node.style.willChange = 'transform';
      this.body_node.style.transitionProperty = 'transform';
      this.body_node.style.transitionTimingFunction = 'cubic-bezier(0.4, 0, 0.2, 1)';

      this.slide_nodes.forEach((slide_node) => {
        slide_node.style.flexShrink = '0';
      });

      if (this.config.isSnap) {
        this.viewport_node.classList.add('snap-x', 'snap-mandatory');
        this.slide_nodes.forEach((slide_node) => {
          slide_node.classList.add(this.config.isCentered ? 'snap-center' : 'snap-start');
        });
      }

      if (this.config.drag) {
        this.viewport_node.style.touchAction = 'pan-y';
      }
    }

    attach_events() {
      if (this.prev_button instanceof HTMLElement) {
        this.prev_button.addEventListener('click', this.bound_on_prev);
      }

      if (this.next_button instanceof HTMLElement) {
        this.next_button.addEventListener('click', this.bound_on_next);
      }

      if (this.config.keyboard) {
        this.root_node.addEventListener('keydown', this.bound_on_keydown);
      }

      if (this.config.pauseOnHover && this.config.isAutoPlay) {
        this.root_node.addEventListener('mouseenter', this.bound_on_mouse_enter);
        this.root_node.addEventListener('mouseleave', this.bound_on_mouse_leave);
      }

      if (this.config.drag) {
        this.viewport_node.addEventListener('pointerdown', this.bound_on_pointer_down, { passive: true });
        this.viewport_node.addEventListener('pointermove', this.bound_on_pointer_move, { passive: true });
        this.viewport_node.addEventListener('pointerup', this.bound_on_pointer_up, { passive: true });
        this.viewport_node.addEventListener('pointercancel', this.bound_on_pointer_cancel, { passive: true });
        this.viewport_node.addEventListener('lostpointercapture', this.bound_on_pointer_cancel, { passive: true });
      }

      window.addEventListener('resize', this.bound_on_resize, { passive: true });
    }

    detach_events() {
      if (this.prev_button instanceof HTMLElement) {
        this.prev_button.removeEventListener('click', this.bound_on_prev);
      }

      if (this.next_button instanceof HTMLElement) {
        this.next_button.removeEventListener('click', this.bound_on_next);
      }

      this.root_node.removeEventListener('keydown', this.bound_on_keydown);
      this.root_node.removeEventListener('mouseenter', this.bound_on_mouse_enter);
      this.root_node.removeEventListener('mouseleave', this.bound_on_mouse_leave);

      if (this.viewport_node instanceof HTMLElement) {
        this.viewport_node.removeEventListener('pointerdown', this.bound_on_pointer_down);
        this.viewport_node.removeEventListener('pointermove', this.bound_on_pointer_move);
        this.viewport_node.removeEventListener('pointerup', this.bound_on_pointer_up);
        this.viewport_node.removeEventListener('pointercancel', this.bound_on_pointer_cancel);
        this.viewport_node.removeEventListener('lostpointercapture', this.bound_on_pointer_cancel);
      }

      window.removeEventListener('resize', this.bound_on_resize);
    }

    remove_loading_state() {
      split_class_tokens(this.config.loadingClasses).forEach((class_name) => {
        this.root_node.classList.remove(class_name);
      });
    }

    stop_timer_raf() {
      if (this.auto_play_raf === null) {
        return;
      }

      window.cancelAnimationFrame(this.auto_play_raf);
      this.auto_play_raf = null;
    }

    sync_autoplay_timer_ui(progress_value = 0, remaining_ms = this.config.autoPlayInterval) {
      if (!(this.autoplay_timer_progress_node instanceof HTMLElement) || !(this.autoplay_timer_text_node instanceof HTMLElement)) {
        return;
      }

      const clamped_progress = clamp(progress_value, 0, 1);
      const filled_degrees = Math.round(clamped_progress * 360);
      const remaining_seconds = Math.max(0, Math.ceil(remaining_ms / 1000));

      this.autoplay_timer_progress_node.style.background = `conic-gradient(rgb(14 116 144) ${filled_degrees}deg, rgb(203 213 225) ${filled_degrees}deg)`;
      this.autoplay_timer_text_node.textContent = `${remaining_seconds}s`;
    }

    start_timer_raf(duration_ms) {
      this.stop_timer_raf();
      const safe_duration = Math.max(1, duration_ms);

      const run = () => {
        if (!this.is_autoplay_running()) {
          this.stop_timer_raf();
          return;
        }

        const elapsed = Date.now() - this.auto_play_started_at;
        const progress = elapsed / safe_duration;
        const remaining = Math.max(0, safe_duration - elapsed);

        this.sync_autoplay_timer_ui(progress, remaining);

        if (progress >= 1) {
          this.stop_timer_raf();
          return;
        }

        this.auto_play_raf = window.requestAnimationFrame(run);
      };

      run();
    }

    clear_autoplay_timeout() {
      if (this.auto_play_timeout === null) {
        return;
      }

      window.clearTimeout(this.auto_play_timeout);
      this.auto_play_timeout = null;
    }

    schedule_autoplay_tick() {
      this.clear_autoplay_timeout();
      this.auto_play_started_at = Date.now();

      const delay = Math.max(0, Math.floor(this.auto_play_remaining_ms));
      this.start_timer_raf(delay);

      this.auto_play_timeout = window.setTimeout(() => {
        this.reset_autoplay_remaining();
        this.next();
      }, delay);
    }

    restart_autoplay_cycle() {
      if (!this.is_autoplay_running()) {
        return;
      }

      this.reset_autoplay_remaining();
      this.schedule_autoplay_tick();
    }

    update_metrics() {
      this.visible_slides = this.get_resolved_visible_slides();
      this.total_pages = Math.max(1, Math.ceil(this.slide_nodes.length / this.visible_slides));

      if (this.viewport_node instanceof HTMLElement) {
        this.slide_width = this.viewport_node.clientWidth / this.visible_slides;
      }

      this.slide_nodes.forEach((slide_node) => {
        slide_node.style.width = `${100 / this.visible_slides}%`;
      });

      this.build_pagination();
      this.update_info();
      this.update_navigation_state();
    }

    build_pagination() {
      if (!(this.pagination_node instanceof HTMLElement)) {
        return;
      }

      const dot_class_tokens = split_class_tokens(this.config.dotsItemClasses);
      const base_dot_classes = [];
      const active_dot_classes = [];

      dot_class_tokens.forEach((class_name) => {
        if (class_name.startsWith('carousel-active:')) {
          active_dot_classes.push(class_name.replace('carousel-active:', ''));
          return;
        }

        base_dot_classes.push(class_name);
      });

      const dot_nodes = Array.from({ length: this.total_pages }, (_, page_index) => {
        const dot_node = document.createElement('button');
        const is_active = page_index === this.current_page;

        dot_node.type = 'button';
        dot_node.classList.add(...base_dot_classes);
        dot_node.classList.add('carousel-pagination-item');
        dot_node.dataset.carouselPage = String(page_index);
        dot_node.setAttribute('aria-label', `Go to slide group ${page_index + 1}`);

        if (is_active) {
          dot_node.classList.add(...active_dot_classes);
          dot_node.setAttribute('aria-current', 'true');
        }

        dot_node.addEventListener('click', () => {
          this.goTo(page_index);
        });

        return dot_node;
      });

      this.pagination_node.replaceChildren(...dot_nodes);
    }

    update_pagination_state() {
      if (!(this.pagination_node instanceof HTMLElement)) {
        return;
      }

      const dot_nodes = Array.from(this.pagination_node.querySelectorAll('[data-carousel-page]'));
      const dot_class_tokens = split_class_tokens(this.config.dotsItemClasses);
      const active_dot_classes = dot_class_tokens
        .filter((class_name) => class_name.startsWith('carousel-active:'))
        .map((class_name) => class_name.replace('carousel-active:', ''));

      dot_nodes.forEach((dot_node, dot_index) => {
        const is_active = dot_index === this.current_page;

        if (!(dot_node instanceof HTMLElement)) {
          return;
        }

        dot_node.classList.toggle('is-active', is_active);
        active_dot_classes.forEach((class_name) => {
          dot_node.classList.toggle(class_name, is_active);
        });

        if (is_active) {
          dot_node.setAttribute('aria-current', 'true');
        } else {
          dot_node.removeAttribute('aria-current');
        }
      });
    }

    update_info() {
      if (this.current_info_node instanceof HTMLElement) {
        this.current_info_node.textContent = String(this.current_page + 1);
      }

      if (this.total_info_node instanceof HTMLElement) {
        this.total_info_node.textContent = String(this.total_pages);
      }
    }

    update_navigation_state() {
      if (this.config.isInfiniteLoop) {
        this.set_button_disabled(this.prev_button, false);
        this.set_button_disabled(this.next_button, false);
        return;
      }

      this.set_button_disabled(this.prev_button, this.current_page <= 0);
      this.set_button_disabled(this.next_button, this.current_page >= this.total_pages - 1);
    }

    set_button_disabled(button_node, is_disabled) {
      if (!(button_node instanceof HTMLButtonElement)) {
        return;
      }

      button_node.disabled = is_disabled;
      button_node.classList.toggle('opacity-50', is_disabled);
      button_node.classList.toggle('pointer-events-none', is_disabled);
      button_node.setAttribute('aria-disabled', is_disabled ? 'true' : 'false');
    }

    get_offset_slides() {
      const base_offset = this.current_page * this.visible_slides;
      const max_offset = Math.max(0, this.slide_nodes.length - this.visible_slides);

      if (!this.config.isCentered) {
        return clamp(base_offset, 0, max_offset);
      }

      const centered_offset = Math.round(base_offset - ((this.visible_slides - 1) / 2));
      return clamp(centered_offset, 0, max_offset);
    }

    render(emit_change = true) {
      if (!(this.viewport_node instanceof HTMLElement) || !(this.body_node instanceof HTMLElement)) {
        return;
      }

      const offset_slides = this.get_offset_slides();
      const translate_x = -(offset_slides * this.slide_width);

      this.body_node.style.transitionDuration = `${this.get_effective_speed()}ms`;
      this.body_node.style.transform = `translate3d(${translate_x}px, 0, 0)`;

      this.update_info();
      this.update_navigation_state();
      this.update_pagination_state();

      if (emit_change) {
        this.dispatch_event('carousel:change');
      }
    }

    on_prev() {
      this.prev();
    }

    on_next() {
      this.next();
    }

    on_resize() {
      this.update();
    }

    on_keydown(event) {
      if (!this.config.keyboard) {
        return;
      }

      const has_focus_inside = this.root_node.contains(document.activeElement);

      if (!has_focus_inside) {
        return;
      }

      if (event.key === 'ArrowLeft') {
        event.preventDefault();
        this.prev();
      }

      if (event.key === 'ArrowRight') {
        event.preventDefault();
        this.next();
      }
    }

    on_mouse_enter() {
      this.pause();
    }

    on_mouse_leave() {
      this.play();
    }

    on_pointer_down(event) {
      if (!this.config.drag || !(event.target instanceof Element)) {
        return;
      }

      if (event.target.closest('button, a, input, textarea, select, label')) {
        return;
      }

      this.drag_started = true;
      this.is_dragging = false;
      this.drag_delta_x = 0;
      this.drag_start_x = event.clientX;
      this.drag_pointer_id = event.pointerId;
      this.was_playing_before_drag = this.is_autoplay_running();

      if (this.viewport_node instanceof HTMLElement) {
        this.viewport_node.setPointerCapture(event.pointerId);
      }

      this.pause();
      this.body_node.style.transitionDuration = '0ms';
    }

    on_pointer_move(event) {
      if (!this.drag_started || this.drag_pointer_id !== event.pointerId) {
        return;
      }

      this.drag_delta_x = event.clientX - this.drag_start_x;
      this.is_dragging = Math.abs(this.drag_delta_x) > 4;

      const offset_slides = this.get_offset_slides();
      const base_translate_x = -(offset_slides * this.slide_width);
      const next_translate_x = base_translate_x + this.drag_delta_x;

      this.body_node.style.transform = `translate3d(${next_translate_x}px, 0, 0)`;
    }

    on_pointer_up(event) {
      if (!this.drag_started || this.drag_pointer_id !== event.pointerId) {
        return;
      }

      const threshold_reached = Math.abs(this.drag_delta_x) >= this.config.threshold;
      const drag_delta = this.drag_delta_x;

      this.drag_started = false;
      this.drag_delta_x = 0;
      this.drag_pointer_id = null;
      this.is_dragging = false;

      if (this.viewport_node instanceof HTMLElement && this.viewport_node.hasPointerCapture(event.pointerId)) {
        this.viewport_node.releasePointerCapture(event.pointerId);
      }

      if (threshold_reached) {
        if (drag_delta < 0) {
          this.next();
        } else {
          this.prev();
        }
      } else {
        this.render(false);
      }

      if (this.was_playing_before_drag) {
        this.play();
      }
    }

    on_pointer_cancel() {
      if (!this.drag_started) {
        return;
      }

      this.drag_started = false;
      this.drag_delta_x = 0;
      this.drag_pointer_id = null;
      this.is_dragging = false;
      this.render(false);

      if (this.was_playing_before_drag) {
        this.play();
      }
    }

    next() {
      this.goTo(this.current_page + 1);
    }

    prev() {
      this.goTo(this.current_page - 1);
    }

    goTo(index) {
      if (this.total_pages <= 1) {
        return;
      }

      if (this.config.isInfiniteLoop) {
        this.current_page = mod(index, this.total_pages);
      } else {
        this.current_page = clamp(index, 0, this.total_pages - 1);
      }

      this.render(true);

      if (this.config.isAutoPlay) {
        this.restart_autoplay_cycle();
      }
    }

    play() {
      if (!this.config.isAutoPlay || this.motion_reduced || this.total_pages <= 1) {
        return;
      }

      this.pause(false);

      if (this.auto_play_remaining_ms < 1 || this.auto_play_remaining_ms > this.config.autoPlayInterval) {
        this.reset_autoplay_remaining();
      }

      this.schedule_autoplay_tick();

      this.dispatch_event('carousel:play');
    }

    pause(emit_event = true) {
      if (!this.is_autoplay_running()) {
        return;
      }

      const elapsed = Date.now() - this.auto_play_started_at;
      this.auto_play_remaining_ms = Math.max(0, this.auto_play_remaining_ms - elapsed);
      this.clear_autoplay_timeout();
      this.stop_timer_raf();
      this.sync_autoplay_timer_ui(0, this.auto_play_remaining_ms);

      if (emit_event) {
        this.dispatch_event('carousel:pause');
      }
    }

    start_autoplay_if_enabled() {
      if (!this.config.isAutoPlay) {
        return;
      }

      this.play();
    }

    update(override_config = null) {
      if (override_config && typeof override_config === 'object') {
        this.config = this.resolve_config(override_config);
      }

      if (!this.config.isAutoPlay) {
        this.reset_autoplay_remaining();
      }

      const previous_pages = this.total_pages;
      this.update_metrics();

      if (this.current_page >= this.total_pages) {
        this.current_page = this.total_pages - 1;
      }

      this.current_page = clamp(this.current_page, 0, this.total_pages - 1);
      this.render(previous_pages !== this.total_pages);

      if (this.config.isAutoPlay && !this.is_autoplay_running()) {
        this.play();
      }

      if (!this.config.isAutoPlay && this.is_autoplay_running()) {
        this.pause();
      }

      if (!this.config.isAutoPlay) {
        this.sync_autoplay_timer_ui(0, this.config.autoPlayInterval);
      }
    }

    destroy() {
      this.pause(false);
      this.detach_events();
      this.clear_autoplay_timeout();
      this.stop_timer_raf();

      if (this.body_node instanceof HTMLElement) {
        this.body_node.style.transform = '';
        this.body_node.style.transitionDuration = '';
        this.body_node.style.transitionProperty = '';
        this.body_node.style.transitionTimingFunction = '';
        this.body_node.style.willChange = '';
      }

      if (this.viewport_node instanceof HTMLElement) {
        this.viewport_node.style.touchAction = '';
      }

      this.slide_nodes.forEach((slide_node) => {
        slide_node.style.width = '';
        slide_node.style.flexShrink = '';
      });

      if (this.autoplay_timer_progress_node instanceof HTMLElement) {
        this.autoplay_timer_progress_node.style.background = '';
      }

      INSTANCE_MAP.delete(this.root_node);
      this.dispatch_event('carousel:destroy');
    }
  }

  const init_one = (root_node, override_config = {}) => {
    if (!(root_node instanceof HTMLElement)) {
      return null;
    }

    const existing_instance = INSTANCE_MAP.get(root_node);

    if (existing_instance) {
      existing_instance.update(override_config);
      return existing_instance;
    }

    const carousel_instance = new Carousel(root_node, override_config);
    carousel_instance.init();
    INSTANCE_MAP.set(root_node, carousel_instance);
    return carousel_instance;
  };

  const init_all = (context_node = document) => {
    const root_nodes = Array.from(context_node.querySelectorAll('[data-carousel]'));
    return root_nodes.map((root_node) => init_one(root_node)).filter(Boolean);
  };

  const resolve_roots = (target) => {
    if (!target) {
      return Array.from(document.querySelectorAll('[data-carousel]'));
    }

    if (target instanceof HTMLElement) {
      return [target];
    }

    if (typeof target === 'string') {
      return Array.from(document.querySelectorAll(target));
    }

    if (target instanceof NodeList || Array.isArray(target)) {
      return Array.from(target).filter((node) => node instanceof HTMLElement);
    }

    return [];
  };

  const api = {
    init(target, options = {}) {
      const root_nodes = resolve_roots(target);
      return root_nodes.map((root_node) => init_one(root_node, options)).filter(Boolean);
    },
    get(root_node) {
      return root_node instanceof HTMLElement ? INSTANCE_MAP.get(root_node) || null : null;
    },
    update(target, options = null) {
      const root_nodes = resolve_roots(target);

      root_nodes.forEach((root_node) => {
        const instance = INSTANCE_MAP.get(root_node);

        if (instance) {
          instance.update(options);
          return;
        }

        init_one(root_node, options || {});
      });
    },
    destroy(target) {
      const root_nodes = resolve_roots(target);

      root_nodes.forEach((root_node) => {
        const instance = INSTANCE_MAP.get(root_node);

        if (!instance) {
          return;
        }

        instance.destroy();
      });
    },
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      init_all(document);
    }, { once: true });
  } else {
    init_all(document);
  }

  window.Carousel = api;
})();
