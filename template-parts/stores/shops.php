<?php
/**
 * shops Repeater
 * -  name: Text
 * -  address: Text
 * -  tel: Text
 * -  open: Time Picker
 * -  close: Time Picker
 */

?>

<section class="section-shops">
  <div class="container">
    <div class="row">
      <div class="gr-12 gr-11@sm gr-11@md gr-11@lg gr-10@xl gr-centered">
        <h1>Locations</h1>
      </div>
      <div class="gr-12 gr-11@sm gr-11@md gr-11@lg gr-10@xl gr-centered">
        <?php foreach( $shops as $shop ) : ?>
          <div class="shop">
            <h4 class="name"><b><?= $shop['name'] ?></b></h4>
            <div class="info">
              <p><b><i><?php _e( 'Address', 'shop51e' ) ?></i></b>: <?= $shop['address'] ?></p>
              <p><b><i><?php _e( 'Opening hours', 'shop51e' ) ?></i></b>: <?= $shop['open'] ?> - <?= $shop['close'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
