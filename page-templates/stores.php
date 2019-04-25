<?php
/**
 * Template Name: Stores
 */

get_header();

/**
 * Section Map
 */
if( have_rows('section_map') ) :
  while( have_rows('section_map') ) : the_row();
    shop51e_get_template( 'stores/map', [
      'markers' => get_sub_field('markers')
    ] );
  endwhile;
endif;

/**
 * Section Stores
 */
if( have_rows('section_stores') ) :
  while( have_rows('section_stores') ) : the_row();
    shop51e_get_template( 'stores/shops', [
      'shops' => get_sub_field('shops')
    ] );
  endwhile;
endif;

get_footer();
