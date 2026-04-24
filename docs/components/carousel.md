# Carousel

## Overview
`carousel` is a data-configured, Tailwind-first slider component with grouped paging, navigation controls, and lifecycle methods for dynamic pages.

## Why use this carousel
- Uses static semantic markup with predictable hooks.
- Works with plain HTML or the PHP `component('carousel', [...])` helper.
- Supports responsive groups (`slidesQty`) instead of hard-coded single-slide behavior.
- Includes API methods (`next`, `prev`, `goTo`, `play`, `pause`, `update`, `destroy`) for app flows.

## Requires JavaScript
This component depends on `assets/js/components/carousel.js` (loaded by `assets/js/app.js`).

## Basic usage
Use `data-carousel` on the root and provide required structural hooks.

```html
<div
  class="opacity-0 transition-opacity duration-300"
  data-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": false,
    "isInfiniteLoop": false,
    "slidesQty": { "xs": 1 }
  }'
>
  <div class="carousel overflow-hidden rounded-xl">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">Slide 1</article>
      <article class="carousel-slide">Slide 2</article>
      <article class="carousel-slide">Slide 3</article>
    </div>
  </div>

  <button type="button" class="carousel-prev" aria-label="Previous slide group">Prev</button>
  <button type="button" class="carousel-next" aria-label="Next slide group">Next</button>

  <div class="carousel-pagination"></div>
  <p aria-live="polite" aria-atomic="true">
    <span class="carousel-info-current">1</span>
    /
    <span class="carousel-info-total">1</span>
  </p>
</div>
```

## Markup structure
Required hooks:
- Root: `[data-carousel]`
- Viewport: `.carousel`
- Track: `.carousel-body`
- Slide: `.carousel-slide`
- Previous: `.carousel-prev`
- Next: `.carousel-next`
- Pagination: `.carousel-pagination`
- Current info: `.carousel-info-current`
- Total info: `.carousel-info-total`

## PHP component usage
Use the built-in component wrapper for consistent markup.

```php
<?php
component('carousel', [
  'carousel_id'              => 'homepage-carousel',
  'carousel_items'           => $carousel_items,
  'carousel_autoplay'        => true,
  'carousel_interval'        => 5000,
  'carousel_infinite'        => true,
  'carousel_snap'            => false,
  'carousel_centered'        => false,
  'carousel_slides_qty'      => [
    'xs' => 1,
    'sm' => 2,
    'lg' => 3,
  ],
  'carousel_show_pagination' => true,
  'carousel_show_arrows'     => true,
  'carousel_show_info'       => true,
  'carousel_class'           => 'opacity-0 transition-opacity duration-300',
  'carousel_body_class'      => 'gap-4',
  'carousel_slide_class'     => '',
]);
```

## JavaScript behavior
- Initializes automatically on `DOMContentLoaded` for all `[data-carousel]` roots.
- Safe re-init: `window.Carousel.init(...)` updates existing instances instead of duplicating listeners.
- Page-based indexing: movement is by group/page, not by raw slide.
- Responsive recalculation on resize updates visible slides, page count, controls, and transforms.
- Infinite mode wraps start/end; non-infinite mode clamps and disables edge arrows.

## Options
| Option | Type | Default | Description |
| --- | --- | --- | --- |
| `loadingClasses` | `string` | `""` | Classes removed from root once initialization completes. |
| `dotsItemClasses` | `string` | predefined class string | Dot button classes. Use `carousel-active:` prefix for active-only classes. |
| `isAutoPlay` | `boolean` | `false` | Starts autoplay timer after init. |
| `autoPlayInterval` | `number` | `5000` | Autoplay delay in milliseconds (minimum `1000`). |
| `isInfiniteLoop` | `boolean` | `false` | Wraps from last page to first and first to last. |
| `isSnap` | `boolean` | `false` | Enables snap-oriented classes on viewport/slides. |
| `isCentered` | `boolean` | `false` | Centers active group when possible. |
| `slidesQty` | `object \| number` | `{ "xs": 1 }` | Visible slides per breakpoint (`xs`, `sm`, `md`, `lg`, `xl`, `2xl`). |
| `speed` | `number` | `500` | Transition duration in ms (disabled when reduced motion is active). |
| `startIndex` | `number` | `0` | Initial page index (0-based). |
| `pauseOnHover` | `boolean` | `true` | Pauses autoplay while pointer is over root. |
| `keyboard` | `boolean` | `true` | Enables arrow key control when focus is inside carousel. |
| `drag` | `boolean` | `true` | Enables pointer drag/swipe navigation. |
| `threshold` | `number` | `40` | Minimum drag distance in px required to change page. |

## Methods
`window.Carousel.get(rootNode)` returns the instance with these methods.

| Method | Parameters | Description |
| --- | --- | --- |
| `next` | none | Move to next page group. |
| `prev` | none | Move to previous page group. |
| `goTo` | `index: number` | Move to a specific page index (0-based). |
| `play` | none | Start autoplay if enabled and allowed. |
| `pause` | none | Stop autoplay timer. |
| `update` | `config?: object` | Recompute layout and optionally merge new config values. |
| `destroy` | none | Remove listeners, timers, and inline runtime styles. |

## Events
All events dispatch on the carousel root and include `detail`:
`{ currentIndex, totalPages, visibleSlides, config }`.

| Event name | Detail payload | When it fires |
| --- | --- | --- |
| `carousel:init` | `currentIndex`, `totalPages`, `visibleSlides`, `config` | After first successful setup. |
| `carousel:change` | `currentIndex`, `totalPages`, `visibleSlides`, `config` | After page/group changes. |
| `carousel:play` | `currentIndex`, `totalPages`, `visibleSlides`, `config` | When autoplay starts. |
| `carousel:pause` | `currentIndex`, `totalPages`, `visibleSlides`, `config` | When autoplay pauses/stops. |
| `carousel:destroy` | `currentIndex`, `totalPages`, `visibleSlides`, `config` | Before instance teardown completes. |

## Accessibility
- Arrow buttons require descriptive `aria-label` text.
- Pagination dots are semantic `button` elements and keyboard reachable.
- Active dot uses `aria-current="true"`.
- Counter can use `aria-live="polite"` for non-disruptive updates.
- Keyboard controls only trigger when focus is within carousel context.
- If user prefers reduced motion, transition speed is treated as `0` and autoplay is skipped.

## Examples
### Basic carousel
Single-slide baseline with default interaction.

```html
<div data-carousel='{"slidesQty":{"xs":1}}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
    </div>
  </div>
</div>
```

### With arrows
Add previous/next controls for manual navigation.

```html
<div data-carousel='{"slidesQty":{"xs":1}}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
    </div>
  </div>
  <button type="button" class="carousel-prev" aria-label="Previous slide group">Prev</button>
  <button type="button" class="carousel-next" aria-label="Next slide group">Next</button>
</div>
```

### With pagination
Add a dot wrapper for page-based indicators.

```html
<div data-carousel='{"slidesQty":{"xs":1}}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
    </div>
  </div>
  <div class="carousel-pagination"></div>
</div>
```

### With autoplay
Enable autoplay and optional hover pause.

```html
<div data-carousel='{
  "isAutoPlay": true,
  "autoPlayInterval": 4500,
  "pauseOnHover": true,
  "slidesQty": {"xs":1}
}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
    </div>
  </div>
</div>
```

### With infinite loop
Wraps at both edges.

```html
<div data-carousel='{
  "isInfiniteLoop": true,
  "slidesQty": {"xs":1}
}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
    </div>
  </div>
  <button type="button" class="carousel-prev" aria-label="Previous slide group">Prev</button>
  <button type="button" class="carousel-next" aria-label="Next slide group">Next</button>
</div>
```

### With slide counter
Counter reflects page index and total pages.

```html
<div data-carousel='{"slidesQty":{"xs":1,"md":2}}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
      <article class="carousel-slide">D</article>
    </div>
  </div>
  <p aria-live="polite" aria-atomic="true">
    <span class="carousel-info-current">1</span> / <span class="carousel-info-total">1</span>
  </p>
</div>
```

### With multiple visible slides
Responsive groups update total pages and control states.

```html
<div data-carousel='{
  "slidesQty": {"xs":1,"sm":2,"lg":3}
}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">1</article>
      <article class="carousel-slide">2</article>
      <article class="carousel-slide">3</article>
      <article class="carousel-slide">4</article>
      <article class="carousel-slide">5</article>
    </div>
  </div>
  <div class="carousel-pagination"></div>
</div>
```

### With snap mode
Adds snap-oriented classes while keeping controls functional.

```html
<div data-carousel='{
  "isSnap": true,
  "slidesQty": {"xs":1,"md":2}
}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
    </div>
  </div>
</div>
```

### With centered mode
Centers active group where layout allows it.

```html
<div data-carousel='{
  "isCentered": true,
  "slidesQty": {"xs":1,"lg":3}
}'>
  <div class="carousel overflow-hidden">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide">A</article>
      <article class="carousel-slide">B</article>
      <article class="carousel-slide">C</article>
      <article class="carousel-slide">D</article>
    </div>
  </div>
  <button type="button" class="carousel-prev" aria-label="Previous slide group">Prev</button>
  <button type="button" class="carousel-next" aria-label="Next slide group">Next</button>
</div>
```

### Full advanced example
Combined autoplay, loop, responsive groups, dots, arrows, and counter.

```html
<div
  class="opacity-0 transition-opacity duration-300"
  data-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "size-3 rounded-full border border-zinc-300 cursor-pointer transition carousel-active:border-brand-600 carousel-active:bg-brand-600",
    "isAutoPlay": true,
    "autoPlayInterval": 5000,
    "isInfiniteLoop": true,
    "isSnap": true,
    "isCentered": true,
    "slidesQty": {
      "xs": 1,
      "sm": 2,
      "lg": 3
    },
    "speed": 500,
    "startIndex": 0,
    "pauseOnHover": true,
    "keyboard": true,
    "drag": true,
    "threshold": 40
  }'
>
  <div class="carousel overflow-hidden rounded-xl">
    <div class="carousel-body flex gap-4">
      <article class="carousel-slide rounded-xl border border-brand-200 bg-white p-5">Slide 1</article>
      <article class="carousel-slide rounded-xl border border-brand-200 bg-white p-5">Slide 2</article>
      <article class="carousel-slide rounded-xl border border-brand-200 bg-white p-5">Slide 3</article>
      <article class="carousel-slide rounded-xl border border-brand-200 bg-white p-5">Slide 4</article>
      <article class="carousel-slide rounded-xl border border-brand-200 bg-white p-5">Slide 5</article>
      <article class="carousel-slide rounded-xl border border-brand-200 bg-white p-5">Slide 6</article>
    </div>
  </div>

  <div class="mt-4 flex items-center justify-between">
    <div class="inline-flex items-center gap-2">
      <button type="button" class="carousel-prev" aria-label="Previous slide group">Prev</button>
      <button type="button" class="carousel-next" aria-label="Next slide group">Next</button>
    </div>

    <div class="carousel-pagination inline-flex items-center gap-2"></div>

    <p aria-live="polite" aria-atomic="true">
      <span class="carousel-info-current">1</span>
      /
      <span class="carousel-info-total">1</span>
    </p>
  </div>
</div>
```

## Troubleshooting
- `Nothing moves on click`: ensure `.carousel`, `.carousel-body`, and `.carousel-slide` exist under one `[data-carousel]` root.
- `Dots do not render`: include `.carousel-pagination` and at least 2 pages of grouped slides.
- `Arrows stay disabled`: check `isInfiniteLoop` and confirm non-infinite mode is expected.
- `Autoplay does not start`: verify `isAutoPlay: true`, `autoPlayInterval >= 1000`, and reduced-motion preference is not forcing static behavior.
- `Re-rendered content breaks`: call `window.Carousel.update(root)` or `window.Carousel.init(root)` after DOM updates.
