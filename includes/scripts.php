<?php
function scripts_styles() {
    $ver = '1.04';
    $static_version = '1.01';

    // Loads our main stylesheet.
    wp_enqueue_style( 'nextweb-style', get_stylesheet_uri(), array(), $ver );
    wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap', array(), $static_version );

    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $ver, true );
    wp_enqueue_script( 'jQuery_validate', get_template_directory_uri() . '/js/jquery.validate.js', array( 'jquery' ), $ver, true );
    // wp_enqueue_style( 'hamburgers', get_template_directory_uri() . '/css/hamburgers.min.css', array(), $ver );

    wp_localize_script( 'custom', 'variables', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'scripts_styles' );
