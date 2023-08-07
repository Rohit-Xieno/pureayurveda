<?php
/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function pureayurveda_one_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style('pureayurveda-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style('pureayurveda-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', null, $theme_version);
    wp_enqueue_style('pureayurveda-base2', get_template_directory_uri() . '/dist/app.css', null, $theme_version);
    // wp_enqueue_style('pureayurveda-base3', get_template_directory_uri() . '/resources/css/app.css', null, $theme_version);
    wp_enqueue_style('pureayurveda-base', get_template_directory_uri() . '/assets/css/app.css', null, $theme_version);

    wp_enqueue_script( 'pureayurveda-jquery', get_theme_file_uri( '/assets/js/jquery.min.js' ), array(), $theme_version, true );
    wp_enqueue_script( 'pureayurveda-owl-js', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array(), $theme_version, true );
    wp_enqueue_script( 'pureayurveda-vendor', get_theme_file_uri( '/assets/js/app.js' ), array(), $theme_version, true );

}
add_action( 'wp_enqueue_scripts', 'pureayurveda_one_scripts' );
