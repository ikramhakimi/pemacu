<?php

declare(strict_types=1);

function kuiz_component(string $component_name, array $data = []): void
{
  $component_key = trim(str_replace('\\', '/', $component_name), '/');

  if ($component_key === '' || str_contains($component_key, '..')) {
    throw new RuntimeException('Kuiz component not found: ' . $component_name);
  }

  $component_path = __DIR__ . '/../components/' . $component_key . '.php';

  if (!is_file($component_path)) {
    throw new RuntimeException('Kuiz component not found: ' . $component_name);
  }

  extract($data, EXTR_SKIP);
  require $component_path;
}
