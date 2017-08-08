@extends('master')

@section('title','위원회 결과')

@section('content')

    {{-- <script type="text/javascript">
      $("tr").children().first().addClass(".text-center");
    </script> --}}
    <div class="bluedecobar"></div>
    <div class="bluebg">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">설문 결과
                        <a role="button" href="{{route('staff', 10)}}" aria-label="Right Align"
                           class="btn btn-sm btn-default ">
                            {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
                            뒤로 돌아가기
                        </a>
                    </h3>
                </div>
                <div class="panel-body" style="min-height:500px;">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>대분류</th>
                            <th>소분류</th>
                            <th>점검항목</th>
                            <th style="min-width:50px;">확인</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="5">안전관리</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 안전을 확보하기 위한 비상 상황 시 대처 방안을 확보하였는가?</td>
                            <td></td>
                            {{--<td>{{$respond_true}}</td>--}}
                            {{--<td>{{$respond_false}}</td>--}}
                        </tr>
                        <tr>
                            <td>2&nbsp 비상 연락망, 비상 상황 대처 방안, 비상조치 매뉴얼 등의 관리 운영 기준을 마련하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 각종 안전사고에 대비한 응급체계(비상조치 시스템, 비상 연락망 등)에 대해 서비스 종사자가 숙지할 수 있도록 하였는가? (교육여부)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 수학여행 서비스를 제공하는 과정에서 사고 발생에 대비하여 신속한 대피가 가능하도록 관련 법규의 규정에 따라 여행지 시설의 안전을 확보하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 운송 수단과 숙박 시설의 안전과 관련된 점검, 검사, 측정 등의 내용을 문서로 기록 및 보관하고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="4">긴급사태발생 시<br/>대응 방안</td>
                            <td rowspan="4"></td>
                            <td>1&nbsp 차량이동 중 일반사고 및 안전사고 발생 시 대처방안을 마련하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 식중독ㆍ도난 및 분실물 발생 시 대처방안을 마련하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 숙박시설 등의 각종 시설물 내 안전사고 및 화재 등에 대한 대처방안을 마련하였는가? </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 그 외의 발생 가능한 긴급사태에 대한 대응방안을 마련하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">출발지 관광버스 <br/>탑승업무</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 관광버스에 수학여행 차량 안내 표지 및 해당계약건별 운행기록증을 부착하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 전체 좌석의 안전띠가 정상적으로 조작 가능한지 확인하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 차량에서 기름 냄새나 불쾌한 냄새가 나지 않는지 확인하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 안전을 고려하여 안전띠 착용 등 버스 내 안전 수칙을 설명하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 전원 탑승 여부를 확인하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="4">여행지이동업무</td>
                            <td rowspan="4"></td>
                            <td>1&nbsp 운행 중 좌석을 이탈하지 않도록 안내 하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 운행 중 음주가무를 하지 않도록 안내 하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 여행 휴게소 정차에 대하여 공지하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 안전을 위하여 운전자가 반드시 규정된 운행속도를 준수하도록 안내 하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">역ㆍ여객선 터미널ㆍ공항 도착 전 업무</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 여행업자의 로고나 업체명이 표기된 식별이 가능한 크기의 안내판을 이용하여 쉽게 여행업자를 식별할 수 있도록 하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 운송편, 탑승 시간, 탑승구, 출발 시간, 소요 시간 등 필요한 정보를 안내하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 객실 배정표를 이용하여 출발 인원을 확인하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 탑승권 발급 후 탑승구와 탑승 시간을 설명하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 탑승구로 안내하여 전원 탑승 여부를 확인하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">건물</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 학생 단체를 받을 수 있는 규모인가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 학생 단체 활동을 할 수 있는 시설을 갖추고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 식당의 규모나 위치가 학생이 사용하기에 적절한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 숙소 주위가 위험에 노출되어 있지는 않은가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 학생들에게 방송 등 안내할 수 있는 시설을 갖추고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">내부시설</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 학생들을 여러 개의 층으로 분산 배치 가능한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 학생들이 안전한 휴식을 위하여 방별 적정 인원을 배정하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 시설물들은 안전한가?(가구, 유리 창문, 세면대 등)'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 외부의 소음이 차단되는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 학생 안전을 위한 숙소의 문단속 장치가 제대로 작동되는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="6">안전</td>
                            <td rowspan="6"></td>
                            <td>1&nbsp 학교에서 소방서에 숙박시설 화재점검을 요청하였는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 학생들의 이동 통로나 비상구는 확보되어 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 유리 창문의 안전 잠금장치가 작동하고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 계단이나 난간에 미끄럼방지 테이프나 안전장치가 되어 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 방 사이의 베란다가 학생들이 넘어 다닐 정도로 설계 되어 위험하지는 않은가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 화재 위험시설의 통제(전기레인지, 가스레인지, 취사도구 등)가 가능한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">생활지도</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 숙소 내 또는 인근에 청소년 유해업소가 있지는 않은가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 방안에 TV가 있는 경우 청소년 유해프로그램을 통제할 수 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 화일반객실과 학생의 구분 통제가 가능한가?(층별 통제 가능 여부)?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 일정 종료 후 학생 및 외부인의 출입을 파악할 시설이 갖추어졌는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 숙소 내 편의시설의 사용 시간을 통제할 수 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">위생</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 식당의 위생상태가 청결한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 방안 침구의 보관 및 위생 상태는 청결한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 욕실이나 공동세면장의 청소 상태는 깨끗한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 장실의 청결 상태 및 환기 시설은 정상적인가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 식수대 및 물 위생 상태는 양호한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">식당</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 학생 단체를 받을 수 있는 규모와 경험을 가지고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 식단 구성이 학생들의 선호에 적합한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 조리실의 청결 상태가 양호한가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 조리사들은 위생복과 위생모를 착용하고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 식당은 이동시간을 최적화 할 수 있는 곳에 위치해 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="5">일정 및 코스</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 학생의 발달 단계에 맞는 일정인가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 코스 선정이 교육과정과 연계해 교육적 효과가 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 안전교육 등 자체 교육활동을 계획하고 있는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 이동 동선을 고려해 효율적인 코스 선정이 이루어졌는가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 쇼핑이나 오락시설 등에 학생들이 방치되어 있지는 않은가?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="6">차량</td>
                            <td rowspan="6">차량 상태 점검</td>
                            <td>1&nbsp 모든 좌석의 안전벨트는 정상 작동합니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 개문 가능한 창문위치를 확인하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 소화기 비치 여부 및 위치를 확인하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 비상탈출용 망치(형광용) 비치 여부 및 위치를 확인하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 차량 내부는 청결하며 악취가 나지 않습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 학생 탑승 차량 표지(앞, 뒤)가 제대로 부착되어 있습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="9">운전자</td>
                            <td rowspan="7">교통 법규 준수</td>
                            <td>1&nbsp 운전자 음주감지를 실시하였습니까?(경찰 협조)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 안전거리, 제한속도, 신호, 정지선을 준수하고 있습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 차량은 운행 중 중앙선 침범을 하지 않습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 차로를 준수하며 실선 구간에서 추월하지 않습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 운전 중 휴대전화나 내비게이션 조작을 하지 않습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 차량에 정해진 정원을 초과하지 않았습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7&nbsp 대열운행(2대 이상)을 하고 있지 않습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="2">운전자 미팅</td>
                            <td>8&nbsp 운행 일정을 협의하였습니까?(경유지, 목적지, 휴게소 등)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9&nbsp 운행일정은 과도하지 않습니까?(적절한 휴식 보장)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="6">운전자</td>
                            <td rowspan="4">안전교육 비상대처</td>
                            <td>1&nbsp 안전벨트 착용을 교육하고 착용 상태를 확인하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 운행 중 이동금지 및 비상시 대처요령 교육(대피 순서 등)을 하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 차량 화재 시 소화기 사용 교육을 하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 위급 상황 시 비상 망치 사용 교육을 하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="2">휴게소 안전</td>
                            <td>5&nbsp 휴게소에서 지켜야할 안전교육을 실시하였습니까?(보행로 준수, 이동 및 후진 차량 주의, 휴게소 내 뛰지말 것)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 휴게소 출발 시간을 알려주었습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="2">연락망</td>
                            <td rowspan="2">비상 연락망 구축</td>
                            <td>1&nbsp 차량 운전자와 인솔책임자 연락처를 메모하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 학생 및 학부모 비상 연락망을 갖고 있습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="3">기타</td>
                            <td rowspan="3">기타</td>
                            <td>1&nbsp 구급낭을 준비하고 약품 사용 설명서를 확인하였습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 멀미하는 학생을 위한 위생 봉투는 준비되었습니까?</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 보호 필요 학생 명단을 확인하였습니까?(상비약, 자리 배치)</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">댓글--}}
                    {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body" style="min-height:300px;">--}}
                    {{--<div class="row">--}}
                    {{--<table class="table table-bordered col-lg-1">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>번호</th>--}}
                            {{--<th>내용</th>--}}
                            {{--<th>작성자</th>--}}
                            {{--<th style="min-width:50px;">작성날짜</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>1</td>--}}
                            {{--<td>아이들 교육을 위해서라면 꼭 가봐야 할 장소 같네요!!</td>--}}
                            {{--<td>박성원</td>--}}
                            {{--<td>2017/00/00</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>2</td>--}}
                            {{--<td>좋네요..</td>--}}
                            {{--<td>권유성</td>--}}
                            {{--<td>2017/00/00</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>3</td>--}}
                            {{--<td>아~ 두말할 필요도 없죠~!</td>--}}
                            {{--<td>정연제</td>--}}
                            {{--<td>2017/00/00</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
                    {{--<form class="form" action="" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-offset-2 col-md-8">--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" class="form-control" placeholder="내용을 입력 하세요.">--}}
                                    {{--<span class="input-group-btn">--}}
                                     {{--<button class="btn btn-default" type="button">확인</button>--}}
                                 {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection

