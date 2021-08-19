<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
   <style>
   #map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
   <script>
   let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}
</script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDSh1SwthGocAh8XZ-kSwnIGnEZJsS_qI&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>