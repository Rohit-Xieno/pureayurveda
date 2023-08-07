<?php
/**
 * Register widget area.
 *
 * * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */

if (function_exists('register_sidebar')) {

    // Sidebar Widget
    // Location: the sidebar
    register_sidebar(array(
        'name'          => __( 'Sidebar', 'pureayurveda' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'pureayurveda' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-3xl flex items-center mb-4 relative"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">',
        'after_title'   => '</span><span class="flex-auto h-0.5 ml-3.5 bg-gradient-to-r to-emerald-600 from-sky-400"></span></h4>',
    ));


    register_sidebar(array(
        'name'          => __( 'Home Page Sidebar', 'pureayurveda' ),
        'id'            => 'sidebar-home',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'pureayurveda' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-3xl flex items-center mb-4 relative"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">',
        'after_title'   => '</span><span class="flex-auto h-0.5 ml-3.5 bg-gradient-to-r to-emerald-600 from-sky-400"></span></h4>',
    ));


    register_sidebar(array(
        'name'          => __( 'Topbar Sidebar Phone', 'pureayurveda' ),
        'id'            => 'topbar-sidebar-phone',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'pureayurveda' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-3xl flex items-center mb-4 relative"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">',
        'after_title'   => '</span><span class="flex-auto h-0.5 ml-3.5 bg-gradient-to-r to-emerald-600 from-sky-400"></span></h4>',
    ));


    register_sidebar(array(
        'name'          => __( 'Topbar Text Sidebar', 'pureayurveda' ),
        'id'            => 'topbar-text-sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'pureayurveda' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-3xl flex items-center mb-4 relative"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">',
        'after_title'   => '</span><span class="flex-auto h-0.5 ml-3.5 bg-gradient-to-r to-emerald-600 from-sky-400"></span></h4>',
    ));


    register_sidebar(array(
        'name'          => __( 'Shop Page Sidebar', 'pureayurveda' ),
        'id'            => 'shop-page-sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'pureayurveda' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-3xl flex items-center mb-4 relative"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">',
        'after_title'   => '</span><span class="flex-auto h-0.5 ml-3.5 bg-gradient-to-r to-emerald-600 from-sky-400"></span></h4>',
    ));
 
}