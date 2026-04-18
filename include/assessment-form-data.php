<?php

declare(strict_types=1);

if (!function_exists('assessment_form_data')) {
  function assessment_form_data(): array
  {
    $data = [
      'categories' => [
        'ee' => [
          'category_key'   => 'ee',
          'category_title' => 'Energy Efficiency (EE)',
          'category_icon'  => 'flashlight-line',
          'category_subtitle' => 'Reduce operational energy demand and improve overall building performance.',
          'sections'       => [
            [
              'section_key'   => 'design',
              'section_title' => 'Design',
              'items'         => [
                [
                  'item_key'          => 'ee1',
                  'code'              => 'EE1',
                  'title'             => 'Minimum EE Performance',
                  'criteria'          => 'Establish minimum energy efficiency (EE) performance to reduce energy consumption in buildings, thus reducing CO2 emission to the atmosphere. Meet the following minimum EE requirements as stipulated in MS 1525:2007: OTTV ≤ 50, RTTV ≤ 25. Submit calculations using the BEIT software or other GBI approved software(s), AND provision of Energy Management Control system where Air-conditioned space ≥ 4000m2.',
                  'criteria_preview'  => 'Meet minimum EE requirements under MS 1525:2007.',
                  'attachments_count' => 2,
                  'remarks_preview'   => 'Baseline BEIT calculation attached.',
                  'status_override'   => '',
                  'scoring'           => [
                    'mode'         => 'sum',
                    'max_points'   => 1,
                    'earned_points'=> 1,
                    'options'      => [
                      [
                        'label'       => '1',
                        'points'      => 1,
                        'selected'    => true,
                        'description' => 'OTTV ≤ 50 and RTTV ≤ 25 with submitted BEIT (or GBI-approved) calculations, including Energy Management Control system where air-conditioned space is ≥ 4000m2.',
                      ],
                    ],
                  ],
                ],
                [
                  'item_key'          => 'ee2',
                  'code'              => 'EE2',
                  'title'             => 'Lighting Zoning',
                  'criteria'          => 'Provide flexible lighting controls to optimise energy savings.',
                  'criteria_preview'  => 'Provide zoning, daylight-linked controls, and occupancy sensors.',
                  'attachments_count' => 4,
                  'remarks_preview'   => 'Sensor coverage map submitted.',
                  'status_override'   => '',
                  'scoring'           => [
                    'mode'         => 'sum',
                    'max_points'   => 3,
                    'earned_points'=> 1,
                    'options'      => [
                      [
                        'label'       => '1',
                        'points'      => 1,
                        'selected'    => true,
                        'description' => 'All individual or enclosed spaces to be individually switched; and the size of individually switched lighting zones shall not exceed 100m² for 90% of the NLA; with switching clearly labelled and easily accessible by building occupants.',
                      ],
                      [
                        'label'       => '1',
                        'points'      => 1,
                        'selected'    => false,
                        'description' => 'Provide auto-sensor controlled lighting in conjunction with daylighting strategy for all perimeter zones and daylit areas, if any.',
                      ],
                      [
                        'label'       => '1',
                        'points'      => 1,
                        'selected'    => false,
                        'description' => 'Provide motion sensors or equivalent to complement lighting zoning for at least 25% NLA.',
                      ],
                    ],
                  ],
                ],
                [
                  'item_key'          => 'ee3',
                  'code'              => 'EE3',
                  'title'             => 'Electrical sub-metering & Tenant sub-metering',
                  'criteria_preview'  => 'Sub-meter key services and tenancy areas by required thresholds.',
                  'attachments_count' => 1,
                  'remarks_preview'   => '',
                  'status_override'   => '',
                  'scoring'           => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0],
                ],
                [
                  'item_key'          => 'ee4',
                  'code'              => 'EE4',
                  'title'             => 'Renewable Energy',
                  'criteria'          => 'Encourage use of renewable energy:',
                  'criteria_preview'  => 'Achieve renewable generation threshold relative to total electricity use.',
                  'attachments_count' => 7,
                  'remarks_preview'   => 'Awaiting final commissioning certificate for PV system.',
                  'status_override'   => 'missing_evidence',
                  'scoring'           => [
                    'mode'         => 'max',
                    'max_points'   => 5,
                    'earned_points'=> 3,
                    'options'      => [
                      [
                        'label'       => '2',
                        'points'      => 2,
                        'selected'    => false,
                        'description' => 'Where 0.5 % or 5 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR',
                      ],
                      [
                        'label'       => '3',
                        'points'      => 3,
                        'selected'    => true,
                        'description' => 'Where 1.0 % or 10 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR',
                      ],
                      [
                        'label'       => '4',
                        'points'      => 4,
                        'selected'    => false,
                        'description' => 'Where 1.5 % or 20 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR',
                      ],
                      [
                        'label'       => '5',
                        'points'      => 5,
                        'selected'    => false,
                        'description' => 'Where 2.0 % or 40 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy',
                      ],
                    ],
                  ],
                ],
                [
                  'item_key'          => 'ee5',
                  'code'              => 'EE5',
                  'title'             => 'Advanced EE Performance',
                  'criteria_preview'  => 'Improve BEI beyond baseline for higher performance points.',
                  'attachments_count' => 0,
                  'remarks_preview'   => '',
                  'status_override'   => '',
                  'scoring'           => ['mode' => 'max', 'max_points' => 15, 'earned_points' => 0],
                ],
              ],
            ],
            [
              'section_key'   => 'commissioning',
              'section_title' => 'Commissioning',
              'items'         => [
                [
                  'item_key'          => 'ee6',
                  'code'              => 'EE6',
                  'title'             => 'Enhanced Commissioning of Building Energy Systems',
                  'criteria_preview'  => 'Appoint CxS and execute commissioning workflow.',
                  'attachments_count' => 3,
                  'remarks_preview'   => 'CxS appointment letter and plan uploaded.',
                  'status_override'   => '',
                  'scoring'           => ['mode' => 'sum', 'max_points' => 3, 'earned_points' => 3],
                ],
                [
                  'item_key'          => 'ee7',
                  'code'              => 'EE7',
                  'title'             => 'Post Occupancy Commissioning',
                  'criteria_preview'  => 'Complete post/re-commissioning within required timeline.',
                  'attachments_count' => 0,
                  'remarks_preview'   => '',
                  'status_override'   => '',
                  'scoring'           => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0],
                ],
              ],
            ],
            [
              'section_key'   => 'verification_maintenance',
              'section_title' => 'Verification & Maintenance',
              'items'         => [
                ['item_key' => 'ee8', 'code' => 'EE8', 'title' => 'Energy Policy & Management System', 'criteria_preview' => 'Implement policy and management framework for EE operations.', 'attachments_count' => 1, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'ee9', 'code' => 'EE9', 'title' => 'Measurement & Verification', 'criteria_preview' => 'Establish M&V process for building energy performance.', 'attachments_count' => 1, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
          ],
        ],

        'eq' => [
          'category_key'   => 'eq',
          'category_title' => 'Indoor Environmental Quality (EQ)',
          'category_icon'  => 'windy-line',
          'category_subtitle' => 'Strengthen occupant comfort, health, and indoor environmental conditions.',
          'sections'       => [
            [
              'section_key'   => 'air_quality',
              'section_title' => 'Air Quality',
              'items'         => [
                ['item_key' => 'eq1', 'code' => 'EQ1', 'title' => 'Minimum IAQ Performance', 'criteria_preview' => 'Establish minimum IAQ performance for occupants.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'eq2', 'code' => 'EQ2', 'title' => 'Environmental Tobacco Smoke (ETS) Control', 'criteria_preview' => 'Minimize ETS exposure in occupied areas.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'eq3', 'code' => 'EQ3', 'title' => 'Carbon Dioxide Monitoring and Control', 'criteria_preview' => 'Provide CO2 monitoring for ventilation performance.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'eq4', 'code' => 'EQ4', 'title' => 'Indoor Air Pollutants', 'criteria_preview' => 'Control low VOC and formaldehyde emissions.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'eq5', 'code' => 'EQ5', 'title' => 'Mould Prevention', 'criteria_preview' => 'Reduce risk of mould growth and related health effects.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'thermal_comfort',
              'section_title' => 'Thermal Comfort',
              'items'         => [
                ['item_key' => 'eq6', 'code' => 'EQ6', 'title' => 'Thermal Comfort: Design & Controllability of Systems', 'criteria_preview' => 'Meet thermal comfort standards and controllability.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'eq7', 'code' => 'EQ7', 'title' => 'Air Change Effectiveness', 'criteria_preview' => 'Provide effective clean air delivery and distribution.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'lighting_visual_acoustic',
              'section_title' => 'Lighting, Visual & Acoustic Comfort',
              'items'         => [
                ['item_key' => 'eq8', 'code' => 'EQ8', 'title' => 'Daylighting', 'criteria_preview' => 'Provide adequate natural daylight to occupied spaces.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'eq9', 'code' => 'EQ9', 'title' => 'Daylight Glare Control', 'criteria_preview' => 'Reduce glare discomfort from natural light.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'eq10', 'code' => 'EQ10', 'title' => 'Electric Lighting Levels', 'criteria_preview' => 'Avoid over-design of baseline office lighting.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'eq11', 'code' => 'EQ11', 'title' => 'High Frequency Ballasts', 'criteria_preview' => 'Reduce low frequency flicker from fluorescent lighting.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'eq12', 'code' => 'EQ12', 'title' => 'External Views', 'criteria_preview' => 'Provide occupants with quality external views.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'eq13', 'code' => 'EQ13', 'title' => 'Internal Noise Levels', 'criteria_preview' => 'Maintain suitable internal ambient noise levels.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'verification',
              'section_title' => 'Verification',
              'items'         => [
                ['item_key' => 'eq14', 'code' => 'EQ14', 'title' => 'IAQ Before & During Occupancy', 'criteria_preview' => 'Implement IAQ management and verification process.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'eq15', 'code' => 'EQ15', 'title' => 'Post Occupancy Comfort Survey: Verification', 'criteria_preview' => 'Assess occupant comfort after occupancy.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
          ],
        ],

        'sm' => [
          'category_key'   => 'sm',
          'category_title' => 'Sustainable Site Planning & Management (SM)',
          'category_icon'  => 'road-map-line',
          'category_subtitle' => 'Improve site impact, mobility access, and sustainable planning outcomes.',
          'sections'       => [
            [
              'section_key'   => 'site_planning',
              'section_title' => 'Site Planning',
              'items'         => [
                ['item_key' => 'sm1', 'code' => 'SM1', 'title' => 'Site Selection', 'criteria_preview' => 'Select site with minimal environmental sensitivity impacts.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm2', 'code' => 'SM2', 'title' => 'Brownfield Redevelopment', 'criteria_preview' => 'Prioritize redevelopment of previously disturbed sites.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm3', 'code' => 'SM3', 'title' => 'Development Density & Community Connectivity', 'criteria_preview' => 'Encourage dense, connected development footprint.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'sm4', 'code' => 'SM4', 'title' => 'Environment Management', 'criteria_preview' => 'Implement comprehensive environmental management measures.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'construction_management',
              'section_title' => 'Construction Management',
              'items'         => [
                ['item_key' => 'sm5', 'code' => 'SM5', 'title' => 'Earthworks - Construction Activity Pollution Control', 'criteria_preview' => 'Control erosion, sedimentation, and dust pollution.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm6', 'code' => 'SM6', 'title' => 'QLASSIC - Quality Assessment System for Building Construction Work', 'criteria_preview' => 'Achieve workmanship quality via QLASSIC assessment.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm7', 'code' => 'SM7', 'title' => "Workers' Site Amenities", 'criteria_preview' => 'Provide proper worker welfare and site amenities.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'transportation',
              'section_title' => 'Transportation',
              'items'         => [
                ['item_key' => 'sm8', 'code' => 'SM8', 'title' => 'Public Transportation Access', 'criteria_preview' => 'Improve accessibility to public transport.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm9', 'code' => 'SM9', 'title' => 'Green Vehicle Priority - Low Emitting & Fuel Efficient Vehicles', 'criteria_preview' => 'Prioritize low-emission and fuel-efficient vehicles.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm10', 'code' => 'SM10', 'title' => 'Parking Capacity', 'criteria_preview' => 'Discourage over-provision of parking spaces.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'design',
              'section_title' => 'Design',
              'items'         => [
                ['item_key' => 'sm11', 'code' => 'SM11', 'title' => 'Stormwater Design - Quantity & Quality Control', 'criteria_preview' => 'Manage stormwater runoff quantity and quality.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'sm12', 'code' => 'SM12', 'title' => 'Greenery & Roof', 'criteria_preview' => 'Integrate greenery strategy including roof opportunities.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'sm13', 'code' => 'SM13', 'title' => 'Building User Manual', 'criteria_preview' => 'Document design strategies for operational users.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
          ],
        ],

        'mr' => [
          'category_key'   => 'mr',
          'category_title' => 'Material & Resources (MR)',
          'category_icon'  => 'recycle-line',
          'category_subtitle' => 'Encourage responsible sourcing, reuse, and effective waste reduction.',
          'sections'       => [
            [
              'section_key'   => 'reused_recycled',
              'section_title' => 'Reused and Recycled Materials',
              'items'         => [
                ['item_key' => 'mr1', 'code' => 'MR1', 'title' => 'Materials reuse and selection', 'criteria_preview' => 'Promote material reuse and responsible selection.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'mr2', 'code' => 'MR2', 'title' => 'Recycled content materials', 'criteria_preview' => 'Increase use of recycled content materials.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'sustainable_resources',
              'section_title' => 'Sustainable Resources',
              'items'         => [
                ['item_key' => 'mr3', 'code' => 'MR3', 'title' => 'Regional Materials', 'criteria_preview' => 'Use regionally sourced materials to reduce transport impact.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'mr4', 'code' => 'MR4', 'title' => 'Sustainable Timber', 'criteria_preview' => 'Use responsibly sourced timber.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'waste_management',
              'section_title' => 'Waste Management',
              'items'         => [
                ['item_key' => 'mr5', 'code' => 'MR5', 'title' => 'Storage & Collection of recyclables', 'criteria_preview' => 'Facilitate recycling operations in occupancy phase.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
                ['item_key' => 'mr6', 'code' => 'MR6', 'title' => 'Construction waste management', 'criteria_preview' => 'Reduce construction waste sent to landfill.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'green_products',
              'section_title' => 'Green Products',
              'items'         => [
                ['item_key' => 'mr7', 'code' => 'MR7', 'title' => 'Refrigerants & Clean Agents', 'criteria_preview' => 'Reduce ozone depletion and global warming potential impacts.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
          ],
        ],

        'we' => [
          'category_key'   => 'we',
          'category_title' => 'Water Efficiency (WE)',
          'category_icon'  => 'water-flash-line',
          'category_subtitle' => 'Reduce potable water use through efficiency, harvesting, and reuse measures.',
          'sections'       => [
            [
              'section_key'   => 'water_harvesting_recycling',
              'section_title' => 'Water Harvesting & Recycling',
              'items'         => [
                ['item_key' => 'we1', 'code' => 'WE1', 'title' => 'Rainwater Harvesting', 'criteria_preview' => 'Capture and reuse rainwater to reduce potable demand.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'we2', 'code' => 'WE2', 'title' => 'Water Recycling', 'criteria_preview' => 'Implement on-site recycling and reuse systems.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
            [
              'section_key'   => 'increased_efficiency',
              'section_title' => 'Increased Efficiency',
              'items'         => [
                ['item_key' => 'we3', 'code' => 'WE3', 'title' => 'Water Efficient - Irrigation/Landscaping', 'criteria_preview' => 'Improve outdoor water efficiency for landscape.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'we4', 'code' => 'WE4', 'title' => 'Water Efficient Fittings', 'criteria_preview' => 'Use efficient fixtures to reduce potable water use.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'max', 'max_points' => 2, 'earned_points' => 0]],
                ['item_key' => 'we5', 'code' => 'WE5', 'title' => 'Metering & Leak Detection System', 'criteria_preview' => 'Track consumption and detect leaks proactively.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 2, 'earned_points' => 0]],
              ],
            ],
          ],
        ],

        'in' => [
          'category_key'   => 'in',
          'category_title' => 'Innovation (IN)',
          'category_icon'  => 'lightbulb-flash-line',
          'category_subtitle' => 'Recognize exemplary strategies that go beyond baseline credit requirements.',
          'sections'       => [
            [
              'section_key'   => 'innovations',
              'section_title' => 'Innovations',
              'items'         => [
                ['item_key' => 'in1', 'code' => 'IN1', 'title' => 'Innovation in Design & Environmental Design Initiatives', 'criteria_preview' => 'Reward innovative sustainability strategies beyond baseline criteria.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 6, 'earned_points' => 0]],
                ['item_key' => 'in2', 'code' => 'IN2', 'title' => 'Green Building Index Facilitator', 'criteria_preview' => 'Recognize involvement of qualified GBI facilitator.', 'attachments_count' => 0, 'remarks_preview' => '', 'status_override' => '', 'scoring' => ['mode' => 'sum', 'max_points' => 1, 'earned_points' => 0]],
              ],
            ],
          ],
        ],
      ],
    ];

    return assessment_form_apply_parity($data);
  }
}

if (!function_exists('assessment_form_category_data')) {
  function assessment_form_category_data(string $category_key = 'ee'): array
  {
    $data = assessment_form_data();
    $categories = isset($data['categories']) && is_array($data['categories'])
      ? $data['categories']
      : [];

    if (isset($categories[$category_key]) && is_array($categories[$category_key])) {
      return $categories[$category_key];
    }

    if ($categories !== []) {
      $first = reset($categories);
      if (is_array($first)) {
        return $first;
      }
    }

    return [
      'category_key'   => $category_key,
      'category_title' => 'Assessment Category',
      'category_icon'  => 'shapes-line',
      'sections'       => [],
    ];
  }
}

if (!function_exists('assessment_status_legend')) {
  function assessment_status_legend(): array
  {
    return [
      ['key' => 'not_started', 'label' => 'Not Started'],
      ['key' => 'in_progress', 'label' => 'In Progress'],
      ['key' => 'completed', 'label' => 'Completed'],
      ['key' => 'missing_evidence', 'label' => 'Missing Evidence'],
    ];
  }
}

if (!function_exists('assessment_form_parity_items')) {
  function assessment_form_parity_items(): array
  {
    static $parity_items = null;

    if (is_array($parity_items)) {
      return $parity_items;
    }

    $parity_file = __DIR__ . '/assessment-form-parity.json';

    if (!is_file($parity_file)) {
      $parity_items = [];
      return $parity_items;
    }

    $raw = file_get_contents($parity_file);
    if (!is_string($raw) || $raw === '') {
      $parity_items = [];
      return $parity_items;
    }

    $decoded = json_decode($raw, true);
    $parity_items = is_array($decoded) ? $decoded : [];

    return $parity_items;
  }
}

if (!function_exists('assessment_apply_selection_to_options')) {
  function assessment_apply_selection_to_options(array $options, string $mode, int $earned_points): array
  {
    $resolved_options = [];

    foreach ($options as $option) {
      if (!is_array($option)) {
        continue;
      }

      $resolved_options[] = [
        'label'       => isset($option['label']) ? (string) $option['label'] : '',
        'points'      => isset($option['points']) && is_numeric($option['points']) ? (int) $option['points'] : 0,
        'selected'    => false,
        'description' => isset($option['description']) ? (string) $option['description'] : '',
      ];
    }

    if ($earned_points <= 0 || $resolved_options === []) {
      return $resolved_options;
    }

    if ($mode === 'max') {
      foreach ($resolved_options as $index => $option) {
        if ($option['points'] === $earned_points) {
          $resolved_options[$index]['selected'] = true;
          return $resolved_options;
        }
      }

      $best_index = null;
      $best_points = -1;
      foreach ($resolved_options as $index => $option) {
        if ($option['points'] <= $earned_points && $option['points'] > $best_points) {
          $best_points = $option['points'];
          $best_index = $index;
        }
      }

      if ($best_index !== null) {
        $resolved_options[$best_index]['selected'] = true;
      }

      return $resolved_options;
    }

    $remaining = $earned_points;
    foreach ($resolved_options as $index => $option) {
      if ($option['points'] <= 0) {
        continue;
      }

      if ($remaining >= $option['points']) {
        $resolved_options[$index]['selected'] = true;
        $remaining -= $option['points'];
      }
    }

    return $resolved_options;
  }
}

if (!function_exists('assessment_merge_item_with_parity')) {
  function assessment_merge_item_with_parity(array $item, array $parity_item): array
  {
    $item_scoring = isset($item['scoring']) && is_array($item['scoring']) ? $item['scoring'] : [];
    $parity_scoring = isset($parity_item['scoring']) && is_array($parity_item['scoring']) ? $parity_item['scoring'] : [];

    $earned_points = isset($item_scoring['earned_points']) && is_numeric($item_scoring['earned_points'])
      ? (int) $item_scoring['earned_points']
      : 0;

    $mode = isset($parity_scoring['mode']) ? (string) $parity_scoring['mode'] : 'sum';
    $max_points = isset($parity_scoring['max_points']) && is_numeric($parity_scoring['max_points'])
      ? (int) $parity_scoring['max_points']
      : 0;
    $options = isset($parity_scoring['options']) && is_array($parity_scoring['options'])
      ? $parity_scoring['options']
      : [];

    $item['title'] = isset($parity_item['title']) && trim((string) $parity_item['title']) !== ''
      ? (string) $parity_item['title']
      : (isset($item['title']) ? (string) $item['title'] : '');
    $item['criteria'] = isset($parity_item['criteria']) ? (string) $parity_item['criteria'] : (isset($item['criteria']) ? (string) $item['criteria'] : '');
    $item['criteria_preview'] = isset($parity_item['criteria_preview']) && trim((string) $parity_item['criteria_preview']) !== ''
      ? (string) $parity_item['criteria_preview']
      : (isset($item['criteria_preview']) ? (string) $item['criteria_preview'] : '');

    $item['scoring'] = [
      'mode'          => $mode,
      'max_points'    => $max_points,
      'earned_points' => $earned_points,
      'options'       => assessment_apply_selection_to_options($options, $mode, $earned_points),
    ];

    return $item;
  }
}

if (!function_exists('assessment_form_apply_parity')) {
  function assessment_form_apply_parity(array $data): array
  {
    $parity_items = assessment_form_parity_items();
    if ($parity_items === []) {
      return $data;
    }

    $categories = isset($data['categories']) && is_array($data['categories'])
      ? $data['categories']
      : [];

    foreach ($categories as $category_key => $category) {
      if (!is_array($category)) {
        continue;
      }

      $sections = isset($category['sections']) && is_array($category['sections']) ? $category['sections'] : [];
      foreach ($sections as $section_index => $section) {
        if (!is_array($section)) {
          continue;
        }

        $items = isset($section['items']) && is_array($section['items']) ? $section['items'] : [];
        foreach ($items as $item_index => $item) {
          if (!is_array($item)) {
            continue;
          }

          $item_code = isset($item['code']) ? strtolower(trim((string) $item['code'])) : '';
          if ($item_code === '' || !isset($parity_items[$item_code]) || !is_array($parity_items[$item_code])) {
            continue;
          }

          $items[$item_index] = assessment_merge_item_with_parity($item, $parity_items[$item_code]);
        }

        $sections[$section_index]['items'] = $items;
      }

      $categories[$category_key]['sections'] = $sections;
    }

    $data['categories'] = $categories;
    return $data;
  }
}

if (!function_exists('assessment_resolve_item_scoring')) {
  function assessment_resolve_item_scoring(array $item): array
  {
    $scoring = isset($item['scoring']) && is_array($item['scoring']) ? $item['scoring'] : [];
    $mode = isset($scoring['mode']) ? (string) $scoring['mode'] : 'sum';

    $max_points = isset($scoring['max_points']) && is_numeric($scoring['max_points'])
      ? (int) $scoring['max_points']
      : 0;
    $earned_points = isset($scoring['earned_points']) && is_numeric($scoring['earned_points'])
      ? (int) $scoring['earned_points']
      : 0;
    $options = isset($scoring['options']) && is_array($scoring['options']) ? $scoring['options'] : [];

    if ($max_points <= 0) {
      foreach ($options as $option) {
        $points = isset($option['points']) && is_numeric($option['points']) ? (int) $option['points'] : 0;
        $selected = isset($option['selected']) ? (bool) $option['selected'] : false;

        if ($mode === 'max') {
          if ($points > $max_points) {
            $max_points = $points;
          }

          if ($selected && $points > $earned_points) {
            $earned_points = $points;
          }

          continue;
        }

        $max_points += $points;

        if ($selected) {
          $earned_points += $points;
        }
      }
    }

    return [
      'mode'         => $mode,
      'max_points'   => $max_points,
      'earned_points'=> $earned_points,
      'options'      => $options,
    ];
  }
}

if (!function_exists('assessment_resolve_item_status')) {
  function assessment_resolve_item_status(array $item, int $earned_points, int $max_points): string
  {
    $status = isset($item['status_override']) ? trim((string) $item['status_override']) : '';

    if ($status !== '') {
      return $status;
    }

    if ($earned_points <= 0) {
      return 'not_started';
    }

    if ($earned_points >= $max_points && $max_points > 0) {
      return 'completed';
    }

    return 'in_progress';
  }
}

if (!function_exists('assessment_build_bar_payload')) {
  function assessment_build_bar_payload(array $item): array
  {
    $resolved_scoring = assessment_resolve_item_scoring($item);
    $max_points = $resolved_scoring['max_points'];
    $earned_points = $resolved_scoring['earned_points'];
    $status = assessment_resolve_item_status($item, $earned_points, $max_points);

    $remarks_preview = isset($item['remarks_preview']) ? trim((string) $item['remarks_preview']) : '';

    return [
      'assessment_bar_item_key'    => isset($item['item_key']) ? (string) $item['item_key'] : '',
      'assessment_bar_code'        => isset($item['code']) ? (string) $item['code'] : '',
      'assessment_bar_title'       => isset($item['title']) ? (string) $item['title'] : '',
      'assessment_bar_status'      => $status,
      'assessment_bar_score'       => (string) $earned_points . '/' . (string) $max_points . ' pts',
      'assessment_bar_files'       => isset($item['attachments_count']) && is_numeric($item['attachments_count']) ? (int) $item['attachments_count'] : 0,
      'assessment_bar_has_remarks' => $remarks_preview !== '',
    ];
  }
}

if (!function_exists('assessment_form_items_map')) {
  function assessment_form_items_map(array $assessment_source): array
  {
    $categories = isset($assessment_source['categories']) && is_array($assessment_source['categories'])
      ? $assessment_source['categories']
      : [];

    $items_map = [];

    foreach ($categories as $category) {
      $category_title = isset($category['category_title']) ? (string) $category['category_title'] : 'Category';
      $sections = isset($category['sections']) && is_array($category['sections']) ? $category['sections'] : [];

      foreach ($sections as $section) {
        $section_title = isset($section['section_title']) ? (string) $section['section_title'] : 'Section';
        $items = isset($section['items']) && is_array($section['items']) ? $section['items'] : [];

        foreach ($items as $item) {
          $item_key = isset($item['item_key']) ? trim((string) $item['item_key']) : '';

          if ($item_key === '') {
            continue;
          }

          $resolved_scoring = assessment_resolve_item_scoring($item);
          $max_points = $resolved_scoring['max_points'];
          $earned_points = $resolved_scoring['earned_points'];

          $criteria_text = isset($item['criteria']) && trim((string) $item['criteria']) !== ''
            ? trim((string) $item['criteria'])
            : (isset($item['criteria_preview']) ? trim((string) $item['criteria_preview']) : '');

          $items_map[$item_key] = [
            'item_key'          => $item_key,
            'code'              => isset($item['code']) ? (string) $item['code'] : '',
            'title'             => isset($item['title']) ? (string) $item['title'] : '',
            'category_title'    => $category_title,
            'section_title'     => $section_title,
            'criteria'          => $criteria_text,
            'criteria_preview'  => isset($item['criteria_preview']) ? (string) $item['criteria_preview'] : '',
            'remarks_preview'   => isset($item['remarks_preview']) ? (string) $item['remarks_preview'] : '',
            'attachments_count' => isset($item['attachments_count']) && is_numeric($item['attachments_count'])
              ? (int) $item['attachments_count']
              : 0,
            'status'            => assessment_resolve_item_status($item, $earned_points, $max_points),
            'scoring'           => [
              'mode'          => $resolved_scoring['mode'],
              'earned_points' => $earned_points,
              'max_points'    => $max_points,
              'options'       => $resolved_scoring['options'],
            ],
          ];
        }
      }
    }

    return $items_map;
  }
}

if (!function_exists('assessment_sections_view_model')) {
  function assessment_sections_view_model(array $assessment_data): array
  {
    $sections = isset($assessment_data['sections']) && is_array($assessment_data['sections'])
      ? $assessment_data['sections']
      : [];

    $view_sections = [];

    foreach ($sections as $section) {
      $section_counts = [
        'not_started'      => 0,
        'in_progress'      => 0,
        'completed'        => 0,
        'missing_evidence' => 0,
      ];

      $section_bars = [];
      $items = isset($section['items']) && is_array($section['items']) ? $section['items'] : [];

      foreach ($items as $item) {
        $bar = assessment_build_bar_payload($item);
        $section_bars[] = $bar;

        if (isset($section_counts[$bar['assessment_bar_status']])) {
          $section_counts[$bar['assessment_bar_status']]++;
        }
      }

      $view_sections[] = [
        'section_title' => isset($section['section_title']) ? (string) $section['section_title'] : 'Section',
        'counts'        => $section_counts,
        'bars'          => $section_bars,
      ];
    }

    return $view_sections;
  }
}
