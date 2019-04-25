<?php
/**
 * Template Name: Categories
 */

get_header();

shop51e_get_template( 'breadcrumb' );

shop51e_get_template( 'page-title' );

if( have_rows('section_types') ) :
  while( have_rows('section_types') ) : the_row();
    shop51e_get_template( 'categories/products', [
      'product_types' => get_sub_field('product_types')
    ] );
  endwhile;
endif;

get_footer();
