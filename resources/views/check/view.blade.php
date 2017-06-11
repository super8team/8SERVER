@extends('master')

@section('title','체크리스트 뷰')

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
             <a role="button" href="javascript:history.back()" aria-label="Right Align"
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
                <th>구분</th>
                <th>점검항목</th>
                <th style="min-width:50px;">확인</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="5">안전관리</td>
                <td>1 안전을 확보하기 위한 비상 상황 시 대처 방안을 확보하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td>2 비상 연락망, 비상 상황 대처 방안, 비상조치 매뉴얼 등의 관리 운영 기준을 마련하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td>3 각종 안전사고에 대비한 응급체계(비상조치 시스템, 비상 연락망 등)에 대해 서비스 종사자가 숙지할 수 있도록 하였는가? (교육여부)</td>
                <td></td>
              </tr>
              <tr>
                <td>4 수학여행 서비스를 제공하는 과정에서 사고 발생에 대비하여 신속한 대피가 가능하도록 관련 법규의 규정에 따라 여행지 시설의 안전을 확보하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td>5 운송 수단과 숙박 시설의 안전과 관련된 점검, 검사, 측정 등의 내용을 문서로 기록 및 보관하고 있는가?</td>
                <td></td>
              </tr>
              <tr>
                <td rowspan="4">긴급사태발생 시 대응 방안</td>
                <td>1 차량이동 중 일반사고 및 안전사고 발생 시 대처방안을 마련하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td>2 식중독ㆍ도난 및 분실물 발생 시 대처방안을 마련하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td>3 숙박시설 등의 각종 시설물 내 안전사고 및 화재 등에 대한 대처방안을 마련하였는가? </td>
                <td></td>
              </tr>
              <tr>
                <td>4 그 외의 발생 가능한 긴급사태에 대한 대응방안을 마련하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td rowspan="2">출발지 관광버스 탑승 업무</td>
                <td>1 관광버스에 수학여행 차량 안내 표지 및 해당계약건별 운행기록증을 부착하였는가?</td>
                <td></td>
              </tr>
              <tr>
                <td>2 전체 좌석의 안전띠가 정상적으로 조작 가능한지 확인하였는가?</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
