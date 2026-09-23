{{-- Arcade: score bar and the pop-up used by turbo mode. Styles are in skeleton-auto.css. --}}

@if(theme('enable_hud') != "false")
<div class="arcade-hud" aria-hidden="true">
  <span class="hud-1up">1UP</span>
  <span class="hud-score">SCORE<b id="arcade-score">000000</b></span>
  <span class="hud-hi">HI-SCORE<b id="arcade-hiscore">000000</b></span>
  <span class="hud-credit">CREDIT 01</span>
</div>
@endif
<div id="arcade-toast" class="arcade-toast" role="status" aria-live="polite"></div>
