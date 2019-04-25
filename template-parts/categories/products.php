<?php
/**
 * product_types: Taxonomy
 */

global $post;

$types = array_map( function($product_type) {
  return $product_type->name;
}, $product_types );

$posts = get_posts( [
  'posts_per_page' => -1,
  'post_type' => 'product',
  'tax_query' => [
    [
      'taxonomy' => $product_types[0]->taxonomy,
      'field' => 'name',
      'terms' => $types,
      'operator' => 'IN',
    ]
  ]
] );

$products = [];
foreach( $posts as $post ) :
  $products[] = [
//    'id' => $post->ID,
//    'date' => $post->post_date,
    'title' => $post->post_title,
    'price' => $post->price,
    'colors' => get_field( 'colors', $post->ID )? array_map( function( $item ) {
      return [
        'color' => $item['color'],
        'image' => $item['image']['url']
      ];
    }, get_field( 'colors', $post->ID ) ) : [],
    'url' => get_permalink( $post ),
    'featured_image' => get_the_post_thumbnail_url( $post ),
//    'categories' => array_map( function( $term ) {
//      return [
//        'id' => $term->term_id,
//        'name' => $term->name,
//        'slug' => $term->slug
//      ];
//    }, get_the_terms( $post, $product_types[0]->taxonomy ) ),
    'type' => get_post_type( $post ),
  ];
endforeach;

wp_reset_postdata();
?>

<section class="section-products">
  <?php
  printf( '<shop51e-products prop-products="%s"></shop51e-products>', htmlspecialchars( json_encode( $products, JSON_UNESCAPED_UNICODE ), ENT_QUOTES, 'UTF-8' ) );
  ?>
</section>
