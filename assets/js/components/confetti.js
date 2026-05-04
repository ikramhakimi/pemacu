import '../../vendor/canvas-confetti/confetti.browser.js';

(() => {
  /**
   * Confetti Controller
   * - Scope: every `[data-confetti]` instance.
   * - Responsibility: fire canvas-confetti when its trigger is activated.
   * - Contract: root uses `[data-confetti]`, trigger uses `[data-confetti-trigger]`.
   */
  const confetti_nodes = Array.from(document.querySelectorAll('[data-confetti]'))
    .filter((confetti_node) => confetti_node instanceof HTMLElement);

  if (confetti_nodes.length === 0) {
    return;
  }

  const confetti = window.confetti;

  if (typeof confetti !== 'function') {
    return;
  }

  const prefers_reduced_motion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const parse_options = (confetti_node) => {
    const raw_options = confetti_node.dataset.options;

    if (!raw_options) {
      return {};
    }

    try {
      const parsed_options = JSON.parse(raw_options);

      if (parsed_options && typeof parsed_options === 'object' && !Array.isArray(parsed_options)) {
        return parsed_options;
      }
    } catch (error) {
      return {};
    }

    return {};
  };

  const random_in_range = (min, max) => Math.random() * (max - min) + min;

  const fire_basic = (options) => {
    confetti({
      particleCount: 50,
      spread: 45,
      origin: { x: 0.5, y: 0.5 },
      ...options,
    });
  };

  const fire_random = (options) => {
    confetti({
      particleCount: 50,
      spread: 70,
      angle: Math.random() * 360,
      origin: { x: Math.random(), y: Math.random() * 0.5 },
      ...options,
    });
  };

  const fire_fireworks = (options) => {
    const duration = 5 * 1000;
    const animation_end = Date.now() + duration;
    const defaults = {
      startVelocity: 30,
      spread: 360,
      ticks: 60,
      zIndex: 100,
      ...options,
    };

    const interval = window.setInterval(() => {
      const time_left = animation_end - Date.now();

      if (time_left <= 0) {
        window.clearInterval(interval);
        return;
      }

      const particle_count = 50 * (time_left / duration);

      confetti({
        ...defaults,
        particleCount: particle_count,
        origin: { x: random_in_range(0.1, 0.3), y: Math.random() - 0.2 },
      });
      confetti({
        ...defaults,
        particleCount: particle_count,
        origin: { x: random_in_range(0.7, 0.9), y: Math.random() - 0.2 },
      });
    }, 250);
  };

  const fire_side_cannons = (options) => {
    const end = Date.now() + 3 * 1000;
    const colors = ['#a786ff', '#fd8bbc', '#eca184', '#f8deb1'];

    const frame = () => {
      if (Date.now() > end) {
        return;
      }

      confetti({
        particleCount: 2,
        angle: 60,
        spread: 55,
        startVelocity: 60,
        origin: { x: 0, y: 0.5 },
        colors,
        ...options,
      });
      confetti({
        particleCount: 2,
        angle: 120,
        spread: 55,
        startVelocity: 60,
        origin: { x: 1, y: 0.5 },
        colors,
        ...options,
      });

      window.requestAnimationFrame(frame);
    };

    frame();
  };

  const fire_stars = (options) => {
    const defaults = {
      spread: 360,
      ticks: 50,
      gravity: 0,
      decay: 0.94,
      startVelocity: 30,
      colors: ['#FFE400', '#FFBD00', '#E89400', '#FFCA6C', '#FDFFB8'],
      ...options,
    };

    const shoot = () => {
      confetti({
        ...defaults,
        particleCount: 40,
        scalar: 1.2,
        shapes: ['star'],
      });
      confetti({
        ...defaults,
        particleCount: 10,
        scalar: 0.75,
        shapes: ['circle'],
      });
    };

    window.setTimeout(shoot, 0);
    window.setTimeout(shoot, 100);
    window.setTimeout(shoot, 200);
  };

  const fire_confetti = (confetti_node) => {
    if (!(confetti_node instanceof HTMLElement) || prefers_reduced_motion) {
      return;
    }

    const mode = confetti_node.dataset.mode || 'basic';
    const options = parse_options(confetti_node);

    if (mode === 'random') {
      fire_random(options);
      return;
    }

    if (mode === 'fireworks') {
      fire_fireworks(options);
      return;
    }

    if (mode === 'side-cannons') {
      fire_side_cannons(options);
      return;
    }

    if (mode === 'stars') {
      fire_stars(options);
      return;
    }

    fire_basic(options);
  };

  confetti_nodes.forEach((confetti_node) => {
    const trigger_node = confetti_node.querySelector('[data-confetti-trigger]');

    if (trigger_node instanceof HTMLElement) {
      trigger_node.addEventListener('click', () => {
        fire_confetti(confetti_node);
      });
    }

    confetti_node.addEventListener('confetti:fire', () => {
      fire_confetti(confetti_node);
    });

    if (confetti_node.dataset.autoFire === 'true') {
      window.requestAnimationFrame(() => {
        fire_confetti(confetti_node);
      });
    }
  });
})();
