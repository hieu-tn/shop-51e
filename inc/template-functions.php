<?php
/**
 * utility functions
 *
 * @package shop-51e
 */

if ( ! function_exists( 'shop51e_get_env' ) ) :
  /**
   * get env
   */
  function shop51e_get_env() {
    $is_development = @file_get_contents('http://localhost:8000/scripts/main.js');
    if ($is_development)
      return 'development';

    return 'production';
  }
endif;

if ( ! function_exists( 'shop51e_get_template' ) ) :
  /**
   * get template part
   *
   * use this function instead of get_template_part()
   */
  function shop51e_get_template( $template_name, $vars = [], $template_part = 'template-parts/' ) {
    if ( ! empty( $vars ) && is_array( $vars ) ) {
      extract( $vars );
    }
    $template_name = $template_part . $template_name . '.php';
    $located = locate_template( $template_name, false, false );

    if ( ! file_exists( $located ) ) {
      _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '1.0' );
      return;
    }
    include( $located );
  }
endif;

if ( ! function_exists( 'shop51e_manage_promotion_posts_columns' ) ) :
  /**
   * Add the custom clumns to the promotion post type
   */
  function shop51e_manage_promotion_posts_columns( $columns ) {
    unset( $columns['author'], $columns['comments'], $columns['date'] );
    $columns['from'] = __( 'From', 'shop51e' );
    $columns['to'] = __( 'To', 'shop51e' );
    $columns['date'] = __( 'Date', 'shop51e' );

    return $columns;
  }
endif;
add_filter( 'manage_promotion_posts_columns', 'shop51e_manage_promotion_posts_columns' );

if ( ! function_exists( 'shop51e_manage_promotion_posts_custom_column' ) ) :
  /**
   * Add the data to the custom columns for the promotion post type
   */
  function shop51e_manage_promotion_posts_custom_column( $column, $post_id ) {
    switch( $column ) :
      case 'from' :
        echo date( "g:i A dS M, Y", strtotime( get_field( 'start_date', $post_id ) ) );
        break;
      case 'to' :
        echo date( "g:i A dS M, Y", strtotime( get_field( 'expire_on', $post_id ) ) );
        break;
    endswitch;
  }
endif;
add_action( 'manage_promotion_posts_custom_column' , 'shop51e_manage_promotion_posts_custom_column', 10, 2 );

if ( ! function_exists( 'shop51e_is_page_template' ) ) :
  /**
   * is page template
   *
   * use this function instead of is_page_template()
   */
  function shop51e_is_page_template( $template = '' ) {
    if( ! is_singular() )
      return false;

    $page_template = basename( get_page_template_slug( get_queried_object_id() ) );

    if( empty( $template ) ) :
      return (bool) $page_template;
    endif;

    if( $template == $page_template ) :
      return true;
    endif;

    if( is_array( $template ) ) :
      if( ( in_array( 'default', $template, true) && ! $page_template ) || in_array( $page_template, $template, true ) ) :
        return true;
      endif;
    endif;

    return ( 'default' === $template && ! $page_template );
  }
endif;

if ( ! function_exists( 'shop51e_script_loader_tag' ) ) :
  /**
   * add async defer to script
   */
  function shop51e_script_loader_tag( $tag, $handle ) {
    $script_array = [ 'shop51e-script-main' ];
    if( in_array( $handle, $script_array) ) :
      return str_replace(' src', 'defer async src', $tag);
    endif;
    return $tag;
  }
endif;
add_filter( 'script_loader_tag', 'shop51e_script_loader_tag', 10, 2 );
