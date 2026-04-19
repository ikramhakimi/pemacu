<tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
  <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
    <div class="flex items-center justify-start gap-3">
      <?php component('icon', [
        'icon_name'  => 'arrow-right-s-line',
        'icon_size'  => '24',
        'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
      ]); ?>
      <div>Site Planning</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM1</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Site Selection</div>
    <div>Do not develop building, hardscape, road or parking area on a site or part of a site that meet any one of the following criteria:</div>
    <ol start="1" class="list-decimal pl-5 mt-2 space-y-2">
      <li>Prime farmland as defined by the Structure Plan of the area or the National Physical Plan.</li>
      <li>Forest reserve or State Environmental Protection Zones that is specifically identified as habitat for any species found on the endangered lists.</li>
      <li>Within 30m of any wetlands as defined by the Structure Plan of the area OR within setback distances from wetlands prescribed in state or local regulations, as defined by local or state rule or law, whichever is more stringent.</li>
      <li>Previously undeveloped land that is within 30m of Mean High Water Spring (MHWS) sea level which supports or could support wildlife or recreational use, or statutory requirements whichever is the more stringent.</li>
      <li>Previously undeveloped land that is within 20m of lake, river, stream and tributary which support or could support wildlife or recreational use.</li>
      <li>Land which prior to acquisition for the project was public parkland, unless land of equal or greater value as parkland is provided.</li>
    </ol>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm1_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM1 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm1',
      'name'        => 'assessment_remark_sm1',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM2</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Brownfield Redevelopment</div>
    <div>Reduce pressure on undeveloped land by rehabilitating damaged sites where development is complicated by environmental contamination, thereby reducing pressure on undeveloped land. This would typically involve old rubbish tips, former mining land, old factory sites, etc.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm2_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM2 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm2',
      'name'        => 'assessment_remark_sm2',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM3</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Development Density &amp; Community Connectivity</div>
    <div class="pb-3">Channel development to urban area with existing infrastructure, protect greenfield and preserve habitat and natural resources:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-sm3" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <div class="font-semibold">A) Development Density</div>
            <div class="mt-2">Construct a new building or renovate an existing building on a previously developed site AND in a community with a minimum density of 20,300m2 per hectare net (87,000 sqft per acre net).</div>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'sm3_a_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'SM3 sub A score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-sm3" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <div class="font-semibold">B) Community Connectivity</div>
            <div class="mt-2">Construct a new building or renovate an existing building on a previously developed site AND within 1km of a residential zone or neighbourhood with an average density of 25 units per hectare net (10 units per acre net) AND within 1km of at least 10 Basic Services AND with pedestrian access between the building and the services.</div>
            <div class="mt-2">Basic Services include, but are not limited to: 1) Bank; 2) Place of Worship; 3) Convenience / Grocery; 4) Day Care; 5) Police Station; 6) Fire Station; 7) Beauty; 8) Hardware; 9) Laundry; 10) Library; 11) Medical / Dental; 12) Senior Care Facility; 13) Park; 14) Pharmacy; 15) Post Office; 16) Restaurant; 17) School; 18) Supermarket; 19) Theatre; 20) Community Centre; 21) Fitness Centre.</div>
            <div class="mt-2">Proximity is determined by drawing a 1km radius around the main building entrance on a site map and counting the services found within that radius.</div>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'sm3_b_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'SM3 sub B score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-sm3">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm3',
      'name'        => 'assessment_remark_sm3',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM4</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Environment Management</div>
    <div class="pb-3">A) Conserve existing natural area and restore damaged area to provide habitat and promote biodiversity &amp; B) Maximize Open Space by providing a high ratio of open space to development footprint to promote biodiversity:</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-sm4" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <div class="font-semibold">A) Conservation</div>
            <div class="mt-2">On previously developed or graded site, restore or protect a minimum of 50% of the site area (excluding the building footprint) with native or adaptive vegetation. Native or adaptive plants are plants indigenous to a locality or cultivars of native plants that are adapted to the local climate and are not considered invasive species or noxious weeds. Applicable also to landscaping on rooftops and roof gardens so long as the plants meet the definition of native or adaptive vegetation.</div>
            <div class="mt-2">OR</div>
            <div class="mt-2">On greenfield sites, limit all site disturbance to within 12m beyond the building perimeter; 3m beyond surface walkway, patio, surface parking and utilities less than 300mm in diameter; 4.5m beyond primary roadway curb and main utility branch trench; and 7.5m beyond constructed area with permeable surface (such as pervious paving area, storm water detention facility and playing field) that require additional staging area in order to limit compaction in the constructed area.</div>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'sm4_a_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'SM4 sub A score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-sm4" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <div class="font-semibold">B) Open Space</div>
            <div class="mt-2">Reduce by 25%, the development footprint (defined as the total area of the building footprint, hardscape, access road and parking) and/or provide vegetated open space within the project boundary to exceed the local zoning’s open space requirement for the site by 25%.</div>
            <div class="mt-2">OR</div>
            <div class="mt-2">For areas with no local zoning requirement (e.g. university campus, military bases), provide vegetated open space adjacent to the building whose area is equal to that of the building footprint.</div>
            <div class="mt-2">OR</div>
            <div class="mt-2">Where a zoning ordinance exists, but there is no requirement for open space (zero), provide vegetated open space equal to 20% of the project’s site area.</div>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'sm4_b_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'SM4 sub B score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-sm4">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm4',
      'name'        => 'assessment_remark_sm4',
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
      <div>Construction Management</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM5</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Earthworks - Construction Activity Pollution Control</div>
    <div>Reduce pollution from construction activities by controlling soil erosion, waterway sedimentation and airborne dust generation.</div>
    <div class="mt-2">Create and implement an Erosion and Sedimentation Control (ESC) Plan for all construction activities associated with the project. The ESC Plan shall conform to the erosion and sedimentation requirements of the approved Earthworks Plans OR local erosion and sedimentation control standards and codes, whichever is the more stringent.</div>
    <div class="mt-2">The plan shall describe the measures implemented to accomplish the following objectives:</div>
    <ol start="1" class="list-decimal pl-5 mt-2 space-y-2">
      <li>Prevent loss of soil during construction by storm water runoff and/or wind erosion, including protecting topsoil by stockpiling for reuse.</li>
      <li>Prevent sedimentation of storm sewer or receiving stream.</li>
      <li>Prevent polluting the air with dust and particulate matter.</li>
    </ol>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm5_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM5 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm5',
      'name'        => 'assessment_remark_sm5',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM6</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">QLASSIC - Quality Assessment System for Building Construction Work</div>
    <div>Achieve quality of workmanship in construction works.</div>
    <div class="mt-2">Subscribe to an independent method to assess and evaluate quality of workmanship of building project based on CIDB's CIS 7: Quality Assessment System for Building Construction Work (QLASSIC). Must achieve a minimum score of 70%.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm6_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM6 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm6',
      'name'        => 'assessment_remark_sm6',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM7</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Workers' Site Amenities</div>
    <div>Reduce pollution from construction activities by controlling pollution from waste and rubbish from workers.</div>
    <div class="mt-2">Create and implement a Site Amenities Plan for all construction workers associated with the project. The plan shall describe the measures implemented to accomplish the following objectives:</div>
    <ol start="1" class="list-decimal pl-5 mt-2 space-y-2">
      <li>Proper accommodation for construction workers at the site or at temporary rented accommodation nearby.</li>
      <li>Prevent pollution of storm sewer or receiving stream by having proper septic tank.</li>
      <li>Prevent polluting the surrounding area from open burning and proper disposal of domestic waste.</li>
      <li>Provide adequate health and hygiene facilities for workers on site.</li>
    </ol>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm7_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM7 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm7',
      'name'        => 'assessment_remark_sm7',
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
      <div>Transportation</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM8</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Public Transportation Access</div>
    <div>Reduce pollution and land development impacts from automobile use.</div>
    <div class="mt-2">Locate project within 1km of an existing, or planned and funded, commuter rail, light rail or subway station.</div>
    <div class="mt-2">OR</div>
    <div class="mt-2">Locate project within 500m of at least one bus stop.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm8_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM8 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm8',
      'name'        => 'assessment_remark_sm8',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM9</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Green Vehicle Priority - Low Emitting &amp; Fuel Efficient Vehicles</div>
    <div>Encourage use of green vehicles.</div>
    <div class="mt-2">Provide low-emitting and fuel-efficient vehicles for 5% of Full-Time Equivalent (FTE) occupants AND provide preferred parking for these vehicles.</div>
    <div class="mt-2">"Preferred parking" refers to the parking spots that are closest to the main entrance of the project (exclusive of spaces designated for handicapped or parking passes provided at a discounted price).</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm9_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM9 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm9',
      'name'        => 'assessment_remark_sm9',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM10</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Parking Capacity</div>
    <div>Discourage over-provision of car parking capacity.</div>
    <div class="mt-2">Size parking capacity to meet, but not to exceed the minimum local zoning requirements, AND provide preferred parking for carpools or vanpools for 5% of the total provided parking spaces.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm10_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM10 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm10',
      'name'        => 'assessment_remark_sm10',
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
      <div>Design</div>
    </div>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM11</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Stormwater Design - Quantity &amp; Quality Control</div>
    <div>Limit disruption of natural hydrology by reducing impervious cover, increasing on-site infiltration, and managing storm water runoff. Reduce or eliminate water pollution by reducing impervious cover, increasing onsite infiltration, eliminating sources of contaminants, and removing pollutants from storm water runoff.</div>
    <div class="mt-2 font-semibold uppercase">Condition 1 (If existing imperviousness is &le; 50%):</div>
    <div class="mt-2">Implement a storm water management plan that prevents the post development peak discharge rate and quantity from exceeding the pre-development peak discharge rate and quantity in conformance to the Storm Water Management Manual for Malaysia (MASMA).</div>
    <div class="mt-2 font-semibold uppercase">Condition 2 (If existing imperviousness is &gt; 50%):</div>
    <div class="mt-2">Implement a storm water management plan that results in a 25% decrease in the volume of storm water runoff required under MASMA.</div>
    <div class="mt-2">For either condition, implement a storm water management plan that reduces impervious cover, promotes infiltration, and captures and treats the storm water runoff from 90% of the average annual rainfall using acceptable best management practices (BMPs).</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm11_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM11 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm11',
      'name'        => 'assessment_remark_sm11',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr>
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM12</div>
  </td>
  <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Greenery &amp; Roof</div>
    <div class="pb-3">Reduce heat island (thermal gradient difference between developed and undeveloped areas) to minimize impact on microclimate and human and wildlife habitat.</div>

    <table class="assessment-table__nested w-full border-collapse">
      <tbody>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-sm12" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <div class="font-semibold">A) Hardscape &amp; Greenery Application</div>
            <div class="mt-2">Provide any combination of the following strategies for 50% of the site hardscape (including sidewalks, courtyards, plazas and parking lots):</div>
            <ol start="1" class="list-decimal pl-5 mt-2 space-y-2">
              <li>Shade (within 5 years of occupancy).</li>
              <li>Paving materials with a Solar Reflectance Index (SRI) of at least 29.</li>
              <li>Open grid pavement system.</li>
            </ol>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'sm12_a_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'SM12 sub A score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
        <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-sm12" data-assessment-points="1">
          <td class="p-3 border border-brand-200">
            <div class="font-semibold">B) Roof Application</div>
            <ol start="1" class="list-decimal pl-5 mt-2 space-y-2">
              <li>Use roofing material with a Solar Reflectance Index (SRI) equal to or greater than the value in the table below for a minimum of 75% of the roof surface.</li>
            </ol>
            <div class="mt-2">OR</div>
            <ol start="2" class="list-decimal pl-5 mt-2 space-y-2">
              <li>Install a vegetated roof for at least 50% of the roof area.</li>
            </ol>
            <div class="mt-2">OR</div>
            <ol start="3" class="list-decimal pl-5 mt-2 space-y-2">
              <li>Install high albedo and vegetated roof surfaces that, in combination, meet the following criteria: (Area of SRI Roof / 0.75) + (Area of vegetated roof / 0.5) &ge; Total Roof Area.</li>
            </ol>
            <div class="mt-2">Roof Type / Slope / SRI:</div>
            <div class="mt-2">Low-Sloped Roof (&lt; 2:12): 78</div>
            <div class="mt-1">Steep-Sloped Roof (&gt; 2:12): 29</div>
          </td>
          <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
            <div class="flex items-center justify-end">
              <?php component('checkbox', [
                'name'       => 'sm12_b_score',
                'label'      => '1',
                'checked'    => false,
                'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                'attributes' => [
                  'aria-label' => 'SM12 sub B score',
                ],
              ]); ?>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-sm12">0 <span class="font-normal text-brand-500">/ 2</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm12',
      'name'        => 'assessment_remark_sm12',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>

<tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
  <td class="p-3 border border-brand-200 align-top">
    <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">SM13</div>
  </td>
  <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
    <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Building User Manual</div>
    <div>Document green building design features and strategies for user information and guide to sustain performance during occupancy.</div>
    <div class="mt-2">Provide a Building User Manual which documents passive and active features that should not be downgraded.</div>
  </td>
  <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
    <div class="flex items-center justify-end">
      <?php component('checkbox', [
        'name'       => 'sm13_score',
        'label'      => '1',
        'checked'    => false,
        'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
        'attributes' => [
          'aria-label' => 'SM13 score',
        ],
      ]); ?>
    </div>
  </td>
  <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
    <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
  </td>
  <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
    <?php component('form/textarea', [
      'id'          => 'assessment-remark-sm13',
      'name'        => 'assessment_remark_sm13',
      'rows'        => 5,
      'value'       => 'No remarks',
      'placeholder' => 'Add remarks...',
      'class'       => 'text-sm font-normal',
    ]); ?>
  </td>
</tr>
