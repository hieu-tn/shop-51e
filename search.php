<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package shop-51e
 */

$total_results = [];

//add normal search (mostly pages) to total_results
if( have_posts() ) :
  while ( have_posts() ) : the_post();
    $total_results[] = [
      'title' => get_the_title(),
      'featured_image' => get_the_post_thumbnail_url(),
      'url' => get_the_permalink(),
      'type' => get_post_type(),
      'excerpt' => mb_strimwidth( get_the_excerpt(), 0, 60, '...' )
    ];
  endwhile;
endif;

//add products based on keyword category
$search_category = new WP_Query( [
  'post_type' => 'product',
  'tax_query' => array(
    array(
      'taxonomy' => 'product_category',
      'field'    => 'slug',
      'terms'    => get_search_query(),
      'operator' => 'IN'
    ),
  ),
] );
if( $search_category->have_posts() ) :
  while( $search_category->have_posts() ) : $search_category->the_post();
    $total_results[] = [
      'title' => get_the_title(),
      'featured_image' => get_the_post_thumbnail_url(),
      'url' => get_the_permalink(),
      'type' => get_post_type(),
      'price' => get_field( 'price', get_the_ID() ),
      'colors' => get_field( 'colors', get_the_ID() )? array_map( function( $item ) {
        return [
          'color' => $item['color'],
          'image' => $item['image']['url']
        ];
      }, get_field( 'colors', get_the_ID() ) ) : [],
    ];
  endwhile;
endif;

//add products based on keyword title
$search_title = new WP_Query( [
  'post_type' => 'product',
  's' => get_search_query()
] );
if( $search_title->have_posts() ) :
  while( $search_title->have_posts() ) : $search_title->the_post();
    $total_results[] = [
      'title' => get_the_title(),
      'featured_image' => get_the_post_thumbnail_url(),
      'url' => get_the_permalink(),
      'type' => get_post_type(),
      'price' => get_field( 'price', get_the_ID() ),
      'colors' => get_field( 'colors', get_the_ID() )? array_map( function( $item ) {
        return [
          'color' => $item['color'],
          'image' => $item['image']['url']
        ];
      }, get_field( 'colors', get_the_ID() ) ) : [],
    ];
  endwhile;
endif;

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() || $search_name || count ) : ?>

			<header class="page-header">
        <div class="container">
          <h1 class="page-title">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Search Results for: %s', 'shop51e' ), '<span>' . get_search_query() . '</span>' );
            ?>
          </h1>
        </div>
			</header><!-- .page-header -->

      <div class="page-list">

        <?php

        printf( '<shop51e-products prop-products="%s"></shop51e-products>', htmlspecialchars( json_encode( $total_results, JSON_UNESCAPED_UNICODE ), ENT_QUOTES, 'UTF-8' ) );
        ?>

      </div>

      <?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
