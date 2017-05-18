@extends('master')
@section('title' , 'TEST')

@section('content')
  {{-- @php
  $POST["A0"] = "a";
  $POST["A1"] = "";
  $POST["A2"] = "c";
  $POST["A3"] = "";
  $POST["A4"] = "e";
  $POST["A5"] = "f";

// 체크박스 쳌
for($lenth_A = 0; $lenth_A <6 ; $lenth_A++ ){
  $input_A = 'A'.$lenth_A;
  if (isset($POST["$input_A"])) {
    $input_A_arr["$lenth_A"] = $POST["$input_A"];
  }
}

foreach ($input_A_arr as $value) {
  echo $value;
}
  @endphp --}}
  <!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Complex Polylines</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding-top: 35px;
        padding-bottom: 35px;
      }
      #floating-panel {
      position: absolute;
      left: 25%;
      z-index: 5;
      background-color: #fff;
      padding: 5px;
      border: 1px solid #999;
      text-align: center;
      font-family: 'Roboto','sans-serif';
      line-height: 30px;
      padding-left: 10px;
    }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <input onclick="removeLine();" type=button value="Remove line">
    <input onclick="addLine();" type=button value="Restore line">
    </div>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>
         // This example adds a search box to a map, using the Google Place Autocomplete
         // feature. People can enter geographical searches. The search box will return a
         // pick list containing a mix of places and predicted search terms.

         // This example requires the Places library. Include the libraries=places
         // parameter when you first load the API. For example:
         // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

         function initAutocomplete() {
           var map = new google.maps.Map(document.getElementById('map'), {
             center: {lat: -33.8688, lng: 151.2195},
             zoom: 13,
             mapTypeId: 'roadmap'
           });

           // Create the search box and link it to the UI element.
           var input = document.getElementById('pac-input');
           var searchBox = new google.maps.places.SearchBox(input);
           map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

           // Bias the SearchBox results towards current map's viewport.
           map.addListener('bounds_changed', function() {
             searchBox.setBounds(map.getBounds());
           });

           var markers = [];
           // Listen for the event fired when the user selects a prediction and retrieve
           // more details for that place.
           searchBox.addListener('places_changed', function() {
             var places = searchBox.getPlaces();

             if (places.length == 0) {
               return;
             }

             // Clear out the old markers.
             markers.forEach(function(marker) {
               marker.setMap(null);
             });
             markers = [];

             // For each place, get the icon, name and location.
             var bounds = new google.maps.LatLngBounds();
             places.forEach(function(place) {
               if (!place.geometry) {
                 console.log("Returned place contains no geometry");
                 return;
               }
               var icon = {
                 url: place.icon,
                 size: new google.maps.Size(71, 71),
                 origin: new google.maps.Point(0, 0),
                 anchor: new google.maps.Point(17, 34),
                 scaledSize: new google.maps.Size(25, 25)
               };

               // Create a marker for each place.
               markers.push(new google.maps.Marker({
                 map: map,
                 icon: icon,
                 title: place.name,
                 position: place.geometry.location
               }));

               if (place.geometry.viewport) {
                 // Only geocodes have viewport.
                 bounds.union(place.geometry.viewport);
               } else {
                 bounds.extend(place.geometry.location);
               }
             });
             map.fitBounds(bounds);
           });
           function removeLine() {
             flightPath.setMap(null);
           }
           function addLine() {
             flightPath.setMap(map);
           }
         }

       </script>
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6fGg2hJalQ8FiuUCKTuY94x9H5hQ26uo&libraries=places&callback=initAutocomplete"
                async defer></script>

  </body>
</html>

  @endsection
