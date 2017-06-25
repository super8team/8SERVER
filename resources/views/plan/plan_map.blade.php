@extends('master')

@section('title','테스트22 ')

@section('content')
@php
  // $plan_date = "2017-06-20";
  // $plan_title = "플랜타이틀";
  // $teacher_name = '개나리';
  // $trip_kind_value = '종말여행';
  // $unattend_student_count ='1';
  // $attend_class_count='1';
  // $attend_student_count='1';
  // $transpotation ='수국';
  // $search_list_count =1;
  // $plan_no = 9;
  // $test_count =2;
  // $j=0; 
@endphp
  <!DOCTYPE html>
<html>
  <link  href  = "{{asset('fullcalendar-3.4.0/fullcalendar.min.css')}}" rel='stylesheet' />
  <link  href  = "{{asset('fullcalendar-3.4.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
  <script src  = "{{asset('fullcalendar-3.4.0/lib/moment.min.js')}}"></script>
  {{-- <script src  = "{{asset('fullcalendar-3.4.0/lib/jquery.min.js')}}"></script> --}}
  <script src  = "{{asset('fullcalendar-3.4.0/fullcalendar.min.js')}}"></script>
  <script src  = "{{asset('fullcalendar-3.4.0/locale-all.js')}}"></script>
  
  <script type = "text/javascript">
  
  var share_plan = new Array();
  //* * * * * * * * * * * * * * * * *  캘린더 자바스크립트 * * * * * * * * * * * * * * * * *
    $(document).ready(function() {
    var tmp_date = '{{$plan_date}}';

    
      
    // 3. 버튼 클릭 -> 클릭한 버튼으로 모달 실행 -> 
    $(document).on('click','.modal_btn',function(){
        // 클릭한 버튼 의 id 가저오기
        var id = $(this).attr('id');
        console.log('클릭한 버튼 id :'+id);
        //데이터 가저오기
        // 검색하면 자동으로 값이 정의 됨share_plan[id][]
        
        // 미리 생성된 캘린더 있는 경우를 대비해 비워줌
        $("#view_calendar_place").empty();
        $("#modal_info").empty();
        // 캘린더 생성
        $("#view_calendar_place").append(
          "<div id='view_calendar'></div>"
        );
        //값 변경
        console.log('객체 출력결1 ');    
        console.log(share_plan); 
        $("#modal_info").append(
          "<tr>"+
            "<td >"+share_plan[id]['school_name']+"</td>"+
            "<td>"+share_plan[id]['plan_teacher']+"</td>"+
          "</tr>"+
          "<tr>"+
            "<td colspan='2' >팁!</td>"+
          "</tr>"+
          "<tr>"+
            "<td colspan='2' >"+share_plan[id]['plan_tip']+"</td>"+
          "</tr>"
        );
        $("#view_calendar").fullCalendar({
          locale: 'ko',
          header: {
            left: 'prev,next',
            center: 'title',
            right: 'agendaDay'
          },
          defaultView: 'agendaDay',
          defaultDate: day(),{{--$search_plan_date--}} //이걸 이용하여 날짜 시작일을 설정?
          navLinks: true, // can click day/week names to navigate views
          selectable: false,
          selectHelper: true,
          firstDay: 1,      // 1 == 월요일 시작 0 == 일요일 시작
          
          events: {
                    url: '{{route('map.getTimeTable')}}',
                    type:'POST',
                    dataType: 'json',
                    data:{
                      plan_no :share_plan[id]['plan_no']
                    }
                },
        });
        function day(){
          if(share_plan[id]['plan_date'] != null){
            console.log('success');
            
            console.log(share_plan[id]['plan_date']);
            return share_plan[id]['plan_date'];
          }else{
            console.log('error!');
            return '2017-05-22';
          }
        }
        //
          $('#result_modal').modal('show');
          
          window.setTimeout(clickNextPrev, 200);
          $("#view_calendar").fullCalendar('render');
    });
    
    // 4.클릭한 버튼으로 작동할 위치 선택하여 데이터 받아옴
  
    
  		$('#calendar').fullCalendar({
        locale: 'ko',
  			header: {
  				left: 'prev,next today',
  				center: 'title',
  				right: 'month,agendaWeek,agendaDay,listWeek'
  			},
        defaultView: 'agendaDay',
  			defaultDate: '{{$plan_date}}', //이걸 이용하여 날짜 시작일을 설정?
  			navLinks: true, // can click day/week names to navigate views
  			selectable: true,
  			selectHelper: true,
        firstDay: 1,      // 1 == 월요일 시작 0 == 일요일 시작
  			select: inputscheduel,
        
  			editable: true,
  			eventLimit: true, // allow "more" link when too many events
        // * * * * * * * * 데이터 불러오기 * * * * * * * *
        // 방법 1 json data 가저오기
        eventSources: [{
        url: '{{route('map.getTimeTable')}}',
        // url: '{{--route('map.getTimeTable',$test_no)--}}',
        dataType: 'json',
        async: false,
        type: 'POST',
        data:{
          plan_no : {{$plan_no}}
        },
            error: function () {
              console.log("data load is fail.")
            }
        }],
        // events: {
        //           url: '{{--route('map.getTimeTable')--}}',
        //           type:'POST',
        //           dataType: 'json',
        //       },
  		});
      //캘린더에서 작동하는 부분
      function inputscheduel(start, end) {
        var title = prompt('일정 내용을 입력해주세요.');
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
      }
      
      //버튼 클릭시 동작하는버튼
      $(document).on("click","#addscheduel",function(){
        var title = $("#addscheduel").prev().text();
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: tmp_date
          };
          // stick? = true
          $('#calendar').fullCalendar('renderEvent', eventData, true);
          }
        $('#calendar').fullCalendar('unselect');
      });
      // 현제 보고 있는 날짜의 정보를 가져옴
      // 왼쪽(이전) 버튼을 클릭하였을 경우 
    jQuery("button.fc-prev-button").click(function() {
        var date = jQuery("#calendar").fullCalendar("getDate");
        convertDate(date);
    });

    // 오른쪽(다음) 버튼을 클릭하였을 경우
    jQuery("button.fc-next-button").click(function() {
        var date = jQuery("#calendar").fullCalendar("getDate");
        convertDate(date);
    });


    // 받은 날짜값을 date 형태로 형변환 .
    function convertDate(date) {
        var date = new Date(date);
        tmp_date = date.yyyymmdd();
    }

    // 받은 날짜값을 YYYY-MM-DD 형태로 출력하기위해 바꿔준다
    Date.prototype.yyyymmdd = function() {
      var yyyy = this.getFullYear().toString();
      var mm = (this.getMonth() + 1).toString();
      var dd = this.getDate().toString();
      return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
  }
  //캘린더 로드를 위한 꼼수
  function clickNextPrev() {
    $('.fc-next-button').click();
    $('.fc-prev-button').click();
  }
    $(document).on("click","#addsave",function(){
      $('#calendar').fullCalendar('updateEvents', event);
      var clientEvents = new Object();
      var clientEvents = $('#calendar').fullCalendar('clientEvents');

      console.log(clientEvents.length);
      //이벤트 겠수 만큼 돌아서 데이터를 뽑아냄
      for (var i = 0; i < clientEvents.length; i++) {
        var title = clientEvents[i]['title'];
        $('#saveZone').append("<input type='hidden' name='saveEvent["+i+"][title]' value='"+title+"'>");
          if(clientEvents[i]['start']['_i'] != null){
              start = clientEvents[i]['start']['_i'];
              $('#saveZone').append("<input type='hidden' name='saveEvent["+i+"][start]' value='"+start+"'>");
        }
          if(clientEvents[i]['end'] != null){  
              end = clientEvents[i]['start']['_i'];
              $('#saveZone').append("<input type='hidden' name='saveEvent["+i+"][end]' value='"+end+"'>");
        }
      }
      document.plan_map_write.action = "{{route('map.store')}}";
      document.plan_map_write.submit();
      
    
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
          var searchInput = $("input[name=map_search_box]").val();
          if(searchInput){
                $.ajax({
                url: 'http://ko.wikipedia.org/w/api.php',
                data: { 
                        action: 'query', 
                        list: 'search',
                        srsearch:searchInput , 
                        format: 'json' 
                      },
                dataType: 'jsonp',
                success: function processResult(apiResult){
                  $('#display-result').empty();
                  result_search
                 // 검색 결과 목록을 모두 부를 경우
                 //  for (var i = 0; i < apiResult.query.search.length; i++){
                 //     $('#display-result').append('<p>'+apiResult.query.search[i].title+'</p>');
                 //   }
                 var title = apiResult.query.search[0].title;
                 //일정을 추가할 버튼 생성
                 $('#display-result').append('<p">'+title+'</p>')
                  .append("<a id='addscheduel' class='btn btn-sm btn-warning btn-block'>일정에 추가</a>")
              }  //위키피디아 
            });
            $.ajax({
            url: '{{route('map.search')}}',
            type:'POST',
            data:{
              niddle:searchInput
            },
            dataType: 'json',
             success: function processResult(arg_share_plan){
               share_plan = arg_share_plan;
               console.log('객체 출력결과1 ');    
               console.log(share_plan);        
               $('#result_search').empty();    
                 for (var i = 0; i <share_plan.length ; i++) {
                   $('#result_search').append(
                     "<tr><td>"+share_plan[i]['school_name']+"</td><td>"+  share_plan[i]['plan_teacher']+"</td>"+
                     "<td><button type='button' class='btn btn-sm btn-default modal_btn' data-toggle='modal' id='"+i+"'>보기</button></td></tr>"
                   );
                 }
                  
             },
             error: function error (e) {
               console.log(e);
            
             }
           });
           // 검색정보 + 검색된 결과 겟수  
           
         }
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
     //****************** 위키피디아에서 받아오는 정보 표시******************
     
    // function infoResult(argSearchInput){
    //    SearchInput = argSearchInput;
    //    var url="http://ko.wikipedia.org/w/api.php?action=parse&format=json&page=" + searchInput+"&redirects&prop=text&callback=?";
    //   $.getJSON(url,function(data){
    //     wikiHTML = data.parse.text['*'];
    //     $wikiDOM = $("<document>"+wikiHTML+"</document>");
    //     $("#display-result").append($wikiDOM.find('.infobox .mw-parser-output').html());
    //   });
    // }

     //****************** 폴리 라인에 사용되는 함수  ******************
     function addLatLng(event) {
       path = poly.getPath();

       //클릭한 위치의 위도 경도 정보 받아오기 
       //  var tmpcenter = map.getCenter();
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
    {{-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAioq4xWVTdiZlwL-jWehKgSKHhPJCBcHI&libraries=places&callback=initMap">
    </script> --}}

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
<div id="madal_palce">
  {{-- 모달 --}}
  <div class="modal modal fade " id="result_modal" tabindex="-1" role="dialog" aria-labelledby="result_modal_label" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="result_modal_label">공유 정보</h4>
         </div>
         <div class="modal-body">
           <table class="table table-bordered table-striped">
             <thead>
               <th>작성한 학교</th>
               <th>작성자</th> 
               
             </thead>
             <tbody id="modal_info">
               <tr>
                 <td id="school">학교</td>
                 <td id="writer">작성자</td>
               </tr>
               <tr>
                 <td colspan="2" id="tip">흐미 불국사 지리구요</td>
               </tr>
             </tbody>
           </table>
           <div id="view_calendar_place">
             <div id="view_calendar">
               
             </div>
           </div>
         </div>
         <div class="modal-footer">
           
           <form class="form" action="" method="post">
             <button type="submitbtn" class="btn btn-default">계획 가저오기</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
           </form>
         </div>
       </div>
     </div>
   </div>
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
                      <td class='info bold'> 참여 학생수  </td> <td class="text-center">{{$attend_student_count}} </td>
                      <td class='info bold'> 미참여 학생수 </td> <td class="text-center">{{$unattend_student_count}} </td>
                    </tr>
                    <tr>
                      <td class='info bold'> 선택 내용 </td>
                      <td class="text-center"  colspan="5">
                        배열로 넣다
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
          </div>
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
                <input id="pac-input" class="form-control input-lg" name='map_search_box' type="text" placeholder="지역명을 입력해 주세요">
                <span class="input-group-btn">
                  <button class="btn btn-lg btn-default" type="button">검색</button>
                </span>
              </div>
              <br>
                <div class="panel panel-default">
                  <div class="panel-body" >
                    <blockquote id="display-result" >
                      {{-- <p>불국사</p>
                      <a id='addscheduel' class='btn btn-sm btn-warning btn-block'>일정에 추가</a> --}}
                    </blockquote>
                  </div>
                </div>
                <table  class="table table-bordered table-striped">
                  <thead>
                    <th>작성한 학교</th>
                    <th>작성자</th>
                    <th>링크 버튼</th>
                  </thead>
                  <tbody id="result_search">
                  
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
                <div id="script-warning">
                  
                </div>
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
            <p><a id="addsave" class="btn btn-lg btn-warning btn-block">저장</a></p>
            <p><a id="addsavetest" class="btn btn-lg btn-warning btn-block">저장 테스트</a></p>
              <form class="form" name="plan_map_write" method="post" >
                {{ csrf_field() }}
                <input type="hidden" name="plan_no" value="{{$plan_no}}">
                <div id ="saveZone">
                </div>
              </form>
          </div>
        </div>
      </div><!-- /.col-lg-4 -->
    </div>
  </div>
@endsection
