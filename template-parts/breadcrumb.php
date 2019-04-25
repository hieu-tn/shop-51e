<?php
$ancestors = array_reverse( get_post_ancestors( get_queried_object() ) );
?>

<section class="section-breadcrumb">
  <div class="container">
    <div class="row">
      <div class="gr-12">
        <a href="<?= home_url() ?>"><?= __( 'Home', 'shop51e' ) ?></a>
        <span>></span>
        <?php foreach( $ancestors as $ancestor ) : ?>
          <a href="<?= get_permalink( $ancestor ) ?>"><?= get_the_title($ancestor) ?></a>
          <span>></span>
        <?php endforeach; ?>
        <a href="<?= get_permalink( get_queried_object() ) ?>"><?= get_the_title() ?></a>
      </div>
    </div>
  </div>
</section>
