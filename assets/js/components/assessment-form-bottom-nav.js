(() => {
  const nav_node = document.querySelector('[data-assessment-bottom-nav]');

  if (!(nav_node instanceof HTMLElement)) {
    return;
  }

  const link_nodes = Array.from(nav_node.querySelectorAll('[data-assessment-nav-link]'))
    .filter((link_node) => link_node instanceof HTMLAnchorElement);
  const section_nodes = Array.from(document.querySelectorAll('[data-assessment-category-anchor]'))
    .filter((section_node) => section_node instanceof HTMLElement);

  if (link_nodes.length === 0 || section_nodes.length === 0) {
    return;
  }

  const active_classes = [
    'bg-brand-700',
    'text-brand-50',
    '-translate-y-0.5',
    'shadow-lg',
    'shadow-brand-900',
    'border-brand-500',
  ];
  const inactive_classes = [
    'text-brand-200',
    'border-transparent',
  ];

  const section_map = new Map();
  section_nodes.forEach((section_node) => {
    if (section_node.id !== '') {
      section_map.set(section_node.id, section_node);
    }
  });

  let active_id = '';

  const set_active_link = (target_id, options = {}) => {
    if (target_id === '' || target_id === active_id) {
      return;
    }

    const active_link = link_nodes.find(
      (link_node) => link_node.getAttribute('data-assessment-nav-link') === target_id,
    );

    if (!(active_link instanceof HTMLAnchorElement)) {
      return;
    }

    active_id = target_id;
    const animate_nav_scroll = options && options.animate_nav_scroll === true;

    link_nodes.forEach((link_node) => {
      const is_active = link_node === active_link;
      const target_classes = is_active ? active_classes : inactive_classes;
      const clear_classes = is_active ? inactive_classes : active_classes;

      clear_classes.forEach((class_name) => link_node.classList.remove(class_name));
      target_classes.forEach((class_name) => link_node.classList.add(class_name));
      link_node.setAttribute('aria-current', is_active ? 'true' : 'false');
    });

    active_link.scrollIntoView({
      block: 'nearest',
      inline: 'center',
      behavior: animate_nav_scroll ? 'smooth' : 'auto',
    });
  };

  link_nodes.forEach((link_node) => {
    link_node.addEventListener('click', (event) => {
      const target_id = link_node.getAttribute('data-assessment-nav-link') || '';
      const target_node = section_map.get(target_id);

      if (!(target_node instanceof HTMLElement)) {
        return;
      }

      event.preventDefault();
      target_node.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
      });

      set_active_link(target_id, {animate_nav_scroll: true});

      if (window.history && typeof window.history.replaceState === 'function') {
        window.history.replaceState(null, '', `#${target_id}`);
      }
    });
  });

  const observed_ratios = new Map();
  const resolve_active_id = () => {
    let candidate_id = '';
    let candidate_ratio = 0;

    observed_ratios.forEach((ratio, section_id) => {
      if (ratio > candidate_ratio) {
        candidate_ratio = ratio;
        candidate_id = section_id;
      }
    });

    if (candidate_id !== '') {
      set_active_link(candidate_id);
      return;
    }

    const viewport_middle = window.innerHeight / 2;
    let nearest_id = '';
    let nearest_distance = Number.POSITIVE_INFINITY;

    section_nodes.forEach((section_node) => {
      const rect = section_node.getBoundingClientRect();
      const distance = Math.abs(rect.top - viewport_middle);

      if (distance < nearest_distance) {
        nearest_distance = distance;
        nearest_id = section_node.id;
      }
    });

    if (nearest_id !== '') {
      set_active_link(nearest_id);
    }
  };

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!(entry.target instanceof HTMLElement) || entry.target.id === '') {
          return;
        }

        if (entry.isIntersecting) {
          observed_ratios.set(entry.target.id, entry.intersectionRatio);
          return;
        }

        observed_ratios.delete(entry.target.id);
      });

      resolve_active_id();
    }, {
      threshold: [0.1, 0.25, 0.4, 0.6, 0.8],
      rootMargin: '-38% 0px -42% 0px',
    });

    section_nodes.forEach((section_node) => observer.observe(section_node));
  } else {
    let ticking = false;

    const on_scroll = () => {
      if (ticking) {
        return;
      }

      ticking = true;
      window.requestAnimationFrame(() => {
        resolve_active_id();
        ticking = false;
      });
    };

    window.addEventListener('scroll', on_scroll, {passive: true});
    window.addEventListener('resize', on_scroll);
  }

  const hash_target_id = window.location.hash.replace('#', '');
  if (hash_target_id !== '' && section_map.has(hash_target_id)) {
    set_active_link(hash_target_id);
    return;
  }

  const first_section = section_nodes[0];
  if (first_section instanceof HTMLElement && first_section.id !== '') {
    set_active_link(first_section.id);
  }
})();
