@extends('master')
@section('title' , 'TEST2')

@section('content')
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
           <input onclick="clearMarkers();" type=button value="모든 마커 숨기기">
           <input onclick="showMarkers();" type=button value="모든 마커 포시">
           <input onclick="deleteAllMarkers();" type=button value="모든 마커 삭제">
           <input onclick="deleteMarker();" type=button value="뒤로 돌리기">
           <input onclick="repairMarker();" type=button value="앞으로 돌리기">
         </div>
         <div id="map"></div>
         <p>Click on the map to add markers.</p>
         <script>

           // In the following example, markers appear when the user clicks on the map.
           // The markers are stored in an array.
           // The user can then click an option to hide, show or delete the markers.
           var map;
           var markers = [];
           var count = 0;

           function initMap() {
             //위경도 변수설정
             var seoul = {lat: 37.579, lng: 126.990};

             map = new google.maps.Map(document.getElementById('map'), {
               zoom: 12,
               center: seoul,
               mapTypeId: 'terrain'
             });

             // This event listener will call addMarker() when the map is clicked.
             // 이 이벤트 리스너는 클릭시 addMarker() 를 호출한다.
             map.addListener('click', function(event) {
               addMarker(event.latLng);
             });

             // Adds a marker at the center of the map.
            //  시작시 기본 위경도에 마커
            //  addMarker(seoul);
            //count 새기용

           }

           // Adds a marker to the map and push to the array.
           function addMarker(location) {
             var marker = new google.maps.Marker({
               position: location,
               map: map
             });
             markers.push(marker);
           }

           // Sets the map on all markers in the array.
          //  배열에 있는 모든 마커를 설정
           function setMapOnAll(map) {
             for (var i = 0; i < markers.length; i++) {
               markers[i].setMap(map);
             }
           }

           // Removes the markers from the map, but keeps them in the array.
           // 지도 마커 숨기기
           function clearMarkers() {
             setMapOnAll(null);
           }

           // Shows any markers currently in the array.
           //숨긴 마커 보이기
           function showMarkers() {
             setMapOnAll(map);
           }

           // Deletes all markers in the array by removing references to them.
           // 모든 마커 삭제하기
           function deleteAllMarkers() {
             clearMarkers();
             markers = [];
           }

           //ctrl + z 마커 하나씩  제거하기
           function deleteMarker() {
             count++;
            //  지도 표시 비우기
             setMapOnAll(null);

             //카운트가 배열 의 길이보다 커지면 배열 길이와 동일하게 초기화
             if(markers.length < count){
               count = markers.length;
               alert("더이상 되돌릴 수 없습니다.");
              }


             //버튼 이 눌릴때만다 표시를 하나씩 제거함
             for (var i = 0; i < markers.length - count; i++) {
               markers[i].setMap(map);
             }

           }

           //ctrl + y 하나씩 앞으로 되돌리기
        //    function repairMarker(){
        //      count--;
        //      // 지도의 표시를 비우기
        //      setMapOnAll(null);
        //      //카운트가 0보다 작아져서 배열 값을 넘기지 않도록 초기화
        //      if (count < 0){
        //        count = 0;
        //        alert("가장 최신입니다.");
        //      }
        //      //
        //      for (var i = 0; i < markers.length - count; i++) {
        //        markers[i].setMap(map);
        //      }
         //
        //  }

      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6fGg2hJalQ8FiuUCKTuY94x9H5hQ26uo&libraries=places&callback=initMap">
      </script>
    </body>
  </html>
@endsection
