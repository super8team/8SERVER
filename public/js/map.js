
var markersArray = [];

var map = new google.maps.Map(document.getElementById("map"), {
 zoom: 15,
 center: new google.maps.LatLng(35.8963091, 128.62205110000002),
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
 }
});

google.maps.event.addListener(map, 'click', function (mouseEvent) {
 getAddress(mouseEvent.latLng);

 document.getElementById('get_location').innerHTML = mouseEvent.latLng;
});

function getAddress(latlng) {

  var geocoder = new google.maps.Geocoder();
geocoder.geocode({
latLng: latlng
}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
    if (results[0].geometry) {

        var address = results[0].formatted_address;

        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

  new google.maps.InfoWindow({
      content: address + "<br>(Lat, Lng) = " + latlng
      //content: address
  }).open(map, marker);

  var opt = $("<option value='" + latlng.toString() + "'>" + address + "</option>");
  $("#markerList").append(opt);

  //markersArray.push(marker);
 }
} else {
 alert("다시 입력해 주세요");
}
});
}


function changemap() {
  var sm = $("#markerList option:selected").val().toString().replace(/[\(\)]/gi, '').split(",");
  console.log(sm);
  map.setCenter(new google.maps.LatLng(sm[0].trim(), sm[1].trim()));
  map.setZoom(14);
}
function clearField(field){
 if (field.value == field.defaultValue) {
   field.value = '';
 }
}
function checkField(field){
 if (field.value == '') {
   field.value = field.defaultValue;
 }
}
function resetSearch()
{
  location.reload();
}

function getLatLng(place) {

  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
      address: place,
      region: 'ko'
  }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
          var bounds = new google.maps.LatLngBounds();

          for (var r in results) {
              if (results[r].geometry) {
                  var latlng = results[r].geometry.location;
                  bounds.extend(latlng);
                  //var address = results[0].formatted_address.replace(/^日本, /, '');
                  var address = results[r].formatted_address;

   new google.maps.InfoWindow({
    content: address + "<br>(Lat, Lng) = " + latlng.toString()
   }).open(map, new google.maps.Marker({
    position: latlng,
    map: map
   }));

                  var opt = $("<option value='" + latlng.toString() + "'>" + address + "</option>");
                  $("#markerList").append(opt);
                  $("#addrList").append(slt);
              }
          }
          map.fitBounds(bounds);
      }  else {
          alert("다시 입력해 주세요");
      }
  });
}
