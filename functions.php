<?php

/**
 * - override twentyeleven action and filter hooks
 * - register two nav_menus: primary and footer.
 * - register one sidebar: right-sidebar
 * - Add body class
 * - Add script support
 */

/*
 * overriding twentyeleven action and filter hooks
 */
add_action( 'after_setup_theme', 'ttmin_child_theme_setup', 11 );
function ttmin_child_theme_setup() {
  $GLOBALS['custom_background']   = '__return_false'; // @remove_theme_support('custom-background');
  $GLOBALS['custom_image_header'] = '__return_false'; // @remove_theme_support('custom-header');
  
  // remove_theme_support( 'post-formats'); // Turn off post formats // Remove post formats?

}

 // page_title | site_name wp_title('|', true, 'right');
add_filter( 'wp_title', 'ttmin_wp_title', 10, 2 );
function ttmin_wp_title( $title, $sep ) {
  global $paged, $page;
  if (is_feed()) return $title;
  
  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) $title = "$title " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

  // Add the title | site name
  $title .= get_bloginfo('name');

  return $title;
}

// prevent wordpress from outputting meta tag version info
remove_action('wp_header', 'wp_generator');

// register a supplementary navigation menu to the Primary menu of TwentyTwelve: Secondary
// register_nav_menus(array('nav'=>'Secondary'));

// register single sidebar: Right Sidebar
// register_sidebar(array(
//   'name' => __( 'Right Sidebar', 'twentyeleven' ),
//   'id' => 'side',
//   'description' => __( 'Widgets in this area will be shown on the side.', 'twentyeleven' ),
//   'before_title' => '<h6>',
//   'after_title' => '</h6>',
//   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//   'after_widget' => '</aside>'
// ));

// add the page title as a body class
add_filter( 'body_class', 'ttmin_body_class' );
function ttmin_body_class( $classes ){
  if(is_singular()){
    global $post;
    array_push( $classes, $post->post_name );
  }
  return $classes;
}

// Quality open source free scripts (Uncomment to use)
add_action('wp_enqueue_scripts', 'ttmin_enqueue_scripts');
function ttmin_enqueue_scripts() {  wp_enqueue_script('jquery');

  // reveal (dialog)
  // wp_enqueue_script('reveal', get_stylesheet_directory_uri() . '/js/reveal/jquery.reveal.js', array('jquery'));
  // wp_enqueue_style('reveal', get_stylesheet_directory_uri() . '/js/reveal/reveal.css');
  
  // slimbox (lightbox)
  // wp_enqueue_script('slimbox2', get_stylesheet_directory_uri() . '/js/slimbox2/script.js', array('jquery'));
  // wp_enqueue_style('slimbox2', get_stylesheet_directory_uri() . '/js/slimbox2/style.css');
  
  // orbit (slideshow)
  // wp_enqueue_style( 'orbit-css', get_stylesheet_directory_uri() . '/js/orbit/orbit-1.2.3.css' );
  // wp_enqueue_script( 'orbit-js', get_stylesheet_directory_uri() . '/js/orbit/jquery.orbit-1.2.3.min.js', 'jquery');

}

/**
 * Add Home to Pages in Administration > Appearance > Menus
 */
add_filter( 'wp_page_menu_args', 'ttmin_page_menu_args' );
function ttmin_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}

// Remove admin bar I never ever ever use it
add_filter('show_admin_bar', '__return_false');

/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function ttm_child_theme_setup() {
  load_child_theme_textdomain( 'twentytwelveminimal', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ttm_child_theme_setup' );