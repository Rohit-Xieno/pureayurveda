<?php
// Exit if accessed directly.
// defined( 'ABSPATH' ) || exit;


// Initialize theme default settings.
include_once(TEMPLATEPATH . '/inc/config.php');

// Enqueue scripts and styles
include_once(TEMPLATEPATH . '/inc/enqueue.php');

// Register widget area
include_once(TEMPLATEPATH . '/inc/widgets.php');

// Theme setup
include_once(TEMPLATEPATH . '/inc/setup.php');

// single product elements
include_once(TEMPLATEPATH . '/inc/single-product_elements.php');

