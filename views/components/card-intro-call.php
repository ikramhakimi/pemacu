<?php
/*
CSS Anatomy: card-intro-call

 .card.card--intro-call
|_ .card__media
|  |_ .card__icon
|_ .card__content
   |_ .card__title
   |_ .card__action
|_ .card__note
   |_ .card__note-icon
   |_ .card__note-text
*/

$card_intro_call = isset($card_intro_call) && is_array($card_intro_call) ? $card_intro_call : [];

$card_icon_name         = isset($card_intro_call['icon_name']) && is_string($card_intro_call['icon_name']) && $card_intro_call['icon_name'] !== ''
  ? $card_intro_call['icon_name']
  : 'calendar-line';
$card_title             = isset($card_intro_call['title']) && is_string($card_intro_call['title']) && $card_intro_call['title'] !== ''
  ? $card_intro_call['title']
  : "Book a 15-min\nintro call";
$card_action_label      = isset($card_intro_call['action_label']) && is_string($card_intro_call['action_label']) && $card_intro_call['action_label'] !== ''
  ? $card_intro_call['action_label']
  : 'Book a Call';
$card_action_href       = isset($card_intro_call['action_href']) && is_string($card_intro_call['action_href']) && $card_intro_call['action_href'] !== ''
  ? $card_intro_call['action_href']
  : '#';
$card_note_icon_name    = isset($card_intro_call['note_icon_name']) && is_string($card_intro_call['note_icon_name']) && $card_intro_call['note_icon_name'] !== ''
  ? $card_intro_call['note_icon_name']
  : $card_icon_name;
$card_note_text         = isset($card_intro_call['note_text']) && is_string($card_intro_call['note_text']) && $card_intro_call['note_text'] !== ''
  ? $card_intro_call['note_text']
  : 'Our team will reach out within 24 hours to schedule your intro call.';
?>
<article class="card card--intro-call block p-6 bg-brand-50 border border-brand-200 rounded-lg overflow-hidden">
  <div class="card__media w-[120px] h-[120px] rounded-lg bg-brand-300 mb-6 flex items-center justify-center">
    <?php icon($card_icon_name, ['icon_size' => '24', 'icon_class' => 'card__icon text-brand-600']); ?>
  </div>
  <div class="card__content">
    <p class="card__title text-3xl mb-6">
      <?= nl2br(htmlspecialchars($card_title, ENT_QUOTES, 'UTF-8'), false); ?>
    </p>
    <a href="<?= htmlspecialchars($card_action_href, ENT_QUOTES, 'UTF-8'); ?>" class="card__action btn btn--default btn--lg inline-flex items-center justify-center rounded-md border h-[var(--ui-h-lg)] leading-[var(--ui-h-lg)] font-medium border border-brand-900 bg-gradient-to-b from-brand-700 to-brand-900 shadow-lg shadow-brand-400 text-white px-[var(--ui-px-lg)] text-base w-full"><span class="button__label"><?= htmlspecialchars($card_action_label, ENT_QUOTES, 'UTF-8'); ?></span></a>
  </div>
  <div class="card__note flex items-center gap-4 mt-6">
    <div class="card__note-icon w-12 h-12 shrink-0 bg-brand-200 rounded-lg flex items-center justify-center">
      <?php icon($card_note_icon_name, ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
    </div>
    <p class="card__note-text text-sm text-brand-500"><?= htmlspecialchars($card_note_text, ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
</article>
