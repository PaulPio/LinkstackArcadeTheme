{{-- Arcade: styles live in the theme CSS files. This file only applies config options. --}}

@if(theme('disable_scanlines') == "true")
<style>body::after{display:none}</style>
@endif
