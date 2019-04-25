<?php
/**
 * Template Name: Home
 */

get_header();

/**
 * Section masthead: BEGIN
 */
if( have_rows('section_masthead') ) :
  while( have_rows('section_masthead') ) : the_row();
    $backgrounds = get_sub_field('backgrounds');
    $backgrounds_data = [];
    foreach( $backgrounds as $background ) :
      $backgrounds_data[] = $background['image'];
    endforeach;
    $promotions = get_posts( [
      'posts_per_page' => -1,
      'post_type' => 'promotion',
      'meta_query' => [
        'relation' => 'AND',
        [
          'key' => 'start_date',
          'value' => current_time( 'Ymd' ),
          'compare' => '<='
        ],
        [
          'key' => 'expire_on',
          'value' => current_time( 'Ymd' ),
          'compare' => '>='
        ],
      ]
    ] );
    shop51e_get_template( 'home/masthead', [
      'backgrounds' => $backgrounds_data,
      'promotions' => $promotions
    ] );
  endwhile;
endif;
/**
 * Section masthead: END
 */

get_footer();
