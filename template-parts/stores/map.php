<?php
/**
 * markers: Repeater
 * -  marker: Text
 */

//var_dump($markers);
?>

<section class="section-map">
  <div id="map"></div>
</section>

<?php if( get_field( 'google_api_key', 'option' ) ) : ?>

  <script>
    function initMap() {
      // The map
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {
          lat: 10.7883383,
          lng: 106.712571
        }
      });
      // The markers
      <?php foreach( $markers as $marker ) : ?>
        getGeocodeAddress("<?= $marker['marker'] ?>");
      <?php endforeach; ?>
      // var marker = new google.maps.Marker({position: uluru, map: map});
    }
    function getGeocodeAddress(address) {
      console.log(address);
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({
        'address': address
      }, function(results, status) {
        if (status === 'OK') {
          // resultsMap.setCenter(results[0].geometry.location);
          console.log('ok', results[0].geometry.location.lat());
          console.log('ok', results[0].geometry.location.lng());
          // var marker = new google.maps.Marker({
          //   map: resultsMap,
          //   position: results[0].geometry.location
          // });
        } else {
          // alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= get_field( 'google_api_key', 'option' ) ?>&callback=initMap"></script>

<?php endif; ?>

