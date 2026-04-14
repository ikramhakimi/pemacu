(() => {
  /**
   * Stepper Controller
   * - Scope: every `[data-stepper]` instance.
   * - Responsibility: apply min/max/step guarded decrement and increment interactions.
   * - Contract: instance must include decrease/increase controls and a number field.
   */
  const stepper_nodes = document.querySelectorAll('[data-stepper]');

  if (stepper_nodes.length === 0) {
    return;
  }

  stepper_nodes.forEach((stepper_node) => {
    const decrease_button = stepper_node.querySelector('[data-stepper-decrease]');
    const increase_button = stepper_node.querySelector('[data-stepper-increase]');
    const number_input    = stepper_node.querySelector('[data-stepper-number]');

    if (
      !(decrease_button instanceof HTMLButtonElement)
      || !(increase_button instanceof HTMLButtonElement)
      || !(number_input instanceof HTMLInputElement)
    ) {
      return;
    }

    const step_value = Number(stepper_node.getAttribute('data-stepper-step')) || 1;
    const min_value  = Number(stepper_node.getAttribute('data-stepper-min'));
    const max_value  = Number(stepper_node.getAttribute('data-stepper-max'));

    const clamp_value = (value) => {
      let next_value = value;

      if (Number.isFinite(min_value)) {
        next_value = Math.max(next_value, min_value);
      }

      if (Number.isFinite(max_value)) {
        next_value = Math.min(next_value, max_value);
      }

      return next_value;
    };

    const parse_current_value = () => {
      const current_value = Number(number_input.value);
      return Number.isFinite(current_value) ? current_value : 0;
    };

    const set_value = (value) => {
      number_input.value = String(clamp_value(value));
    };

    decrease_button.addEventListener('click', () => {
      set_value(parse_current_value() - step_value);
    });

    increase_button.addEventListener('click', () => {
      set_value(parse_current_value() + step_value);
    });
  });
})();

