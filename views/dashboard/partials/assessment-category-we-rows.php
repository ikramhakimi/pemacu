<tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
  <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
    <div class="flex items-center justify-start gap-3">
      <?php component('icon', [
        'icon_name'  => 'arrow-right-s-line',
        'icon_size'  => '24',
        'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
      ]); ?>
      <div>Water Harvesting &amp; Recycling</div>
    </div>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">WE1</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Rainwater Harvesting</div>
    <div class="pb-3">Encourage rainwater harvesting that will lead to reduction in potable water consumption:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we1" data-assessment-exclusive-group="group-we1" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Rainwater harvesting that leads to ≥ 15% reduction in potable water consumption.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we1_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE1 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we1" data-assessment-exclusive-group="group-we1" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Rainwater harvesting that leads to ≥ 30% reduction in potable water consumption.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we1_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE1 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-we1" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('textarea', [
      'id'          => 'assessment-remark-we1',
      'name'        => 'assessment_remark_we1',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">WE2</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Water Recycling</div>
    <div class="pb-3">Encourage water recycling that will lead to reduction in potable water consumption:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we2" data-assessment-exclusive-group="group-we2" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Treat and recycle ≥ 10% wastewater leading to reduction in potable water consumption.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we2_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE2 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we2" data-assessment-exclusive-group="group-we2" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Treat and recycle ≥ 30% wastewater leading to reduction in potable water consumption.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we2_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE2 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-we2" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('textarea', [
      'id'          => 'assessment-remark-we2',
      'name'        => 'assessment_remark_we2',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
  <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
    <div class="flex items-center justify-start gap-3">
      <?php component('icon', [
        'icon_name'  => 'arrow-right-s-line',
        'icon_size'  => '24',
        'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
      ]); ?>
      <div>Increased Efficiency</div>
    </div>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">WE3</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Water Efficient - Irrigation/Landscaping</div>
    <div class="pb-3">Encourage the design of system that does not require the use of potable water supply from the local water authority:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we3" data-assessment-exclusive-group="group-we3" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Reduce potable water consumption for landscape irrigation by ≥ 50% (e.g. through use of native or adaptive plants to reduce or eliminate irrigation requirement).</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we3_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE3 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we3" data-assessment-exclusive-group="group-we3" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Do not use potable water at all for landscape irrigation.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we3_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE3 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-we3" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('textarea', [
      'id'          => 'assessment-remark-we3',
      'name'        => 'assessment_remark_we3',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">WE4</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Water Efficient Fittings</div>
    <div class="pb-3">Encourage reduction in potable water consumption through use of efficient devices:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we4" data-assessment-exclusive-group="group-we4" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Reduce annual potable water consumption by ≥ 30%.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we4_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE4 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we4" data-assessment-exclusive-group="group-we4" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Reduce annual potable water consumption by ≥ 50%.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we4_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE4 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-we4" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('textarea', [
      'id'          => 'assessment-remark-we4',
      'name'        => 'assessment_remark_we4',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">WE5</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Metering &amp; Leak Detection System</div>
    <div class="pb-3">Encourage the design of systems that monitors and manages water consumption:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we5" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Use of sub-meters to monitor and manage major water usage for cooling towers, irrigation, kitchens and tenancy use.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we5_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE5 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-we5" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Link all water sub-meters to EMS to facilitate early detection of water leakage.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'we5_2_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'WE5 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-we5">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('textarea', [
      'id'          => 'assessment-remark-we5',
      'name'        => 'assessment_remark_we5',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>
