<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Theme Config
    |--------------------------------------------------------------------------
    |
    | The theme config allows you to configure how LittleLink Custom should treat your theme.
    | All settings can either be set to "true" or "false", unless stated otherwise.
    |
    | The settings below change how your buttons behave.
    |
    */

    // Arcade styles every button the same way (neon accent + hard shadow),
    // so custom button CSS from the Button Editor is not used.
    'allow_custom_buttons' => 'false',

    'open_links_in_same_tab' => 'false',

    // You can use this option to use the default button styling. For example reskins of the Default Theme.
    // This can be useful if you do not want to update your brand styles every time a new button is added.
    // If true the file "brands.css" wont be used anymore and can be removed.
    'use_default_buttons' => 'false',

    // With this option, you can disallow custom background images set by users.
    'allow_custom_background' => 'true',

    // Arcade uses fixed colors that work on any background.
    'enable_dynamic_contrast' => 'false',


    /*
    |--------------------------------------------------------------------------
    | Arcade options
    |--------------------------------------------------------------------------
    |
    | These need custom code (below) to be enabled, and the server needs
    | ALLOW_CUSTOM_CODE_IN_THEMES=true in its .env file.
    | Without custom code the theme still works, just without these extras.
    |
    */

    // Score bar at the top of the page (1UP, SCORE, HI-SCORE, CREDIT).
    // Every link click adds 100 points.
    'enable_hud' => 'true',

    // Short 8-bit "blip" sound when a link is clicked.
    'enable_sfx' => 'true',

    // Typing Up Up Down Down Left Right Left Right B A turns on turbo mode.
    'enable_konami' => 'true',

    // Set to 'true' to remove the CRT scanline overlay.
    'disable_scanlines' => 'false',


    /*
    |--------------------------------------------------------------------------
    | Custom Code
    |--------------------------------------------------------------------------
    |
    | Custom code allows you to inject customized Blade, PHP, HTML, JavaScript and CSS code.
    |
    | In your "extra" folder, you will find 3 separate files for injecting your code to
    | different places on the final page (head, body, at the end of the body).
    |
    | You may also attach custom assets like CSS, JS, or images.
    | You can find instructions for this in the files in your extra folder.
    |
    */

    'enable_custom_code' => 'true',

    // Disable individual files (only applies if above is 'true').
    'enable_custom_head'     => 'true',
    'enable_custom_body'     => 'true',
    'enable_custom_body_end' => 'true',


    /*
    |--------------------------------------------------------------------------
    | Custom Icons
    |--------------------------------------------------------------------------
    |
    | You may add custom icons to your theme.
    | These icons are stored under: .../extra/custom-icons.
    |
    | You can adjust the file extension types to use other files than just SVGs.
    |
    */

    'use_custom_icons' => 'false',

    // Is not set correct this will cause errors.
    'custom_icon_extension' => '.svg', // (.png, .jpg ...)



];
