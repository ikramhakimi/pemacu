<tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
  <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
    <div class="flex items-center justify-start gap-3">
      <?php component('icon', [
        'icon_name'  => 'arrow-right-s-line',
        'icon_size'  => '24',
        'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
      ]); ?>
      <div>Reused and Recycled Materials</div>
    </div>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR1</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Materials reuse and selection</div>
    <div class="pb-3">Reuse building materials and products to reduce demand for virgin materials and reduce creation of waste. This serves to reduce environmental impact associated with extraction and processing of virgin resources. Integrate building design and its buildability with selection of reused building materials, taking into account their embodied energy, durability, carbon content and life cycle costs:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr1" data-assessment-exclusive-group="group-mr1" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Where reused products/materials constitutes ≥ 2% of the project’s total material cost value.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr1_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR1 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr1" data-assessment-exclusive-group="group-mr1" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Where reused products/materials constitutes ≥ 5% of the project’s total material cost value.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr1_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR1 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-mr1" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr1',
      'name'        => 'assessment_remark_mr1',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR2</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Recycled content materials</div>
    <div class="pb-3">Increase demand for building products that incorporate recycled content materials in their production (Recycled content shall be defined in accordance with the International Organization of Standards Document):</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr2" data-assessment-exclusive-group="group-mr2" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Where use of materials with recycled content is such that the sum of post-consumer recycled plus one-half of the pre-consumer content constitutes ≥ 10% (based on cost) of the total value of the materials in the project.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr2_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR2 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr2" data-assessment-exclusive-group="group-mr2" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Where use of materials with recycled content is such that the sum of post-consumer recycled plus one-half of the pre-consumer content constitutes at least 30% (based on cost) of the total value of the materials in the project.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr2_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR2 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-mr2" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr2',
      'name'        => 'assessment_remark_mr2',
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
      <div>Sustainable Resources</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR3</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Regional Materials</div>
    <div>Use building materials and products that are extracted and manufactured within the region, thereby supporting the use of indigenous resources and reducing the environmental impacts resulting from transportation.</div>
    <div class="mt-2">Use building materials or products that have been extracted, harvested or recovered, as well as manufactured, within 500km of the project site for ≥ 20% (based on cost) of the total material value.</div>
    <div class="mt-2">Mechanical, electrical and plumbing components shall not be included. Only include materials permanently installed in the project.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'mr3_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'MR3 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr3',
      'name'        => 'assessment_remark_mr3',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR4</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Sustainable Timber</div>
    <div>Encourage environmentally responsible forest management.</div>
    <div class="mt-2">Where ≥ 50% of wood-based materials and products used are certified.</div>
    <div class="mt-2">These components include, but are not limited to, structural framing and general dimensional framing, flooring, sub-flooring, wood doors and finishes. To include wood materials permanently installed and also temporarily purchased for the project. Compliance with Forest Stewardship Council and Malaysian Timber Certification Council requirements.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'mr4_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'MR4 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr4',
      'name'        => 'assessment_remark_mr4',
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
      <div>Waste Management</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR5</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Storage &amp; Collection of recyclables</div>
    <div>Facilitate reduction of waste generated during construction and during building occupancy that is hauled and disposed of in landfills.</div>
    <div class="mt-2">During Construction, provide dedicated area/s and storage for collection of non-hazardous materials for recycling.</div>
    <div class="mt-2">AND</div>
    <div class="mt-2">During Building Occupancy, provide permanent recycle bins.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'mr5_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'MR5 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr5',
      'name'        => 'assessment_remark_mr5',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR6</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Construction waste management</div>
    <div class="pb-3">Develop and implement a construction waste management plan that, as a minimum identifies the materials to be diverted from disposal regardless of whether the materials will be sorted on site or co-mingled. Quantify by measuring total truck loads of waste sent for disposal:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr6" data-assessment-exclusive-group="group-mr6" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Recycle and/or salvage ≥ 50% volume of non-hazardous construction debris.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr6_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR6 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr6" data-assessment-exclusive-group="group-mr6" data-assessment-points="2">
          <td class="p-3 border border-brand-200">Recycle and/or salvage ≥ 75% volume of non-hazardous construction debris.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr6_2_score',
                'label'      => '2',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR6 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-mr6" data-assessment-group-mode="max" data-assessment-group-max="2">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr6',
      'name'        => 'assessment_remark_mr6',
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
      <div>Green Products</div>
    </div>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">MR7</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Refrigerants &amp; Clean Agents</div>
    <div class="pb-3">Use environmentally-friendly Refrigerants and Clean Agents exceeding Malaysia’s commitment to the Montreal &amp; Kyoto protocols:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr7" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Use zero Ozone Depleting Potential (ODP) products: non-CFC and non-HCFC refrigerants/clean agents.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr7_1_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR7 row 1 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-mr7" data-assessment-points="1">
          <td class="p-3 border border-brand-200">Use non-synthetic (natural) refrigerants/clean agents with zero ODP and negligible Global Warming Potential.</td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'mr7_2_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'MR7 row 2 score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-mr7">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-mr7',
      'name'        => 'assessment_remark_mr7',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>
