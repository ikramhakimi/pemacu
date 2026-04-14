(() => {
  /**
   * Alert Dismiss Controller
   * - Scope: every `[data-alert-js]` instance.
   * - Responsibility: dismiss one alert instance when its dismiss button is activated.
   * - Contract: dismiss control uses `[data-alert-dismiss]`, alert root uses `[data-alert]`.
   */
  const alert_nodes = Array.from(document.querySelectorAll('[data-alert-js]'))
    .filter((alert_node) => alert_node instanceof HTMLElement);

  if (alert_nodes.length === 0) {
    return;
  }

  alert_nodes.forEach((alert_node) => {
    const dismiss_node = alert_node.querySelector('[data-alert-dismiss]');

    if (!(dismiss_node instanceof HTMLButtonElement)) {
      return;
    }

    dismiss_node.addEventListener('click', () => {
      const root_node = dismiss_node.closest('[data-alert]');

      if (!(root_node instanceof HTMLElement)) {
        return;
      }

      root_node.remove();
    });
  });
})();

