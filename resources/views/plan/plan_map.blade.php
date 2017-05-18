@extends('master')


@section('title','상세 계획 작성 페이지')

@section('content')
  <!DOCTYPE html>
<html>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <style>
      #floating-panel {
      position: absolute;
      left: 25%;
      z-index: 5;
      background-color: #fff;
      padding: 5px;
      border: 1px solid #999;
      text-align: center;
      font-family: 'Roboto','sans-serif';
      line-height: 40px;
      padding-left: 10px;
      padding-top: 10px;
    }
    </style>
    <script>

      // This example creates an interactive map which constructs a polyline based on
      // user clicks. Note that the polyline only appears once its path property
      // contains two LatLng coordinates.

      var poly;
      var path;
      var map;
      var marker;

      function initMap() {
        //시작 위치를 받아올 수 있다면 자기 위치에 서 시작

        //아니면 기본 위치는 서울로 지정 할 것
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 37.579, lng: 126.990},  // Center the map on Chicago, USA.
          mapTypeControl: true,
          mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
          }
        });

        //********************  폴리라인  ********************

        //폴리라인 선언 및 기본 설정
        poly = new google.maps.Polyline({
          strokeColor: '#000000',
          strokeOpacity: 1.0,
          strokeWeight: 3
        });

        //
        poly.setMap(map);

        // Add a listener for the click event
        // 클릭시 위도 경도 를 더하는 함수를 호출
        map.addListener('click', addLatLng);

        //********************  검색  ********************
        // Create the search box and link it to the UI element.
        // 검색 창에 대한 설정
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        // bounds_changed 가 뭔지 모르겠으나 검색 되었을 때일려나? 이함 수 검색 하기
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        // 검색 부분 마커
          var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.

        // 검색 후 마커가 표시되는 코드
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          // 검색 후에 지도상의 마커를 지움
          markers.forEach(function(marker) {
            marker.setMap(null);
          });

          //마커 배열 초기화 통해 마커 정보 제거
          markers = [];

          // For each place, get the icon, name and location.
          // 검색된 지역에 대한 정보를 표시
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            //아이콘 생성
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            // 검색된 지역 또는 식당 문화제 등에 따라 표시 아이콘이 달라짐
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            // 뭐시여 이건
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          // 닌 또 뭐여
          map.fitBounds(bounds);
        });
     }//init() End

     //****************** 폴리 라인에 사용되는 함수  ******************
     function addLatLng(event) {
       path = poly.getPath();

       // Because path is an MVCArray, we can simply append a new coordinate
       // and it will automatically appear.
       path.push(event.latLng);

       // Add a new marker at the new plotted point on the polyline.
       marker = new google.maps.Marker({
       position: event.latLng,
      //  draggable:true,
       title: '#' + path.getLength(),
       map: map
       });
     };

      // Handles click events on a map, and adds a new point to the Polyline.

      // // 폴리라인 지우기 (추후 마커 포함)
      // function removeLine() {
      //   // marker.setMap(null);
      //    poly.setMap(null);
      // }
      //
      // //되돌리기 지우기 (추후 마커 포함)
      // function addLine() {
      //   // marker.setMap(map);
      //   poly.setMap(map);
      // }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6fGg2hJalQ8FiuUCKTuY94x9H5hQ26uo&libraries=places&callback=initMap">
    </script>


    <div class="bluedecobar">

    </div>
  <div class="bluebg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              검색 넣을 곳
              <div class="pull-right">
                오른쪽 정령 사용 하려나?
              </div>
            </div><!-- /.panel-heading -->
            <div class="panel-body">
              판넬 바디
            </div><!-- /.panel-body -->
          </div><!-- /.panel -->
        </div> <!-- /.col-lg-4 -->

        <div class="col-lg-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              헤딩
            </div><!-- /.panel-heading -->
              <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <span class="pull-right text-muted small"><em>4 minutes ago</em>
                        </span>
                    </a>
                </div><!-- /.list-group -->
             </div><!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  맵 들어가는 곳
                </div>
                <div class="panel-body">
                  {{-- 검색 창 --}}
                  {{-- <div id="floating-panel" >
                    <input onclick="removeLine();" type=button value="Remove line" >
                    <input onclick="addLine();" type=button value="Restore line">
                  </div> --}}
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                  <div id="map" style="min-height:500px;"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i> 시간 표 넣을 곳

              </div><!-- /.panel-heading -->
              <div class="panel-body">
                시간 표 넣을 곳
              </div>
            </div><!-- /.panel-footer -->
          </div><!-- /.panel .chat-panel -->
        </div><!-- /.col-lg-4 -->
      </div>
    </div>

@endsection
