<?php

declare(strict_types=1);

require_once dirname(__DIR__, 3) . '/include/assessment-form-data.php';

if (!function_exists('mampan_credits_data')) {
  /**
   * Build normalized credits catalog based on assessment form source data.
   *
   * @return array{
   *   categories: array<int, array{
   *     category_key: string,
   *     category_code: string,
   *     category_title: string,
   *     category_subtitle: string,
   *     category_icon: string,
   *     sections: array<int, array{
   *       section_key: string,
   *       section_title: string,
   *       credits: array<int, array{
   *         item_key: string,
   *         code: string,
   *         title: string,
   *         criteria: string,
   *         criteria_preview: string,
   *         attachments_count: int,
   *         remarks_preview: string,
   *         status: string,
   *         scoring: array{
   *           mode: string,
   *           earned_points: int,
   *           max_points: int,
   *           options: array<int, array{
   *             label: string,
   *             points: int,
   *             selected: bool,
   *             description: string
   *           }>
   *         }
   *       }>
   *     }>
   *   }>,
   *   credits: array<int, array{
   *     category_key: string,
   *     category_code: string,
   *     category_title: string,
   *     section_key: string,
   *     section_title: string,
   *     item_key: string,
   *     code: string,
   *     title: string,
   *     criteria: string,
   *     criteria_preview: string,
   *     attachments_count: int,
   *     remarks_preview: string,
   *     status: string,
   *     scoring: array{
   *       mode: string,
   *       earned_points: int,
   *       max_points: int,
   *       options: array<int, array{
   *         label: string,
   *         points: int,
   *         selected: bool,
   *         description: string
   *       }>
   *     }
   *   }>
   * }
   */
  function mampan_credits_data(): array
  {
    $assessment_source = assessment_form_data();
    $source_categories = isset($assessment_source['categories']) && is_array($assessment_source['categories'])
      ? $assessment_source['categories']
      : [];

    $categories = [];
    $credits = [];

    foreach ($source_categories as $category_key => $category_data) {
      if (!is_array($category_data)) {
        continue;
      }

      $resolved_category_key = trim((string) $category_key);
      $resolved_category_title = isset($category_data['category_title']) ? trim((string) $category_data['category_title']) : '';
      $resolved_category_subtitle = isset($category_data['category_subtitle']) ? trim((string) $category_data['category_subtitle']) : '';
      $resolved_category_icon = isset($category_data['category_icon']) ? trim((string) $category_data['category_icon']) : '';
      $resolved_category_code = strtoupper($resolved_category_key);
      $resolved_sections = isset($category_data['sections']) && is_array($category_data['sections'])
        ? $category_data['sections']
        : [];

      $category_sections = [];

      foreach ($resolved_sections as $section_data) {
        if (!is_array($section_data)) {
          continue;
        }

        $resolved_section_key = isset($section_data['section_key']) ? trim((string) $section_data['section_key']) : '';
        $resolved_section_title = isset($section_data['section_title']) ? trim((string) $section_data['section_title']) : '';
        $resolved_items = isset($section_data['items']) && is_array($section_data['items'])
          ? $section_data['items']
          : [];
        $section_credits = [];

        foreach ($resolved_items as $item_data) {
          if (!is_array($item_data)) {
            continue;
          }

          $item_key = isset($item_data['item_key']) ? trim((string) $item_data['item_key']) : '';
          $code = isset($item_data['code']) ? trim((string) $item_data['code']) : '';
          $title = isset($item_data['title']) ? trim((string) $item_data['title']) : '';

          if ($item_key === '' || $code === '' || $title === '') {
            continue;
          }

          $resolved_scoring = assessment_resolve_item_scoring($item_data);
          $resolved_max_points = isset($resolved_scoring['max_points']) && is_numeric($resolved_scoring['max_points'])
            ? (int) $resolved_scoring['max_points']
            : 0;
          $resolved_earned_points = isset($resolved_scoring['earned_points']) && is_numeric($resolved_scoring['earned_points'])
            ? (int) $resolved_scoring['earned_points']
            : 0;
          $criteria = isset($item_data['criteria']) && trim((string) $item_data['criteria']) !== ''
            ? trim((string) $item_data['criteria'])
            : (isset($item_data['criteria_preview']) ? trim((string) $item_data['criteria_preview']) : '');
          $criteria_preview = isset($item_data['criteria_preview']) ? trim((string) $item_data['criteria_preview']) : '';
          $attachments_count = isset($item_data['attachments_count']) && is_numeric($item_data['attachments_count'])
            ? (int) $item_data['attachments_count']
            : 0;
          $remarks_preview = isset($item_data['remarks_preview']) ? trim((string) $item_data['remarks_preview']) : '';
          $resolved_status = assessment_resolve_item_status($item_data, $resolved_earned_points, $resolved_max_points);
          $resolved_options = isset($resolved_scoring['options']) && is_array($resolved_scoring['options'])
            ? array_values($resolved_scoring['options'])
            : [];

          $credit_item = [
            'item_key'          => $item_key,
            'code'              => $code,
            'title'             => $title,
            'criteria'          => $criteria,
            'criteria_preview'  => $criteria_preview,
            'attachments_count' => $attachments_count,
            'remarks_preview'   => $remarks_preview,
            'status'            => $resolved_status,
            'scoring'           => [
              'mode'          => isset($resolved_scoring['mode']) ? (string) $resolved_scoring['mode'] : 'sum',
              'earned_points' => $resolved_earned_points,
              'max_points'    => $resolved_max_points,
              'options'       => $resolved_options,
            ],
          ];

          $section_credits[] = $credit_item;

          $credits[] = [
            'category_key'      => $resolved_category_key,
            'category_code'     => $resolved_category_code,
            'category_title'    => $resolved_category_title,
            'section_key'       => $resolved_section_key,
            'section_title'     => $resolved_section_title,
            'item_key'          => $credit_item['item_key'],
            'code'              => $credit_item['code'],
            'title'             => $credit_item['title'],
            'criteria'          => $credit_item['criteria'],
            'criteria_preview'  => $credit_item['criteria_preview'],
            'attachments_count' => $credit_item['attachments_count'],
            'remarks_preview'   => $credit_item['remarks_preview'],
            'status'            => $credit_item['status'],
            'scoring'           => $credit_item['scoring'],
          ];
        }

        $category_sections[] = [
          'section_key'   => $resolved_section_key,
          'section_title' => $resolved_section_title,
          'credits'       => $section_credits,
        ];
      }

      $categories[] = [
        'category_key'      => $resolved_category_key,
        'category_code'     => $resolved_category_code,
        'category_title'    => $resolved_category_title,
        'category_subtitle' => $resolved_category_subtitle,
        'category_icon'     => $resolved_category_icon,
        'sections'          => $category_sections,
      ];
    }

    return [
      'categories' => $categories,
      'credits'    => $credits,
    ];
  }
}

$credits_data = mampan_credits_data();
