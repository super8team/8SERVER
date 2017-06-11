

  var map;


  function initialize() {
      var myLatlng = new google.maps.LatLng(37.564615,126.98420299999998);

      var myOptions = {
          zoom: 19,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      //클릭했을 때 이벤트
      google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
          infowindow.setContent("latLng: " + event.latLng); // 인포윈도우 안에 클릭한 곳위 좌표값을 넣는다.

          infowindow.setPosition(event.LatLng);             // 인포윈도우의 위치를 클릭한 곳으로 변경한다.
          document.getElementById('get_location').innerHTML=event.latLng;
      });
      //클릭 했을때 이벤트 끝
      //인포윈도우의 생성
      var infowindow = new google.maps.InfoWindow(
      {
        content: '<br><b>원하는 위치을 클릭</b>하면 좌표값생성<br> <b>복사하여 좌료값 입력</b>하십시요',
        size: new google.maps.Size(100,100),
        position: myLatlng
      });

      infowindow.open(map);
    } // function initialize() 함수 끝

    // 마커 생성 합수
    function placeMarker(location)
    {
        var clickedLocation = new google.maps.LatLng(location);

        var marker = new google.maps.Marker({
                              position: location,
                              map: map
                               });
        map.setCenter(location);
    }
