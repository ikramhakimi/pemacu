<?php
declare(strict_types=1);

/**
 * Component: table
 * Purpose: Render a semantic, data-driven table with spacing variants, alignment controls, and empty state.
 * Anatomy:
 * - .table-wrapper
 *   - table.table
 *     - caption.table__caption (optional)
 *     - thead.table__head
 *       - th.table__heading
 *     - tbody.table__body
 *       - tr.table__row
 *         - td.table__cell
 * Data Contract:
 * - `columns` (array, optional): list of columns (string label or array with `label`, `key`, `align`, `class_name`).
 * - `rows` (array, optional): list of rows (array of cells or row object with `cells`, `row_class`).
 * - Cell object supports `content`, `is_html`, `align`, `class_name`.
 * - `appearance` (string, optional): `default` or `basic`. Default: `default`.
 * - `spacing` (string, optional): `default` or `comfortable`. Default: `default`.
 * - `caption` (string, optional): table caption text.
 * - `empty_title` (string, optional): empty state heading. Default: `No records found`.
 * - `empty_message` (string, optional): empty state description.
 * - `class_name` (string, optional): wrapper classes.
 * - `attributes` (array, optional): extra attributes for `<table>`.
 */

$columns       = isset($columns) && is_array($columns) ? array_values($columns) : [];
$rows          = isset($rows) && is_array($rows) ? array_values($rows) : [];
$appearance    = isset($appearance) ? trim((string) $appearance) : 'default';
$spacing       = isset($spacing) ? trim((string) $spacing) : 'default';
$caption       = isset($caption) ? trim((string) $caption) : '';
$empty_title   = isset($empty_title) ? trim((string) $empty_title) : 'No records found';
$empty_message = isset($empty_message) ? trim((string) $empty_message) : 'Try changing your filters or add a new record.';
$class_name    = isset($class_name) ? trim((string) $class_name) : '';
$attributes    = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($columns === []) {
  $columns = [
    ['label' => 'Column', 'key' => 'column'],
  ];
}

$appearance_map = [
  'default' => [
    'wrapper' => 'overflow-x-auto rounded-md border border-brand-200 bg-white',
    'head'    => 'border-b-4 border-brand-200 bg-brand-100 text-xs font-semibold uppercase tracking-wide text-brand-700',
  ],
  'basic' => [
    'wrapper' => 'overflow-x-auto',
    'head'    => 'border-b-4 border-brand-200 text-xs font-semibold uppercase tracking-wide text-brand-700',
  ],
];

if (!isset($appearance_map[$appearance])) {
  $appearance = 'default';
}

$edge_padding_class = $appearance === 'basic' ? 'first:pl-0 last:pr-0' : '';

$spacing_map = [
  'default' => [
    'heading' => 'py-3',
    'cell'    => 'py-3',
  ],
  'comfortable' => [
    'heading' => 'py-4',
    'cell'    => 'py-4',
  ],
];

if (!isset($spacing_map[$spacing])) {
  $spacing = 'default';
}

$align_map = [
  'left'   => 'text-left',
  'center' => 'text-center',
  'right'  => 'text-right',
];

$resolve_align = static function (string $align) use ($align_map): string {
  $align = trim($align);

  if (!isset($align_map[$align])) {
    $align = 'left';
  }

  return $align_map[$align];
};

$resolve_optional_align = static function (string $align) use ($resolve_align): string {
  $align = trim($align);

  if ($align === '' || $align === 'left') {
    return '';
  }

  return $resolve_align($align);
};

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value_attr) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value_attr)) {
      if ($value_attr) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value_attr === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value_attr) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$column_meta = [];

foreach ($columns as $index => $column) {
  if (is_array($column)) {
    $column_label = isset($column['label']) ? trim((string) $column['label']) : 'Column ' . ($index + 1);
    $column_key   = isset($column['key']) ? trim((string) $column['key']) : 'column_' . ($index + 1);
    $column_align = isset($column['align']) ? trim((string) $column['align']) : 'left';
    $column_class = isset($column['class_name']) ? trim((string) $column['class_name']) : '';
  } else {
    $column_label = trim((string) $column);
    $column_key   = 'column_' . ($index + 1);
    $column_align = 'left';
    $column_class = '';
  }

  if ($column_label === '') {
    $column_label = 'Column ' . ($index + 1);
  }

  if ($column_key === '') {
    $column_key = 'column_' . ($index + 1);
  }

  $column_meta[] = [
    'label'      => $column_label,
    'key'        => $column_key,
    'align'      => $column_align,
    'class_name' => $column_class,
  ];
}

$table_attributes          = $attributes;
$table_attributes['class'] = trim(implode(' ', array_filter([
  'table min-w-full align-middle text-left text-sm text-brand-700',
  isset($table_attributes['class']) ? trim((string) $table_attributes['class']) : '',
])));
?>
<div class="<?= e(trim('table-wrapper ' . $appearance_map[$appearance]['wrapper'] . ' ' . $class_name)); ?>">
  <table<?= $render_attributes($table_attributes); ?>>
    <?php if ($caption !== ''): ?>
      <caption class="table__caption px-4 py-3 text-left text-sm text-brand-600">
        <?= e($caption); ?>
      </caption>
    <?php endif; ?>

    <thead class="table__head <?= e($appearance_map[$appearance]['head']); ?>">
      <tr>
        <?php foreach ($column_meta as $column): ?>
          <?php
          $heading_class = trim(implode(' ', array_filter([
            'table__heading px-4',
            $edge_padding_class,
            $spacing_map[$spacing]['heading'],
            $resolve_optional_align((string) $column['align']),
            $column['class_name'],
          ])));
          ?>
          <th scope="col" class="<?= e($heading_class); ?>">
            <?= e((string) $column['label']); ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>

    <tbody class="table__body divide-y divide-brand-200">
      <?php if ($rows === []): ?>
        <tr class="table__row">
          <td class="table__cell px-4 py-10 text-center" colspan="<?= e((string) count($column_meta)); ?>">
            <p class="text-sm font-semibold text-brand-900"><?= e($empty_title); ?></p>
            <?php if ($empty_message !== ''): ?>
              <p class="mt-1 text-sm text-brand-600"><?= e($empty_message); ?></p>
            <?php endif; ?>
          </td>
        </tr>
      <?php endif; ?>

      <?php foreach ($rows as $row): ?>
        <?php
        $row_cells = is_array($row) && isset($row['cells']) && is_array($row['cells'])
          ? $row['cells']
          : (is_array($row) ? $row : []);
        $row_class = is_array($row) && isset($row['row_class']) ? trim((string) $row['row_class']) : '';
        ?>
        <tr class="<?= e(trim('table__row transition-colors hover:bg-brand-50 ' . $row_class)); ?>">
          <?php foreach ($column_meta as $column_index => $column): ?>
            <?php
            $column_key = (string) $column['key'];
            $raw_cell   = array_key_exists($column_key, $row_cells)
              ? $row_cells[$column_key]
              : ($row_cells[$column_index] ?? '');

            $cell_content = '';
            $cell_is_html = false;
            $cell_align   = (string) $column['align'];
            $cell_class   = '';

            if (is_array($raw_cell)) {
              $cell_content = isset($raw_cell['content']) ? (string) $raw_cell['content'] : '';
              $cell_is_html = !empty($raw_cell['is_html']);
              $cell_align   = isset($raw_cell['align']) ? (string) $raw_cell['align'] : $cell_align;
              $cell_class   = isset($raw_cell['class_name']) ? trim((string) $raw_cell['class_name']) : '';
            } else {
              $cell_content = (string) $raw_cell;
            }

            $cell_classes = trim(implode(' ', array_filter([
              'table__cell px-4',
              $edge_padding_class,
              $spacing_map[$spacing]['cell'],
              $resolve_optional_align($cell_align),
              $cell_class,
            ])));
            ?>
            <td class="<?= e($cell_classes); ?>">
              <?php if ($cell_is_html): ?>
                <?= $cell_content; ?>
              <?php else: ?>
                <?= e($cell_content); ?>
              <?php endif; ?>
            </td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
