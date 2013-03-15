<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!-- Adapted from HTML5 Boilerplate conditional classes, added ie10 to condition -->
<!--[if lt IE 7]>      <html class="lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic|Open+Sans:300italic,400italic,700italic,800italic,400,800,700,300' rel='stylesheet' type='text/css'>
<link href='<?php echo get_bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
<link href='<?php echo get_bloginfo('stylesheet_directory'); ?>/font-awesome/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->


<?php
  if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
  wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

  <header class="head wrap">
    <hgroup>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <h3><?php bloginfo( 'name' ); ?></h3>
      </a>
      <h5><?php bloginfo( 'description' ); ?></h5>
    </hgroup>
  </header>

  <nav class="nav wrap nav-menu-wrap">
    <?php wp_nav_menu( array( 'theme_location' => 'nav', 'menu_class' => 'nav-menu', 'container' => false )); ?>
  </nav>

  <div class="body group wrap">