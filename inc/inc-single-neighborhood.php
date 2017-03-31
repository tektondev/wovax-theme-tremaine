<section class="tre-map">
<?php if( ! empty( $settings['_latitude'] ) && ! empty( $settings['_longitude'] ) ):?>
    <div id="map" style="height: 600px; width: 100%; visibility: visible; position: relative; margin-top: 40px;"></div>
    
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?key=AIzaSyByxd9Gy03305D0CgZLrqT-gQVPwl8mepo&#038;libraries=drawing&#038;sensor=false'></script>
    <script>
        function initMap() {
          var uluru = {lat: <?php echo $settings['_latitude'];?>, lng: <?php echo $settings['_longitude'];?>};
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: <?php echo $geo_zoom ?>,
            center: uluru,
            scrollwheel:  false
          });
          var marker = new google.maps.Marker({
            position: uluru,
            map: map
          });
        }
        initMap();
      </script>
<?php elseif ( ! empty( $settings['_html_code'] ) ):?>
	<?php echo $settings['_html_code'];?>
<?php endif;?>
</section>
<h2 class="section-heading-center">
	Neighborhood Information
</h2>