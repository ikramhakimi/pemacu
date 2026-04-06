---
name: build-page
description: Use this skill when implementing one full page or page template in this PHP templating + Tailwind codebase. Best for files like dashboard-home.php, settings.php, login.php, or other complete page-level templates. Use when the page should assemble existing components and sections into a coherent screen. Do not use for single components, tiny section-only tasks, or broad architecture refactors.
---

# Build Page

Implement one complete page template that feels production-oriented, modular, and consistent with the existing codebase.

## When to use
Use this skill when the requested work is page-level, for example:
- `views/pages/home.php`
- `views/pages/packages.php`
- `views/pages/portfolio.php`

Use this skill for:
- building a full page from existing components
- assembling sections into one coherent screen
- creating realistic content flow and information hierarchy
- page-level responsive layout work

Do not use this skill for:
- a single UI component
- one isolated section like a hero or page header
- system-wide architecture changes
- helper-system redesign
- broad restyling across the whole app

## Project assumptions
- Stack: PHP templating + Tailwind CSS
- Templating should follow existing layout/helper conventions
- Existing reusable components should be preferred over new ad hoc markup
- Mobile-first and accessible by default
- Visual style should stay restrained, clean, and production-friendly
- Use `views/pages/kit.php` as structure/composition reference for section assembly flow
- Do not use `.kit*` classes as styling references (for example `kit-layout` and any `kit-*` utility wrappers)
- For production page styling, rely on non-Kit pages/components and existing production utility patterns

## Working rules
- Only implement the requested page file unless explicitly asked otherwise
- Reuse existing components wherever possible
- Do not create new folders unless explicitly asked
- Do not redesign the whole design system
- Do not rename unrelated files
- Keep sections modular and readable
- Prefer consistency with current spacing, hierarchy, and patterns
- No inline styles
- Use semantic HTML structure
- Treat `kit` files as demo/docs scaffolding; copy flow ideas, not `.kit*` styling hooks

## Page-building process
1. Identify the exact page file
2. Clarify page purpose and major sections from the prompt
3. Reuse existing components first
4. Build clear content hierarchy and realistic layout flow
5. Keep wrappers and nesting minimal
6. Make responsive behavior sensible, not overengineered
7. Avoid adding unsupported widgets or fake complexity

## Output rules
- Return the final page file only unless another file was explicitly requested
- Do not include unnecessary commentary
- Do not perform unrelated refactors
- Do not add speculative features

## Self-check before finalizing
- page structure is coherent
- component usage is consistent
- spacing rhythm is stable
- semantics are correct
- responsive layout is sensible
- no scope creep
