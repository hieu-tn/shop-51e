<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shop-51e
 */

$colors = get_field( 'colors', get_the_ID() );
//var_dump($colors);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
    <div class="row">
      <div class="gr-6">

      </div>
      <div class="gr-6">
        <div class="entry-header">
          <?php the_title('<h1 class="entry-title">', '</h1>') ?>
          <p class="upc"><?php _e( 'UPC', 'shop-51e' ) ?>: <?php the_field('upc') ?></p>
          <p class="price"><?php _e( 'Price', 'shop-51e' ) ?>: $<?php the_field('price') ?></p>
        </div><!-- .entry-header -->
        <div class="entry-content">

          <div class="description">
            <p><b><?php _e( 'details', 'shop-51e' ) ?></b></p>
            <?php the_content() ?>
          </div>

          <div class="color">
            <span>Color: </span>
            <select class="" name="color">
              <option><?php _e( 'Select your color', 'shop-51e' ) ?></option>
            </select>
          </div>

          <div class="size">
            <span>Size: </span>
            <select class="" name="size">
              <option><?php _e( 'Select your size', 'shop-51e' ) ?></option>
            </select>
          </div>

          <div class="quantity">
            <span>Quantity: </span>
            <select class="" name="quantity">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>

          <div class="add">
            <a><?php _e( 'add to bag', 'shop-51e' ) ?></a>
          </div>

        </div><!-- .entry-content -->
      </div>
    </div>
  </div>

  <div class="entry-footer">

  </div><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
