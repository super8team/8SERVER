@extends('master')

@section('title','상세 계획 작성 페이지')

@section('content')
  @php
  	//임시 변수
  	$plan_title 						= "야비군";
  	$plan_date							= "2017/05/23";
  	$teacher_name 					= "원사님";
  	$trip_kind_value 				= "각개전투";
  	$attend_class_count 		= "1";
  	$attend_student_coutn		= "41";
  	$unattend_student_count	= "1";
  	$transpotation 					= ["버스","비행기"];

    $day = 3;
  @endphp

  <!DOCTYPE html>
<html>
{{--
구현 해야되는 기능
Full Calendar

1. Tour Api or 기본 구글 맵스
  - ????
2. 시간표를 스크롤
  - 조건 : 몇박몇칠인지를 먼저 받아와야함
  - 버튼을 눌러 날짜별 시간표를 봄
  - 시간표가 바뀔떄 이때까지 작업한 마커의 위치 값을 배열에 저장하고 지도를 초기화
  - 새로운 작업
  - 작성 완료까지 반복

3. 드래그 앤 드롭
  - 검색
    - 검색된 기본 정보
      : 검색 장소 명
      : 장소 간략 설명 정보 (미정)
    - 장소와 관련 있는 공유된 계획서
      - 저장 되어 상세계획 정보

   - 관심 목록
     - 저장 되어 상세계획 정보


 --}}
    {{-- <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="../public/fullcalendar-3.4.0/fullcalendar.css" rel="stylesheet"/>
    <link href="../public/fullcalendar-3.4.0/fullcalendar.print.css" rel="stylesheet" media="print"/>
    <script type="text/javascript" src="../public/fullcalendar-3.4.0/lib/moment.min.js"></script>
    <script type="text/javascript" src="../public/fullcalendar-3.4.0/lib/jquery.min.js"></script>
    <script type="text/javascript" src="../public/fullcalendar-3.4.0/fullcalendar.js"></script> --}}
    {{-- <script type="text/javascript" src="../public/fullcalendar-3.4.0/lib/jquery-ui.min/js"></script>--}}
{{--
    <link href='../public/x_full_calendar/fullcalendar.css' rel='stylesheet' />
    <link href='../public/x_full_calendar/fullcalendar.print.css' rel='stylesheet' media='print' />

    <script src='../public/x_full_calendar/jquery/jquery-1.10.2.js'></script>
    <script src='../public/x_full_calendar/jquery/jquery-ui.custom.min.js'></script>

    <script src='../public/x_full_calendar/fullcalendar.js'></script>
--}}
    <link  href  = "{{asset('fullcalendar-3.4.0/fullcalendar.min.css')}}" rel='stylesheet' />
    <link  href  = "{{asset('fullcalendar-3.4.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
    <script src  = "{{asset('fullcalendar-3.4.0/lib/moment.min.js')}}"></script>
    <script src  = "{{asset('fullcalendar-3.4.0/lib/jquery.min.js')}}"></script>
    <script src  = "{{asset('fullcalendar-3.4.0/fullcalendar.min.js')}}"></script>
    <script type = "text/javascript">
    //* * * * * * * * * * * * * * * * *  캘린더 자바스크립트 * * * * * * * * * * * * * * * * *
      $(document).ready(function() {

    		$('#calendar').fullCalendar({
    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right: 'agendaDay'
    			},
    			defaultDate: '2017-01-12', //이걸 이용하여 날짜 시작일을 설정?
    			navLinks: true, // can click day/week names to navigate views
    			selectable: true,
    			selectHelper: true,
          firstDay: 1,      // 1 == 월요일 시작 0 == 일요일 시작
    			select: function(start, end) {
    				var title = prompt('입력 하라...');
    				var eventData;
    				if (title) {
    					eventData = {
    						title: title,
    						start: start,
    						end: end
    					};
              // stick? = true
    					$('#calendar').fullCalendar('renderEvent', eventData, true);
    				}
    				$('#calendar').fullCalendar('unselect');
    			},
    			editable: true,
    			eventLimit: true, // allow "more" link when too many events
    			// events: [
    			// 	{
    			// 		title: 'All Day Event',
    			// 		start: '2017-05-01'
    			// 	},
    			// 	{
    			// 		title: 'Long Event',
    			// 		start: '2017-05-07',
    			// 		end: '2017-05-10'
    			// 	},
    			// 	{
    			// 		id: 999,
    			// 		title: 'Repeating Event',
    			// 		start: '2017-05-09T16:00:00'
    			// 	},
    			// 	{
    			// 		id: 999,
    			// 		title: 'Repeating Event',
    			// 		start: '2017-05-16T16:00:00'
    			// 	},
    			// 	{
    			// 		title: 'Conference',
    			// 		start: '2017-05-11',
    			// 		end: '2017-05-13'
    			// 	},
    			// 	{
    			// 		title: 'Meeting',
    			// 		start: '2017-05-12T10:30:00',
    			// 		end: '2017-05-12T12:30:00'
    			// 	},
    			// 	{
    			// 		title: 'Lunch',
    			// 		start: '2017-05-12T12:00:00'
    			// 	},
    			// 	{
    			// 		title: 'Meeting',
    			// 		start: '2017-05-12T14:30:00'
    			// 	},
    			// 	{
    			// 		title: 'Happy Hour',
    			// 		start: '2017-05-12T17:30:00'
    			// 	},
    			// 	{
    			// 		title: 'Dinner',
    			// 		start: '2017-05-12T20:00:00'
    			// 	},
    			// 	{
    			// 		title: 'Birthday Party',
    			// 		start: '2017-05-13T07:00:00'
    			// 	},
    			// 	{
    			// 		title: 'Click for Google',
    			// 		url: 'http://google.com/',
    			// 		start: '2017-05-28'
    			// 	}
    			// ]
          eventSources: [{
            url: 'http://Code/8SERVER/public/get',
          url: './get-events_dnweb.blade.php',
          dataType: 'json',
          async: false,
          type: 'POST',
          data: {
              flg: 1
          },
            error: function () {
              alert("으아니 챠! 왜 안되는거야.");
            }
          }]
    		});
    	});

    </script>

    <script>
    //* * * * * * * * * * * * * * * * *  구글 맵스 API  * * * * * * * * * * * * * * * * *
    // $('#myTab day').click(function (e) {
    //   e.preventDefault()
    //   $(this).tab('show')
    // });
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
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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
          var tmpcenter = map.getCenter();
          // document.getElementById("LntLng").append(tmpcenter+"<br>");
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
            //아이콘 선택
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

       //test
       var tmpcenter = map.getCenter();
       // 위도 경도 뜨는 위치 확인용
      //  document.getElementById("LntLng").append(tmpcenter);

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

    <style media="screen">
      .panel-heading{
        height: 55px;
      }
      /*.panel-body{
        min-height: 300px;
      }*/
      .scrollspy {
        position: relative;
        height: 200px;
        overflow: auto;
      }
      .body {
        position: relative;
      }

    </style>

<div class="bluedecobar">
</div>
<div class="bluebg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            선택 내용
          </div><!-- /.panel-heading -->
            <div class="panel-body">
              <div class="faq-content">
                <table class="table table-bordered table-striped" id="group1_work1">
                  <tbody>
                    <tr>
                      <td class='info bold'> 체험학습 제목 </td> <td class="text-center"  colspan="5">{{$plan_title}} </td>
                    </tr>
                    <tr>
                      <td class='info bold'> 체험학습 실시일 </td> <td class="text-center">{{$plan_date}} </td>
                      <td class='info bold'> 담당교사 이름 </td> <td class="text-center">{{$teacher_name}}</td>
                      <td class='info bold'> 체험학습 구분  </td> <td class="text-center">{{$trip_kind_value}} </td>
                    </tr>
                    <tr>
                      <td class='info bold'> 참여 학급수 </td> <td class="text-center">{{$attend_class_count}} </td>
                      <td class='info bold'> 참여 학생수  </td> <td class="text-center">{{$attend_student_coutn}} </td>
                      <td class='info bold'> 미참여 학생수 </td> <td class="text-center">{{$unattend_student_count}} </td>
                    </tr>
                    <tr>
                      <td class='info bold'> 선택 내용 </td>
                      <td class="text-center"  colspan="5">
                        @foreach ($transpotation as $value)
                        {{ "배열 들어갈 꺼임" }}
                        @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
           </div><!-- /.panel-body -->
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-default collapsed">
              <div class="panel-heading">
                맵 들어가는 곳
              </div>
              <div class="panel-body">
                <div id="map" style="min-height:500px;"></div>
              </div>
              <!-- /.panel-body -->
          </div><!-- /.panel -->
        </div>
        <div class="col-lg-4" id="show">
          <div class="panel panel-default">
            <div class="panel-heading">
              검색 넣을 곳
              <div class="pull-right">
                오른쪽 정렬
              </div>
            </div><!-- /.panel-heading -->
            <div class="panel-body">
              <div class="input-group">
                <input id="pac-input" class="form-control input-lg" type="text" placeholder="지역명을 입력해 주세요">
                <span class="input-group-btn">
                  <button class="btn btn-lg btn-default" type="button">검색</button>
                </span>
              </div>
              <br>
                <div class="panel panel-default">
                  <div class="panel-body" >
                    <blockquote >
                      <p id="draggable">불국사</p>
                      <footer>아치형 멋진다리 텟트스세ㅔㅌ르테서ㅏㄴㅁㅇ라ㅓㄴㅁ어ㅣㅏ</footer>
                    </blockquote>
                  </div>
                </div>
                <table class="table table-bordered table-striped">
                  <thead>
                    <th>작성한 학교</th>
                    <th>작성자</th>
                  </thead>
                  <tbody>
                    @for ($t=0; $t <5 ; $t++)
                      <tr>
                        <td>헬조선 초등학교</td>
                        <td>김개똥</td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
                {{-- 페이지 네이션 --}}
                <nav class="page text-center">
                  <ul class="pagination">
                    <li>
                      <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                      <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div><!-- /.panel-body -->
          </div><!-- /.panel -->
        </div> <!-- /.col-lg-4 -->
        <div class="col-sm-8">
          <div class="panel panel-default">
          <div id="calendar"></div>
          </div><!-- /.panel-footer -->
          <div class="col-sm-4">
            <p><a href="{{----}}" class="btn btn-lg btn-warning btn-block">관심목록</a></p>
          </div>
          <div class="col-sm-8">
            <p><a href="{{----}}" class="btn btn-lg btn-warning btn-block">저장</a></p>
          </div>
        </div>
      </div><!-- /.col-lg-4 -->
    </div>
  </div>
@endsection
