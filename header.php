<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shop-51e
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <base href="/">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header class="site-header <?= is_front_page()? 'front' : '' ?>">
    <div class="service-bar text-center@xs text-center@sm text-center@md">
      <div class="left">
        <?php
        $page_stores = get_page_by_path( 'stores' , OBJECT );
        if( isset( $page_stores ) ) :
        ?>
          <div class="store-locator">
            <a href="<?= get_permalink( $page_stores ) ?>"><?php _e( 'Store Locator', 'shop51e' ) ?></a>
          </div>
        <?php endif; ?>
        <?php
        $page_customer_service = get_page_by_path( 'customer-service' , OBJECT );
        if( isset( $page_customer_service ) ) :
        ?>
          <div class="customer-service">
            <a href="<?= get_permalink( $page_customer_service ) ?>"><?php _e( 'Customer Service', 'shop51e' ) ?></a>
          </div>
        <?php endif; ?>
      </div>
      <div class="right">
        <div class="account">
          <a><i class="icon-account"></i></a>
        </div>
        <div class="search">
          <span id="toggle-search" class="icon-search hide@lg hide@xl"></span>
          <?php get_search_form() ?>
        </div>
      </div>
    </div>
    <div class="menu-bar">
      <div class="container">
        <div class="row">
          <div class="gr-12">
            <?php if( get_field('logo', 'option') ) : ?>
              <div class="logo text-center@lg text-center@xl">
                <a href="<?php echo home_url() ?>"><img src="<?php _e( esc_attr( get_field('logo', 'option')['url'] ) ) ?>" /></a>
              </div>
            <?php endif; ?>
            <div class="mobile-trigger hide@lg hide@xl"><i></i></div>
            <?php
            wp_nav_menu( array(
              'theme_location'  => 'header',
              'menu_id'         => 'primary-menu',
              'container'       => 'div',
              'container_class' => 'main-navigation hide@xs hide@sm hide@md',
              'container_id'    => 'navigation-header-desktop',
              'walker'          => new Shop51E_Walker_Nav_Menu
            ) );
            wp_nav_menu( array(
              'theme_location'  => 'header',
              'menu_id'         => 'primary-menu',
              'container'       => 'div',
              'container_class' => 'main-navigation hide@lg hide@xl',
              'container_id'    => 'navigation-header-mobile',
//            'walker'          => new Shop51E_Walker_Nav_Menu
            ) );
            ?>
          </div>
        </div>
      </div>
    </div>
	</header>

	<div id="content" class="site-content">
