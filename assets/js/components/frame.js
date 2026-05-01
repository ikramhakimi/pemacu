const toggle_buttons = Array.from(document.querySelectorAll('.js-component-frame-toggle'));

toggle_buttons.forEach((toggle_button) => {
  if (!(toggle_button instanceof HTMLButtonElement)) {
    return;
  }

  const content_id = toggle_button.getAttribute('aria-controls');
  if (content_id === null || content_id.trim() === '') {
    return;
  }

  const content_node = document.getElementById(content_id);
  if (!(content_node instanceof HTMLElement)) {
    return;
  }

  const chevron_node = toggle_button.querySelector('.js-component-frame-chevron');
  const set_expanded_state = (is_expanded) => {
    toggle_button.setAttribute('aria-expanded', is_expanded ? 'true' : 'false');

    if (is_expanded) {
      content_node.classList.remove('hidden');
    } else {
      content_node.classList.add('hidden');
    }

    if (chevron_node instanceof HTMLElement) {
      chevron_node.style.transformOrigin = '50% 50%';
      chevron_node.style.transform = is_expanded ? 'rotate(0deg)' : 'rotate(-90deg)';
    }
  };

  const initial_expanded = toggle_button.getAttribute('aria-expanded') !== 'false';
  set_expanded_state(initial_expanded);

  toggle_button.addEventListener('click', () => {
    const expanded_now = toggle_button.getAttribute('aria-expanded') === 'true';
    set_expanded_state(!expanded_now);
  });
});
