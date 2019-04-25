<?php
/**
 * backgrounds: Image (array)
 * promotions: object(WP_Post) (array)
 */

?>

<div class="section--masthead">
  <div class="hero" id="hero">
    <?php foreach( $backgrounds as $background ) :
      printf(
        '<img src="%s" />',
        $background['sizes']['home_backgrounds']
      );
    endforeach; ?>
  </div>

  <div class="promotions">
    <div class="list">
      <?php foreach( $promotions as $promotion ) : ?>
        <div class="promotion">
          <div class="container">
            <div class="row">
              <div class="gr-10@xs gr-10@sm gr-6 gr-centered text-center">
                <h1 class="title"><?= $promotion->post_title ?></h1>
                <div class="subtitle">
                  <?= $promotion->post_content ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="container arrows">
      <button class="slick-prev slick-arrow" aria-label="Previous" type="button">Previous</button>
      <button class="slick-next slick-arrow" aria-label="Next" type="button">Next</button>
    </div>
  </div>
</div>
