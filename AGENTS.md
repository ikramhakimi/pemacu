# AGENTS.md

## Purpose
This repository must follow strict production-ready engineering standards.
When making any change, prioritize maintainability, readability, accessibility, safety, and consistency with the existing architecture.

## Core rules
- Do not introduce breaking changes unless explicitly asked.
- Do not rewrite large unrelated areas of code.
- Do not add dependencies unless necessary and justified.
- Do not create duplicate utilities, components, or patterns when an existing one can be reused.
- Prefer small, focused diffs.
- Follow existing architecture unless explicitly asked to improve or refactor it.
- Run in hardening mode by default: complete each change with explicit verification before considering it done.

## Code quality standard
- Write code suitable for a senior-level production codebase.
- Favor clarity over cleverness.
- Use descriptive naming.
- Keep functions small and single-purpose.
- Avoid deep nesting; prefer guard clauses.
- Remove dead code and obvious duplication when touching related files.
- Keep public APIs stable unless explicitly changing them.
- Do not introduce placeholder logic in production code unless clearly marked and justified.

## Architecture rules
- Follow the existing project structure and naming conventions.
- Reuse shared helpers, components, constants, and types before creating new ones.
- Keep business logic out of UI templates/components where possible.
- STRICT: If a card section contains a table, use `card-table` as the card wrapper. Do not place tables inside `card-module`.
- If current `card-table` does not support the required table scenario, implement the page using composition around `card-table` first.
- Only extend/refactor `card-table` when explicitly requested by the user.
- Separate concerns clearly:
  - UI/presentation
  - state/data handling
  - business rules
  - utilities/helpers
- No premature abstractions.
- No broad refactors unless requested.

## Indentation & formatting rules
- Use **2 spaces** for indentation.
- Do not use tabs.
- Never mix tabs and spaces.
- Indentation must be consistent across the entire file.
- Align `=` for related assignment blocks in both PHP and JS when declarations are grouped together.

# AGENTS.md — Styling & Component Rules

## 🎯 Core Philosophy

- Use **Tailwind CSS as the primary styling system**
- Build **component-driven UI using PHP templates**
- Avoid duplicating logic between Tailwind and custom CSS

> **Rule:**  
> Style with Tailwind. Extract only when necessary.

---

## 🧱 1. Tailwind Usage (Default)

### ✅ Always use Tailwind for:
- Layout (flex, grid, spacing)
- Typography
- Colors
- Borders & radius
- Shadows
- Responsive design
- States (hover, focus, active)

### Example:
```html
<div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
  <h3 class="text-lg font-semibold text-zinc-900">Title</h3>
  <p class="mt-2 text-sm text-zinc-600">Description</p>
</div>
```

## CSS Hygiene
- Do not add unnecessary CSS rules. Prefer utility classes and existing component styles first.
- Remove obsolete CSS immediately when the related markup/layout changes.
- Avoid broad selectors that affect unrelated elements; scope styles to the component block only.
- Do not add spacing utility classes by default on grid/card wrappers unless explicitly requested (`m*`, `p*`, `space-*`, `gap-*`).
- Do not modify existing class names or class values unless explicitly requested by the user.
- If a class/style change is needed as a side effect, ask first before changing.

## Verification And Validation
- For UI/template/CSS changes, always run syntax/lint checks for touched PHP files.
- Rebuild CSS after style/config updates and verify build output is generated successfully.
- Rebuild JS after JS/module changes and verify build output is generated successfully.
- For class/filename refactors, verify references are fully updated (no stale names remain).
- For component updates, verify all related call sites are updated and no old API usage remains.
- Keep Tailwind config aligned with component additions/changes (`content`, `safelist`, dynamic classes).
- Before finalizing, report exactly what was verified (not only what was changed).

## Component Change Checklist (Mandatory)
When touching reusable UI components, follow this sequence in a single task:
1. Update component implementation.
2. Sweep and update all related call sites (pages/components/layout wrappers).
3. Update demo coverage for all supported variants/states.
4. Update navigation/menu links for new demo pages.
5. Update Tailwind config if dynamic classes or new component roots are introduced.
6. Run verification (PHP lint for touched files, CSS build, JS build when relevant).
7. Report changed files and exact verification commands run.

---

## Class Naming

- Use clear, consistent class names.
- BEM naming is allowed when requested by the user.
- Do not auto-generate new BEM block conventions unless explicitly requested.
- `.kit*` classes are documentation/demo-only (Kit page scope).
- Do not use `.kit*` classes or Kit section layout patterns as reference for production pages.
- For non-Kit pages, reference only production components/tokens and page-specific classes.

---

## Component Helper System

This project uses a helper-based component system from `include/functions.php`.
Use the available helpers: `layout(...)`, `section(...)`, and `component(...)`.

## PHP Naming And Formatting
- Use snake_case for PHP variables. 
- For page templates, use: 
- $page_title 
- $page_current 
- Align = for related assignment blocks in PHP code at any position (top, middle, or bottom of templates/components). 
- Align => for related associative array/object-style blocks in PHP code at any position (top, middle, or bottom of templates/components). 
- Example:

  php
  $page_title   = 'Home';
  $page_current = 'home';

## Template Conventions 
- Use helper-based templating from include/functions.php: 
  - layout('layout-start', ['page_title' => $page_title, 'page_current' => $page_current]); 
  - section('home-packages'); (when using section templates)
  - component('footer'); (when needed) 
  - layout('layout-end'); 
- Keep layout files under views/layout, sections under views/sections, and components under views/components.
- Default authoring mode: **HTML-first**.
- Do **not** introduce new PHP templating logic (variables, loops, helper composition, dynamic props/contracts) unless the user explicitly requests PHP templating.
- For normal component/section creation requests, output static HTML structure first, then add PHP templating only when asked.

## Strict Template Guardrails (Non-Negotiable)
- Do not introduce dynamic HTML tag rendering in templates.
- Forbidden pattern: `<?= $*_tag; ?>` (example: `$title_tag`, `$header_tag`, `$topic_tag`).
- Use static semantic HTML tags only (`section`, `div`, `h1`-`h6`, `p`, `ul`, etc.) unless explicitly requested by the user.
- Do not add new PHP variables, conditionals, loops, helper abstractions, or flexible contracts unless explicitly requested.
- Only implement what the user asked; do not add extra flexibility APIs by default.
- If a requested change would require assumptions beyond the prompt, pause and ask first.
- Do not "improve" or "rebalance" visual classes on your own. Keep existing classes as source of truth unless user asks for style changes.

### Blocks
- Always indent inside:
  - functions
  - conditionals
  - loops
  - objects and arrays
  - HTML/template nesting
- Closing braces must align with the opening statement.

### Line length
- Prefer a maximum line length of 100–120 characters.
- Break long expressions into multiple lines when needed.

### Nested structures
- Avoid deep nesting greater than 3 levels when possible.
- Use early returns and guard clauses to reduce indentation depth.

### Arrays and objects
- Use multi-line formatting when:
  - there are more than 2–3 properties/items
  - or the line would exceed the project line-length preference
- Use trailing commas in multi-line arrays/objects where valid.

Example:
```js
const config = {
  api_url: BASE_URL,
  timeout: 5000,
  retries: 3,
};
```

## JS Documentation Comment Standard
- For interactive UI components in JS, add concise documentation comments at the component/module level.
- Comments must describe:
  - responsibility/intent of the component
  - expected DOM contract (`data-*` hooks, required nodes)
  - behavior lifecycle (open/close/init/cleanup flow when relevant)
- Prefer intent-focused comments over line-by-line narration.
- Keep comments production-grade: clear, brief, and maintainable.
- When adding new handlers or flows (keyboard, backdrop, transitions), document why they exist from UX/accessibility perspective.

## PHP Component Documentation Standard
- For templates in `views/components/*.php`, include a senior-level component header comment after `declare(strict_types=1);`.
- Header comment must include:
  - `Component`: canonical component name
  - `Purpose`: short responsibility statement
  - `Anatomy`: structure tree of key markup/classes used by the component
  - `Data Contract`: key accepted props/inputs and variant controls
- Keep anatomy list aligned with real markup and update it when structure changes.
- Prefer concise architectural guidance over verbose inline comments in markup loops.
