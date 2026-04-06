---
name: build-component
description: Use this skill when implementing or refactoring one reusable UI component in this PHP templating + Tailwind codebase. Best for files like button.php, input.php, textarea.php, select.php, badge.php, card.php, modal.php, and other single-component work. Do not use for full pages, multi-section layouts, helper-system redesign, or broad architecture changes.
---

# Build Component

Implement or refine one reusable UI component with tight scope, predictable output, and strong consistency with the existing codebase.

## When to use
Use this skill when the task is focused on exactly one component file, for example:
- `views/components/button.php`
- `views/components/input.php`
- `views/components/card.php`
- `views/components/badge.php`

Use this skill for:
- new component implementation
- variant expansion
- size/state support
- accessibility improvements inside one component
- component cleanup without changing wider architecture

Do not use this skill for:
- full pages
- dashboard screens
- multi-section layout work
- helper or templating system redesign
- unrelated cleanup across many files

## Project assumptions
- Stack: PHP templating + Tailwind CSS
- Variables: `snake_case`
- Naming: follow existing project class conventions; BEM only when explicitly requested by user
- Existing helper system should be reused, not replaced
- Components should stay simple, composable, and easy to review
- Use `views/pages/kit.php` and related `views/sections/kit-*.php` as structure/pattern references only
- Never use `.kit*` classes (for example `kit-layout`, `kit-*`) as production styling references
- For production component styling, reference non-Kit pages/components and shared tokens/utilities
- Use 2-space indentation (no tabs)
- Align = for related assignment blocks in PHP code at any position (top, middle, or bottom of templates/components)
- Align => for related associative array/object-style blocks in PHP code at any position (top, middle, or bottom of templates/components)
- Example:
  ```php
  $page_title   = 'Home';
  $page_current = 'home';
  ```

## Working rules
- Respect the existing project structure and conventions
- Only work on the requested component file unless explicitly asked otherwise
- Do not create new folders unless explicitly asked
- Do not rename files unless explicitly asked
- Do not invent a new helper system, prop API, or abstraction layer
- Prefer consistency over creativity
- No inline styles
- Use semantic and accessible HTML
- Avoid hardcoded content unless defaults are explicitly needed
- Keep utility class output predictable and maintainable
- Tailwind-first styling; add CSS only when utility classes cannot solve the case
- Treat `kit` files as documentation/demo context; do not copy `.kit*` styles into production components

## Implementation process
1. Identify the exact component file and keep scope tight
2. Infer existing patterns from nearby components if available
3. Implement only the requested variants, sizes, states, and features
4. Keep the public API minimal and clear
5. Make accessibility a default, not an afterthought
6. Avoid duplicate utility clutter and speculative flexibility
7. Do not refactor unrelated files

## Output rules
- Return final code only unless a short critical note is necessary
- Do not include broad explanations
- Do not include placeholder comments
- Do not add “future-ready” abstractions unless explicitly requested

## Self-check before finalizing
- naming is consistent
- structure matches existing project patterns
- accessibility basics are covered
- no duplicated logic
- no unnecessary abstractions
- no scope creep

## PHP Component Documentation Standard
- For templates in `views/components/*.php`, include a senior-level component header comment after `declare(strict_types=1);`.
- Header comment must include:
  - `Component`: canonical component name
  - `Purpose`: short responsibility statement
  - `Anatomy`: structure tree of key markup/classes used by the component
  - `Data Contract`: key accepted props/inputs and variant controls
- Keep anatomy list aligned with real markup and update it when structure changes.
- Prefer concise architectural guidance over verbose inline comments in markup loops.
