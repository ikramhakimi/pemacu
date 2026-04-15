<tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
  <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
    <div class="flex items-center justify-start gap-3">
      <?php component('icon', [
        'icon_name'  => 'arrow-right-s-line',
        'icon_size'  => '24',
        'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
      ]); ?>
      <div>Innovations</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="6">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">IN1</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Innovation in Design &amp; Environmental Design Initiatives</div>
    <div class="pb-3">Provide design team and project the opportunity to be awarded points for exceptional performance above the requirements set by GBI rating system:</div>
    <div class="pb-3 font-semibold">1 point for each approved innovation and environmental design initiative up to a maximum of 6 points, such as:</div>
    <ul class="list-disc pl-5 pb-3 space-y-2">
      <li>Condensate water recovery (accounting for at least 50% of total AHUs/FCUs) for use as cooling tower make-up water etc;</li>
      <li>Co-generation / Tri-generation system;</li>
      <li>Thermal / PCM / Thermal Mass storage system (accounting for at least 25% of total required capacity);</li>
      <li>Solar thermal technology / Solar Airconditioners (generating at least 10% of total required capacity);</li>
      <li>Heat recovery system (contributing to at least 10% of total required capacity);</li>
      <li>Heat pipe technology;</li>
      <li>Light pipes;</li>
      <li>Auto-condenser tube cleaning system (fitted to plant equipment serving at least 50% of total capacity);</li>
      <li>Non-chemical water treatment system (serving at least 50% of total capacity);</li>
      <li>Mixed mode / low energy ventilation system;</li>
      <li>Advanced air filtration technology (serving at least 50% of the NLA);</li>
      <li>Waterless urinals (fitted to all male toilets);</li>
      <li>Central vacuum system (serving at least 50% of NLA);</li>
      <li>Central Pneumatic Waste Collection system;</li>
      <li>Self-cleaning façade;</li>
      <li>Electrochromic glazed façade;</li>
      <li>Refrigerant leakage detection and recycling facilities;</li>
      <li>Recycling of all fire system water during regular testing.</li>
    </ul>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('form/checkbox', [
        'name'       => 'in1_score',
        'label'      => '6',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'IN1 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 6</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-in1',
      'name'        => 'assessment_remark_in1',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">IN2</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Green Building Index Facilitator</div>
    <div>To support and encourage the design integration required for Green Building Index rated buildings and to streamline the application and certification process.</div>
    <div class="mt-2">At least one principal participant of the project team shall be a Green Building Index Facilitator who is engaged at the onset of the design process until completion of construction and Green Building Index certification is obtained.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('form/checkbox', [
        'name'       => 'in2_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'IN2 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-in2',
      'name'        => 'assessment_remark_in2',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>
