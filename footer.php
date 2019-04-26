<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shop-51e
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
      <div class="row">
        <div class="pages gr-12 gr-6@lg gr-6@xl">
          <?php
          wp_nav_menu( array(
            'theme_location'  => 'footer',
            'menu_id'         => 'footer-menu',
            'container'       => 'div',
            'container_id'    => 'navigation-footer',
          ) )
          ?>
        </div>
        <div class="channels gr-12 gr-6@lg gr-6@xl">
          <div class="social-sharing mt-1-5@xs mt-1-5@sm mt-1-5@md">
            <p class="title"><b><?php _e( 'get in touch', 'shop51e' ) ?></b></p>
            <?php
            $social_sharing_channels = get_field( 'social_sharing_channels', 'option' );
            if( $social_sharing_channels ) :
              printf('<a href="%s" target="_blank"><i class="icon-facebook"></i></a>', $social_sharing_channels['facebook']? $social_sharing_channels['facebook'] : '#' );
              printf('<a href="%s" target="_blank"><i class="icon-twitter"></i></a>', $social_sharing_channels['twitter']? $social_sharing_channels['twitter'] : '#' );
              printf('<a href="%s" target="_blank"><i class="icon-instagram"></i></a>', $social_sharing_channels['instagram']? $social_sharing_channels['instagram'] : '#' );
              printf('<a href="%s" target="_blank"><i class="icon-youtube"></i></a>', $social_sharing_channels['youtube']? $social_sharing_channels['youtube'] : '#' );
            endif;
            ?>
          </div>
          <div class="payment-methods mt-1-5">
            <p class="title"><b><?php _e( 'payment', 'shop51e' ) ?></b></p>
            <a><img class="mastercard" src="/wp-content/themes/shop-51e/assets/payment_mastercard.png" /></a>
            <a><img class="visa" src="/wp-content/themes/shop-51e/assets/payment_visa.png" /></a>
            <a><img class="paypal" src="/wp-content/themes/shop-51e/assets/payment_paypal.png" /></a>
          </div>
          <div class="delivery mt-1-5">
            <p class="title"><b><?php _e( 'delivery', 'shop51e' ) ?></b></p>
            <div>
              <a><img src="/wp-content/themes/shop-51e/assets/delivery_parcel_force.jpg" /></a>
              <a><img src="/wp-content/themes/shop-51e/assets/delivery_american_express.jpg" /></a>
              <a><img src="/wp-content/themes/shop-51e/assets/delivery_dhl_express.jpg" /></a>
            </div>
          </div>
        </div>
        <div class="copyright gr-12 mt-2 text-center">
          <p><?php _e( 'Copyright 2019 - Hieu TN. All rights reserved.', 'shop51e' ) ?></p>
        </div>
      </div>
    </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
