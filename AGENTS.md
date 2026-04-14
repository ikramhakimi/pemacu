# AGENTS.md

## Purpose
Follow production-grade standards. Prioritize:
- maintainability
- readability
- accessibility
- consistency

Default:
- small, focused changes
- no unrelated rewrites
- preserve existing structure/APIs

---

## Working Mode

### Default (Build / Edit)
- Implement only what is requested.
- Inspect nearby patterns first.
- Keep diffs small and scoped.
- Do not run build/compile/lint.
- Do not refactor broadly.
- Suggest verification if relevant.

### Verification (Explicit Only)
Only when explicitly requested:
- verify, lint, compile, build, validate

- Run only relevant checks.
- Do not expand scope.
- Report:
  - what was verified
  - commands run
  - failures / gaps

---

## Core Rules
- No breaking changes unless asked.
- No large unrelated rewrites.
- No unnecessary dependencies.
- Reuse existing helpers/components first.
- Keep APIs stable.
- Prefer clarity over cleverness.
- Small, single-purpose functions.
- Avoid deep nesting (use guard clauses).
- Remove obvious duplication when touching code.
- No premature abstractions.

---

## Architecture
- Follow existing structure and naming.
- Keep business logic out of UI.
- Separate:
  - UI
  - state/data
  - business logic
  - utilities

---

## Component System
- Use helpers from `include/functions.php`:
  - `layout(...)`
  - `section(...)`
  - `component(...)`

---

## PHP Conventions
- Use `snake_case`.
- Page templates:
  - `$page_title`
  - `$page_current`
- Follow global formatting rules.

---

## Formatting (Non-Negotiable)
- 2 spaces. No tabs. Never mix.
- Consistent indentation.
- Align `=` and `=>` when grouped.
- Align closing braces.
- Prefer 100–120 char lines.
- Use multi-line arrays/objects when needed.
- Use trailing commas where valid.

---

## Template Guardrails (Non-Negotiable)
- No dynamic tag rendering (`<?= $*_tag; ?>`).
- Use static semantic HTML unless asked.
- Avoid new variables, loops, helpers, or flexible APIs unless required to implement or fix the requested behavior safely.
- Only implement what is requested.
- Do not modify existing classes unless asked.
- If assumptions are needed, ask first.

---

## JS Class Hooks (Non-Negotiable)
- All JS-related class hooks must use this format:
  - `.js-component-block-name`
- JS hook classes must be placed at the end of the `class` attribute (not at the beginning or middle).
- Exception:
  - If the element has a single class only, the JS hook can be that single class.

---

## Styling
- Use Tailwind as default.
- Prefer utility classes + existing components.
- Extract to CSS only when necessary.
- Avoid duplicate logic between Tailwind and CSS.
- No unnecessary CSS.
- Remove obsolete CSS when markup changes.
- Scope styles to component blocks.
- Avoid modifying existing class values unless required to implement or fix the requested change.
- Update Tailwind config only when required.
- Do not run CSS builds unless asked.

---

## Component Changes
When updating reusable components:
1. Update implementation.
2. Update call sites only if needed.
3. Update demos only if needed.
4. Update Tailwind config only if required.
5. Run verification only if asked.
6. Report changes.

---

## Documentation (When Needed)
Only when necessary:
- JS: non-trivial behavior → purpose + required DOM hooks
- PHP: reusable/changed components → Component, Purpose, Structure, Data
- CSS: only non-obvious patterns
