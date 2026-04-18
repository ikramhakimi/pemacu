(() => {
  const data_node = document.getElementById('assessment-form-items-data');
  const drawer_node = document.getElementById('assessment-form-item-drawer');

  if (!(data_node instanceof HTMLScriptElement) || !(drawer_node instanceof HTMLElement)) {
    return;
  }

  const content_node = drawer_node.querySelector('.js-assessment-form-drawer-content');
  const title_node = document.getElementById('assessment-form-item-drawer-title');
  const opener_nodes = Array.from(document.querySelectorAll('.js-assessment-form-drawer-open'))
    .filter((opener_node) => opener_node instanceof HTMLElement);

  if (!(content_node instanceof HTMLElement) || !(title_node instanceof HTMLElement) || opener_nodes.length === 0) {
    return;
  }

  let items_map = {};

  try {
    const parsed_data = JSON.parse(data_node.textContent || '{}');
    items_map = parsed_data && typeof parsed_data === 'object' ? parsed_data : {};
  } catch (_error) {
    items_map = {};
  }

  const status_label_map = {
    not_started: 'Not Started',
    in_progress: 'In Progress',
    completed: 'Completed',
    missing_evidence: 'Missing Evidence',
  };
  const tab_item_base_class = 'tabs__item -mb-[1px] inline-flex items-center gap-2 px-1 pb-3 font-medium transition-colors transition-shadow';
  const tab_item_active_class = 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]';
  const tab_item_inactive_class = 'text-brand-600 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]';
  const tab_badge_base_class = 'rounded-full px-2 py-0.5 text-xs font-semibold';
  const tab_badge_active_class = 'bg-brand-900 text-white';
  const tab_badge_inactive_class = 'bg-brand-200 text-brand-700';

  const escape_html = (value) => {
    return String(value)
      .replaceAll('&', '&amp;')
      .replaceAll('<', '&lt;')
      .replaceAll('>', '&gt;')
      .replaceAll('"', '&quot;')
      .replaceAll("'", '&#039;');
  };

  const render_options = (item_key, scoring) => {
    if (!scoring || typeof scoring !== 'object') {
      return '';
    }

    const options_html = String(scoring.options_html || '');
    if (options_html === '') {
      return '';
    }

    return (
      '<section class="space-y-2">' +
        '<h4 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Points Options</h4>' +
        `<div class="divide-y divide-brand-200 [&>*+*]:mt-4 [&>*+*]:pt-4">${options_html}</div>` +
      '</section>'
    );
  };

  const normalize_text = (value) => String(value).replace(/\s+/g, ' ').trim().toLowerCase();

  const render_attachments_mockup = (item_key, attachments_count) => {
    if (attachments_count <= 0) {
      return (
        '<div class="rounded-md border border-dashed border-brand-300 bg-brand-50 p-4 text-brand-600">' +
          'No attachments yet. Upload supporting evidence files for this credit.' +
        '</div>'
      );
    }

    const preview_count = Math.min(attachments_count, 4);
    const file_rows = [];

    for (let index = 1; index <= preview_count; index++) {
      const file_number = String(index).padStart(2, '0');
      file_rows.push(
        '<div class="flex items-center justify-between rounded-md border border-brand-200 bg-white px-3 py-2">' +
          `<div class="min-w-0"><p class="truncate font-medium text-brand-800">${escape_html(item_key.toUpperCase())}_evidence_${file_number}.pdf</p>` +
          '<p class="text-xs text-brand-500">Uploaded by assessor</p></div>' +
          '<span class="text-xs text-brand-500">PDF</span>' +
        '</div>'
      );
    }

    return (
      '<div class="space-y-3">' +
        `<p class="text-brand-600">${escape_html(String(attachments_count))} file(s) attached</p>` +
        `<div class="space-y-2">${file_rows.join('')}</div>` +
        '<button type="button" class="inline-flex items-center justify-center rounded-md border border-brand-300 bg-brand-100 px-3 py-2 font-medium text-brand-800 hover:bg-brand-200">Upload more files</button>' +
      '</div>'
    );
  };

  const split_classes = (class_name) => class_name.trim().split(/\s+/).filter(Boolean);

  const apply_state_class = (node, active_class, inactive_class, is_active) => {
    if (!(node instanceof HTMLElement)) {
      return;
    }

    split_classes(active_class).forEach((token) => node.classList.remove(token));
    split_classes(inactive_class).forEach((token) => node.classList.remove(token));
    split_classes(is_active ? active_class : inactive_class).forEach((token) => node.classList.add(token));
  };

  const init_tabs = () => {
    const tabs_root = content_node.querySelector('[data-assessment-drawer-tabs]');
    if (!(tabs_root instanceof HTMLElement) || tabs_root.dataset.tabsInitialized === 'true') {
      return;
    }

    tabs_root.dataset.tabsInitialized = 'true';

    const tab_buttons = Array.from(tabs_root.querySelectorAll('.js-assessment-drawer-tab-btn'))
      .filter((tab_button) => tab_button instanceof HTMLElement);
    const tab_panels = Array.from(content_node.querySelectorAll('.js-assessment-drawer-tab-panel'))
      .filter((tab_panel) => tab_panel instanceof HTMLElement);

    if (tab_buttons.length === 0 || tab_panels.length === 0) {
      return;
    }

    const set_active_tab = (target) => {
      tab_buttons.forEach((tab_button) => {
        const tab_target = tab_button.getAttribute('data-assessment-tab-target')
          || tab_button.getAttribute('aria-controls')
          || '';
        const is_active = tab_target === target;
        const active_class = tab_button.dataset.activeClass || '';
        const inactive_class = tab_button.dataset.inactiveClass || '';
        tab_button.setAttribute('aria-selected', is_active ? 'true' : 'false');
        tab_button.setAttribute('tabindex', is_active ? '0' : '-1');
        apply_state_class(tab_button, active_class, inactive_class, is_active);

        const badge_node = tab_button.querySelector('[data-tab-badge]');
        if (badge_node instanceof HTMLElement) {
          const badge_active = badge_node.dataset.activeClass || '';
          const badge_inactive = badge_node.dataset.inactiveClass || '';
          apply_state_class(badge_node, badge_active, badge_inactive, is_active);
        }
      });

      tab_panels.forEach((tab_panel) => {
        const panel_target = tab_panel.getAttribute('data-assessment-tab-panel') || tab_panel.id;
        const is_active = panel_target === target;
        tab_panel.hidden = !is_active;
      });
    };

    tab_buttons.forEach((tab_button) => {
      tab_button.addEventListener('click', () => {
        const target = tab_button.getAttribute('data-assessment-tab-target')
          || tab_button.getAttribute('aria-controls')
          || '';
        if (target === '') {
          return;
        }

        set_active_tab(target);
      });
    });

    const selected_tab = tabs_root.querySelector('[role="tab"][aria-selected="true"]');
    if (selected_tab instanceof HTMLElement) {
      const target = selected_tab.getAttribute('data-assessment-tab-target')
        || selected_tab.getAttribute('aria-controls')
        || '';
      if (target !== '') {
        set_active_tab(target);
      }
    }
  };

  const init_option_behavior = () => {
    const option_inputs = Array.from(content_node.querySelectorAll('[data-assessment-option-input]'))
      .filter((option_input) => option_input instanceof HTMLInputElement);

    if (option_inputs.length === 0) {
      return;
    }

    option_inputs.forEach((option_input) => {
      option_input.addEventListener('change', () => {
        const mode = option_input.getAttribute('data-assessment-option-mode') || 'sum';
        const item_key = option_input.getAttribute('data-assessment-item-key') || '';

        if (mode !== 'max' || item_key === '' || !option_input.checked) {
          return;
        }

        option_inputs.forEach((sibling_input) => {
          if (!(sibling_input instanceof HTMLInputElement) || sibling_input === option_input) {
            return;
          }

          const sibling_key = sibling_input.getAttribute('data-assessment-item-key') || '';
          if (sibling_key !== item_key) {
            return;
          }

          sibling_input.checked = false;
        });
      });
    });
  };

  const render_item = (item) => {
    const item_key = String(item.item_key || '');
    const code = String(item.code || '');
    const title = String(item.title || 'Assessment Item');
    const category_title = String(item.category_title || '');
    const section_title = String(item.section_title || '');
    const criteria = String(item.criteria || item.criteria_preview || '');
    const remarks_preview = String(item.remarks_preview || '');
    const attachments_count = Number(item.attachments_count || 0);
    const scoring = item.scoring && typeof item.scoring === 'object' ? item.scoring : {};
    const scoring_options = Array.isArray(scoring.options) ? scoring.options : [];
    const earned_points = Number(scoring.earned_points || 0);
    const max_points = Number(scoring.max_points || 0);
    const status = String(item.status || 'not_started');
    const status_label = status_label_map[status] || 'Not Started';

    title_node.textContent = `${code} · ${title}`;

    const summary_meta = [];
    summary_meta.push(`<span class="inline-flex rounded-md border border-brand-300 bg-brand-50 px-2 py-1 text-xs font-semibold text-brand-700">${escape_html(status_label)}</span>`);
    summary_meta.push(`<span class="text-xs text-brand-600">${escape_html(String(earned_points))}/${escape_html(String(max_points))} pts</span>`);

    if (attachments_count > 0) {
      const file_label = attachments_count === 1 ? '1 file attached' : `${attachments_count} files attached`;
      summary_meta.push(`<span class="text-xs text-brand-600">${escape_html(file_label)}</span>`);
    }

    const remarks_badge_count = remarks_preview !== '' ? 1 : 0;
    const tab_id_prefix = `assessment-drawer-tab-${item_key.replace(/[^a-zA-Z0-9_-]/g, '-')}`;
    const context_tab_id = `${tab_id_prefix}-context`;
    const attachments_tab_id = `${tab_id_prefix}-attachments`;
    const remarks_tab_id = `${tab_id_prefix}-remarks`;
    const context_panel_id = `${tab_id_prefix}-context-panel`;
    const attachments_panel_id = `${tab_id_prefix}-attachments-panel`;
    const remarks_panel_id = `${tab_id_prefix}-remarks-panel`;
    const tab_active_class = `${tab_item_base_class} ${tab_item_active_class}`;
    const tab_inactive_class = `${tab_item_base_class} ${tab_item_inactive_class}`;
    const badge_active_class = `${tab_badge_base_class} ${tab_badge_active_class}`;
    const badge_inactive_class = `${tab_badge_base_class} ${tab_badge_inactive_class}`;
    const normalized_criteria = normalize_text(criteria);
    const has_matching_option_description = normalized_criteria !== '' && scoring_options.some((option) => {
      if (!option || typeof option !== 'object') {
        return false;
      }

      const option_description = normalize_text(option.description || '');
      return option_description !== '' && option_description === normalized_criteria;
    });
    const should_show_criteria = normalized_criteria !== '' && !has_matching_option_description;
    const criteria_section_markup = should_show_criteria
      ? (
        '<section class="space-y-2">' +
          '<h4 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Criteria</h4>' +
          `<p class="text-brand-800">${escape_html(criteria)}</p>` +
        '</section>'
      )
      : '';

    const context_panel_markup = (
      '<div class="space-y-4">' +
        criteria_section_markup +
        render_options(item_key, scoring) +
      '</div>'
    );

    const attachments_panel_markup = (
      '<div class="space-y-3">' +
        '<h4 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Attachments Mockup</h4>' +
        render_attachments_mockup(item_key, attachments_count) +
      '</div>'
    );

    const remarks_panel_markup = (
      '<div class="space-y-3">' +
        '<h4 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Remarks Mockup</h4>' +
        '<div class="rounded-md border border-brand-200 bg-brand-50 p-3">' +
          '<p class="text-xs uppercase tracking-wide text-brand-500">Current remark</p>' +
          `<p class="mt-1 text-brand-800">${escape_html(remarks_preview !== '' ? remarks_preview : 'No remarks yet')}</p>` +
        '</div>' +
        `<textarea class="w-full rounded-md border border-brand-300 bg-white px-3 py-2 text-brand-800 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200" rows="5" name="assessment_remarks_${escape_html(item_key)}" placeholder="Add remarks...">${escape_html(remarks_preview)}</textarea>` +
        '<div class="flex flex-wrap gap-2">' +
          '<button type="button" class="rounded-md border border-brand-300 bg-white px-2 py-1 text-xs font-medium text-brand-700 hover:bg-brand-100">Need more evidence</button>' +
          '<button type="button" class="rounded-md border border-brand-300 bg-white px-2 py-1 text-xs font-medium text-brand-700 hover:bg-brand-100">Pending consultant input</button>' +
          '<button type="button" class="rounded-md border border-brand-300 bg-white px-2 py-1 text-xs font-medium text-brand-700 hover:bg-brand-100">Reviewed and approved</button>' +
        '</div>' +
      '</div>'
    );

    content_node.innerHTML = (
      '<div class="space-y-4">' +
        `<div class="flex flex-wrap items-center gap-2">${summary_meta.join('')}</div>` +
        '<div class="tabs -mx-5 js-assessment-drawer-tabs" data-assessment-drawer-tabs>' +
          '<div class="tabs__list inline-flex w-full flex-wrap items-center gap-6 border-b border-brand-200 px-5" role="tablist" aria-label="Tabs with underline and badges">' +
            `<button type="button" class="${tab_active_class} js-assessment-drawer-tab-btn" role="tab" id="${context_tab_id}" aria-controls="${context_panel_id}" data-assessment-tab-target="${context_panel_id}" aria-selected="true" tabindex="0" data-active-class="${tab_active_class}" data-inactive-class="${tab_inactive_class}">` +
              '<span>Context</span>' +
              `<span class="${badge_active_class} js-assessment-drawer-tab-badge" data-tab-badge data-active-class="${badge_active_class}" data-inactive-class="${badge_inactive_class}">${escape_html(String(max_points))}</span>` +
            '</button>' +
            `<button type="button" class="${tab_inactive_class} js-assessment-drawer-tab-btn" role="tab" id="${attachments_tab_id}" aria-controls="${attachments_panel_id}" data-assessment-tab-target="${attachments_panel_id}" aria-selected="false" tabindex="-1" data-active-class="${tab_active_class}" data-inactive-class="${tab_inactive_class}">` +
              '<span>Attachments</span>' +
              `<span class="${badge_inactive_class} js-assessment-drawer-tab-badge" data-tab-badge data-active-class="${badge_active_class}" data-inactive-class="${badge_inactive_class}">${escape_html(String(attachments_count))}</span>` +
            '</button>' +
            `<button type="button" class="${tab_inactive_class} js-assessment-drawer-tab-btn" role="tab" id="${remarks_tab_id}" aria-controls="${remarks_panel_id}" data-assessment-tab-target="${remarks_panel_id}" aria-selected="false" tabindex="-1" data-active-class="${tab_active_class}" data-inactive-class="${tab_inactive_class}">` +
              '<span>Remarks</span>' +
              `<span class="${badge_inactive_class} js-assessment-drawer-tab-badge" data-tab-badge data-active-class="${badge_active_class}" data-inactive-class="${badge_inactive_class}">${escape_html(String(remarks_badge_count))}</span>` +
            '</button>' +
          '</div>' +
        '</div>' +
        `<section class="tabs__panel mt-3 space-y-4 js-assessment-drawer-tab-panel" role="tabpanel" id="${context_panel_id}" data-assessment-tab-panel="${context_panel_id}" aria-labelledby="${context_tab_id}">${context_panel_markup}</section>` +
        `<section class="tabs__panel mt-3 space-y-4 js-assessment-drawer-tab-panel" role="tabpanel" id="${attachments_panel_id}" data-assessment-tab-panel="${attachments_panel_id}" aria-labelledby="${attachments_tab_id}" hidden>${attachments_panel_markup}</section>` +
        `<section class="tabs__panel mt-3 space-y-4 js-assessment-drawer-tab-panel" role="tabpanel" id="${remarks_panel_id}" data-assessment-tab-panel="${remarks_panel_id}" aria-labelledby="${remarks_tab_id}" hidden>${remarks_panel_markup}</section>` +
      '</div>'
    );

    init_tabs();
    init_option_behavior();
  };

  opener_nodes.forEach((opener_node) => {
    opener_node.addEventListener('click', () => {
      const item_key = opener_node.getAttribute('data-assessment-item-key') || '';
      const selected_item = Object.prototype.hasOwnProperty.call(items_map, item_key)
        ? items_map[item_key]
        : null;

      if (!selected_item || typeof selected_item !== 'object') {
        return;
      }

      render_item(selected_item);
    });

    opener_node.addEventListener('keydown', (event) => {
      if (event.key !== 'Enter' && event.key !== ' ') {
        return;
      }

      event.preventDefault();
      opener_node.click();
    });
  });
})();
