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
      <?php component('form/checkbox', [
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
      <?php component('form/checkbox', [
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
              <?php component('form/checkbox', [
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
              <?php component('form/checkbox', [
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
              <?php component('form/checkbox', [
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
              <?php component('form/checkbox', [
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
