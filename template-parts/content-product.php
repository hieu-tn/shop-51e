<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shop-51e
 */

//$colors = get_field('colors');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
    <div class="row">
      <div class="gr-12 gr-6@lg gr-6@xl">

      </div>
      <div class="gr-12 gr-6@lg gr-6@xl">

      </div>
    </div>
  </div>


  <div class="entry-content">
    <?php
    the_content( sprintf(
      wp_kses(
      /* translators: %s: Name of current post. Only visible to screen readers */
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shop51e' ),
        array(
          'span' => array(
            'class' => array(),
          ),
        )
      ),
      get_the_title()
    ) );

    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shop51e' ),
      'after'  => '</div>',
    ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php shop51e_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
