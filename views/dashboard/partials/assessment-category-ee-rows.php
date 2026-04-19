<tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
  <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
    <div class="flex items-center justify-start gap-3">
      <?php component('icon', [
        'icon_name'  => 'arrow-right-s-line',
        'icon_size'  => '24',
        'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
      ]); ?>
      <div>Design</div>
      <div class="font-normal text-primary-700" data-assessment-section-total>0 <span class="text-brand-500">/ 25</span></div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE1</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Minimum EE Performance</div>
    <div>
      Establish minimum energy efficiency (EE) performance to reduce energy consumption in buildings, thus
      reducing CO2 emission to the atmosphere. Meet the following minimum EE requirements as stipulated in
      MS 1525:2007:
    </div>
    <ol start="1" class="mt-2 list-decimal space-y-1 pl-5">
      <li>
        OTTV ≤ 50, RTTV ≤ 25. Submit calculations using the BEIT software or other GBI approved software(s),
        <br>
        <strong>AND</strong>
      </li>
      <li>
        Provision of Energy Management Control system where Air-conditioned space ≥ 4000m2.
      </li>
    </ol>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'ee1_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'EE1 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee1',
      'name'        => 'assessment_remark_ee1',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE2</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Lighting Zoning</div>
    <div class="pb-3">
      Provide flexible lighting controls to optimise energy savings:
    </div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-2" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            All individual or enclosed spaces to be individually switched; and the size of individually switched lighting zones shall not exceed 100m² for 90% of the NLA; with switching clearly labelled and easily accessible by building occupants.
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee2_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE2 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-2" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            Provide auto-sensor controlled lighting in conjunction with daylighting strategy for all perimeter zones and daylit areas, if any
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee2_2_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE2 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-2" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            Provide motion sensors or equivalent to complement lighting zoning for at least 25% NLA.
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee2_3_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE2 row 3 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-2">0 <span class="font-normal text-brand-500">/ 3</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top">
    <?php component('form/textarea', [
      'id'    => 'assessment-remark-ee2',
      'name'  => 'assessment_remark_ee2',
      'rows'  => 5,
      'value' => 'This criterion rewards the implementation of flexible lighting controls that allow occupants to adjust lighting based on their needs and preferences, while also optimising energy savings. By providing individual switching for enclosed spaces and auto-sensor controls for perimeter zones, the building can significantly reduce energy consumption while maintaining occupant comfort.',
      'class' => 'text-sm',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE3</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
      Electrical sub-metering &amp; Tenant sub-metering
    </div>
    <div>
      Monitor energy consumption of key building services as well as all tenancy areas:
    </div>
    <div>
      Provide sub-metering for all energy uses of ≥ 100kVA; with separate sub-metering for lighting and separately for power at each floor or tenancy, whichever is smaller.
    </div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'ee3_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'EE3 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee3',
      'name'        => 'assessment_remark_ee3',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE4</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Renewable Energy</div>
    <div class="pb-3">
      Encourage use of renewable energy:
    </div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="2">
          <td class="p-3 border border-brand-200">
            Where 0.5 % or 5 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee4_1_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE4 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="3">
          <td class="p-3 border border-brand-200">
            Where 1.0 % or 10 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee4_2_score',
                'label'      => '3',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE4 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="4">
          <td class="p-3 border border-brand-200">
            Where 1.5 % or 20 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee4_3_score',
                'label'      => '4',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE4 row 3 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="5">
          <td class="p-3 border border-brand-200">
            Where 2.0 % or 40 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee4_4_score',
                'label'      => '5',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE4 row 4 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-4" data-assessment-group-mode="max" data-assessment-group-max="5">0 <span class="font-normal text-brand-500">/ 5</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee4',
      'name'        => 'assessment_remark_ee4',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE5</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Advanced EE Performance</div>

    <table class="assessment-table__nested w-full border-collapse mt-3">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="2">
          <td class="p-3 border border-brand-200">
            Exceed Energy Efficiency (EE) performance better than the baseline minimum to reduce energy consumption in the building. Achieve Building Energy Intensity (BEI) ≤ 150 kWh/m2 yr as defined under GBI reference (using BEIT Software or other GBI approved software(s)), OR
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_1_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="3">
          <td class="p-3 border border-brand-200">BEI ≤ 140, OR</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_2_score',
                'label'      => '3',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="5">
          <td class="p-3 border border-brand-200">BEI ≤ 130, OR</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_3_score',
                'label'      => '5',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 3 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="8">
          <td class="p-3 border border-brand-200">BEI ≤ 120, OR</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_4_score',
                'label'      => '8',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 4 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="10">
          <td class="p-3 border border-brand-200">BEI ≤ 110, OR</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_5_score',
                'label'      => '10',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 5 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="12">
          <td class="p-3 border border-brand-200">BEI ≤ 100, OR</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_6_score',
                'label'      => '12',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 6 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="15">
          <td class="p-3 border border-brand-200">BEI ≤ 90</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee5_7_score',
                'label'      => '15',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE5 row 7 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-5" data-assessment-group-mode="max" data-assessment-group-max="15">0 <span class="font-normal text-brand-500">/ 15</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee5',
      'name'        => 'assessment_remark_ee5',
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
      <div>Commissioning</div>
      <div class="font-normal text-primary-700" data-assessment-section-total>0 <span class="text-brand-500">/ 5</span></div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="3">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE6</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
      Enhanced Commissioning of Building Energy Systems
    </div>
    <div>
      Ensure building’s energy related systems are designed and installed to achieve proper commissioning
      so as to realise their full potential and intent. Appoint an independent GBI recognised Commissioning
      Specialist (CxS) at the onset of the design process to verify that comprehensive pre-commissioning and
      commissioning is performed for all the building's energy related systems in accordance with ASHRAE
      Commissioning Guideline or other GBI approved equivalent standard/s by:
    </div>
    <ol type="1" class="list-decimal pl-5 mt-3 space-y-2">
      <li>Conducting at least one commissioning design review during the detail design stage and back-check the review comments during the tender documentation stage.</li>
      <li>Developing and incorporating commissioning requirements into the tender documents.</li>
      <li>Developing and implementing a commissioning plan.</li>
      <li>Verifying the installation and performance of the systems to be commissioned.</li>
      <li>Reviewing contractor submittals applicable to systems being commissioned for compliance.</li>
      <li>Developing a systems manual that provides future operating staff the information needed to understand and optimally operate the commissioned systems.</li>
      <li>Verifying that the requirements for training operating personnel and building occupants are completed.</li>
    </ol>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'ee6_score',
        'label'      => '3',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'EE6 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 3</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee6',
      'name'        => 'assessment_remark_ee6',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE7</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
      Post Occupancy Commissioning
    </div>
    <div class="pb-3">
      Carry out post occupancy commissioning for all tenancy areas after fit-out changes are completed:
    </div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-7" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            Design engineer shall review all tenancy fit-out plans to ensure original design intent is not compromised and upon completion of the fit-out works, verify and fine-tune the installations to suit.
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee7_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE7 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-7" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            Within 12 months of practical completion (or earlier if there is at least 50% occupancy), the CxS shall carry out a full post/re-commissioning of the building's energy related systems to verify that their performance is sustained in conjunction with the completed tenancy fit-outs.
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee7_2_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE7 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-7">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee7',
      'name'        => 'assessment_remark_ee7',
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
      <div>Verification & Maintenance</div>
      <div class="font-normal text-primary-700" data-assessment-section-total>0 <span class="text-brand-500">/ 5</span></div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="2">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE8</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
      EE Verification
    </div>
    <div>
      Verify predicted energy use of key building services:
    </div>
    <ol type="1" class="list-decimal pl-5 mt-3 space-y-2">
      <li>Use Energy Management System to monitor and analyse energy consumption including reading of submeters, AND</li>
      <li>Fully commission EMS including Maximum Demand Limiting programme within 12 months of practical completion (or earlier if there is at least 50% occupancy).</li>
    </ol>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'ee8_score',
        'label'      => '2',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'EE8 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee8',
      'name'        => 'assessment_remark_ee8',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE9</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
      Sustainable Maintenance
    </div>
    <div class="pb-3">
      Ensure the building’s energy related systems will continue to perform as intended beyond the 12 months Defects &amp; Liability Period:
    </div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-9" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <ol type="1" start="1" class="list-decimal pl-5">
              <li>At least 50% of permanent building maintenance team to be on-board one (1) to three (3) months before practical completion and to fully participate (to be specified in contract conditions) in the Testing &amp; Commissioning of all building energy services.</li>
            </ol>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee9_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE9 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-9" data-assessment-points="2">
          <td class="p-3 border border-brand-200">
            <ol type="1" start="2" class="list-decimal pl-5 space-y-2">
              <li>Provide for a designated building maintenance office that is fully equipped with facilities (including tools and instrumentation) and inventory storage.</li>
              <li>Provide evidence of documented plan for at least 3-year facility maintenance and preventive maintenance budget (inclusive of staffing and outsourced contracts).</li>
            </ol>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'ee9_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'EE9 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-9">0 <span class="font-normal text-brand-500">/ 3</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-ee9',
      'name'        => 'assessment_remark_ee9',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>
