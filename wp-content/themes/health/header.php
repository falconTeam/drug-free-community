<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package health
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="stylesheet" href="css/footer-distributed.css">
<link rel="stylesheet" href="css/font-awesome-4.4.0/css/font-awesome.min.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<div id="page" class="hfeed site">
    <div class="nitins-favourite-logo">
        Drug Free Community<br>
        <div class="nitin-subtitle">Assisting people</div>
    </div>
    <div>
        <nav id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'health' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
            
            <div class="clear"></div>
            <div class="nav-foot"></div>
        </nav><!-- #site-navigation -->
    </div>
    
    <div class="nitin-banner">
    </div>


	<div id="content" class="site-content">