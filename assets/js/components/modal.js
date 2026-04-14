(() => {
  /**
   * Modal Controller
   * - Scope: every `[data-modal]` instance plus openers using `[data-modal-open]`.
   * - Responsibility: open/close lifecycle, backdrop dismissal, Escape close, and focus return.
   * - Contract: modal root has `id` and `[data-modal]`; close controls use `[data-modal-close]`.
   */
  const modal_nodes = Array.from(document.querySelectorAll('[data-modal]'))
    .filter((modal_node) => modal_node instanceof HTMLElement);
  const opener_nodes = Array.from(document.querySelectorAll('[data-modal-open]'))
    .filter((opener_node) => opener_node instanceof HTMLElement);

  if (modal_nodes.length === 0 || opener_nodes.length === 0) {
    return;
  }

  const modal_map = new Map();
  const last_focus_map = new Map();

  modal_nodes.forEach((modal_node) => {
    const modal_id = modal_node.id;

    if (modal_id === '') {
      return;
    }

    modal_node.classList.add('hidden');
    modal_node.setAttribute('aria-hidden', 'true');
    modal_map.set(modal_id, modal_node);

    const close_nodes = modal_node.querySelectorAll('[data-modal-close]');
    close_nodes.forEach((close_node) => {
      if (!(close_node instanceof HTMLElement)) {
        return;
      }

      close_node.addEventListener('click', () => {
        modal_node.classList.add('hidden');
        modal_node.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');

        const return_target = last_focus_map.get(modal_id);
        if (return_target instanceof HTMLElement) {
          return_target.focus();
        }

        opener_nodes.forEach((opener_node) => {
          if (opener_node.getAttribute('data-modal-target') === modal_id) {
            opener_node.setAttribute('aria-expanded', 'false');
          }
        });
      });
    });

    modal_node.addEventListener('click', (event) => {
      if (event.target !== modal_node) {
        return;
      }

      modal_node.classList.add('hidden');
      modal_node.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('overflow-hidden');

      const return_target = last_focus_map.get(modal_id);
      if (return_target instanceof HTMLElement) {
        return_target.focus();
      }

      opener_nodes.forEach((opener_node) => {
        if (opener_node.getAttribute('data-modal-target') === modal_id) {
          opener_node.setAttribute('aria-expanded', 'false');
        }
      });
    });
  });

  const close_all_modals = () => {
    modal_nodes.forEach((modal_node) => {
      if (modal_node.id === '') {
        return;
      }

      modal_node.classList.add('hidden');
      modal_node.setAttribute('aria-hidden', 'true');
    });

    opener_nodes.forEach((opener_node) => {
      opener_node.setAttribute('aria-expanded', 'false');
    });

    document.body.classList.remove('overflow-hidden');
  };

  opener_nodes.forEach((opener_node) => {
    const target_id = opener_node.getAttribute('data-modal-target') || '';

    if (!modal_map.has(target_id)) {
      return;
    }

    opener_node.setAttribute('aria-expanded', 'false');

    opener_node.addEventListener('click', (event) => {
      if (opener_node instanceof HTMLAnchorElement) {
        event.preventDefault();
      }

      close_all_modals();

      const target_modal = modal_map.get(target_id);
      if (!(target_modal instanceof HTMLElement)) {
        return;
      }

      last_focus_map.set(target_id, opener_node);
      target_modal.classList.remove('hidden');
      target_modal.setAttribute('aria-hidden', 'false');
      opener_node.setAttribute('aria-expanded', 'true');
      document.body.classList.add('overflow-hidden');

      const preferred_focus = target_modal.querySelector('[data-modal-close]');
      if (preferred_focus instanceof HTMLElement) {
        preferred_focus.focus();
      }
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    const open_modal = modal_nodes.find((modal_node) => {
      return !modal_node.classList.contains('hidden');
    });

    if (!(open_modal instanceof HTMLElement)) {
      return;
    }

    const open_modal_id = open_modal.id;
    open_modal.classList.add('hidden');
    open_modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('overflow-hidden');

    opener_nodes.forEach((opener_node) => {
      if (opener_node.getAttribute('data-modal-target') === open_modal_id) {
        opener_node.setAttribute('aria-expanded', 'false');
      }
    });

    const return_target = last_focus_map.get(open_modal_id);
    if (return_target instanceof HTMLElement) {
      return_target.focus();
    }
  });
})();
