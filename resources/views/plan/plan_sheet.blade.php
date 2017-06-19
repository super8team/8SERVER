@extends('master')

@section('title','모체')

@section('content')

	@section('thead')
		<thead>
			<th width='5%' class='text-center'>확인</th>
			<th width='25%' class='text-center'>업무이름</th>
			<th width='25%' class='text-center'>관련파일</th>
			<th width='45%' class='text-center'>업무지침</th>
		</thead>
	@endsection
@php
{{--	//임시 변수
	$plan_title 						= "야비군";
	$plan_date							= "2017/05/23";
	$teacher_name 					= "원사님";
	$trip_kind_value 				= "각개전투";
	$attend_class_count 		= "1";
	$attend_student_count		= "41";
	$unattend_student_count	= "1";
	$transpotation[] 					= ["버스","비행기"]; --}}
@endphp

	<div class="bluebg">
	<!-- /PAGE HEADER -->
		<section >
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading  text-center">
						<h3 class="panel-title" style="display: inline-block;">체험학습 업무 내용</h3>
						<span class="clearfix"></span>
					</div>
					<div class="panel-body">
						{{-- <form class="forms-wrapper hidden" action="route(' ???? ')" method="post" id="check_form">
							<input type="text" class="hidden" value="" name="schoolplan_no" id="schooltrip_plan_id">
						</form> --}}
						<form class="forms-wrapper" action="{{route('plan.teacher')}}" method="post">
							<div class="row form-group" >
								<input type="text" class="hidden" value="NEW" name="WROKMODE_NAME" id="WORKMODE_ID">
								<div class="btn-group pull-right">
									<button type="button"  class="btn btn-info btn-sm margin-right-20" id="btn_re_create_plan"><span class="fa fa-download"> 다시 계획하기 </button>
									<button type="button" class="btn btn-warning btn-sm margin-right-20" id="btn_download_file"><span class="fa fa-download"> 첨부파일 일괄다운로드 </button>
									<button type="butotn" class="btn btn-danger btn-sm margin-right-20" id="btn_submit"
										disabled > <span class="fa fa-save"> 계획 저장하기 </button>
								</div>
							</div>

							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading" id="heading-0">
										<a role="button" class="nounderline"  data-toggle="collapse"   href="#collapse-0">
											<h5 class="panel-title text-center">
												<< 체험학습 선택 사항 요약 >>
											</h5>
										</a>
									</div>
									<div id="collapse-0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-0">
										<div class="panel-body">
											<div class="faq-content">
												<table class="table table-bordered table-striped" id="group1_work1">
													<tbody>
														<tr>
															<td class='info bold'> 체험학습 제목 </td> <td class="text-center"  colspan="5">{{$plan_title}} </td>

														</tr>
														<tr>
															<td class='info bold'> 체험학습 실시일 </td> <td class="text-center">{{$plan_date}} </td>

															{{-- <td class='info bold'> 담당교사 이름 </td> <td class="text-center">{{$teacher_name}}</td> --}}

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
																@foreach ($transpotation as $value)
																{{ "배열 들어갈 꺼임" }}
																@endforeach
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading dark-3" role="tab" id="heading-0">
										<a role="button" class="nounderline"  data-toggle="collapse" data-parent="#faqlist" href="#collapse-0" aria-expanded="true" aria-controls="collapse-0">
											<h5 class="panel-title text-orange text-center">
												<< 체험학습 업무 사항 요약 >>
											</h5>
										</a>
									</div>
									<div id="collapse-0" class="toggle toggle-transparent toggle-bordered-full active" role="tabpanel" aria-labelledby="heading-0">
										<div class="panel-body">
											<div class="faq-content">
												<table class="table table-bordered table-striped" id="group1_work1">
													<tbody>
													<tr>
														<td class='info bold'> 진행업무개수 </td> <td class="text-center">59 개 (선택사항 1 개 포함 )  </td>
														<td class='info bold'> 진행 규모 </td> <td class="text-center">소규모 - 적정함 </td>
														<td class='info bold text-center'> 동의 비율 : 99.00 % </td>
													</tr>
													<tr>
														<td class='info bold'> 추천 인솔교사수 </td> <td class="text-center">4명 이상 </td>
														<td class='info bold'> 추천 안전요원수  </td> <td class="text-center"> 1명 이상 </td>
														<td class='info bold text-center'> <a data-toggle="modal" data-target="#view_myschool_helpfile" type="button" class="btn btn-sm btn-info" value="./explain/manual_doc_2_4.html">
																<span class="fa fa-file"> 도움말</a></td>
													</tr>
													<tr>
														<td class='info bold'> 교육청 컨설팅 유무 </td> <td class="text-center">필요없음 </td>
														<td class='info bold'> 시민 감사 표집 대상 </td> <td class="text-center">대상학교아님 </td>
														<td class='info bold text-center'> <a data-toggle="modal" data-target="#view_myschool_helpfile" type="button" class="btn btn-sm btn-info" value="./explain/manual_doc_2_4.html">
															<span class="fa fa-file"> 도움말</a></td>
													</tr>
													<tr>
														<td class='info bold'> 필수 준수 사항 </td> <td colspan="4" >인력확보 등을 고려하여 1명 이상 배치 권장함.</br>안전대책 수립후 자율실시 가능함</br></td>
													</tr>
													<tr>
														<td class='info bold'> 참고 사항 </td> <td colspan="4">단, 150명 미만의 경우 안전요원 배치가 어려울 때 그 사정을 밝히고 학교운영위원회 심의를 거쳐 제외 가능
														</br>
													</td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

{{-- *****************************  기본 계획 수립   ******************************** --}}

									<div class="panel panel-default">
										<div class="panel-heading" role="tab"
											 id="heading-1">
											<a role="button" class="nounderline" data-toggle="collapse"
											   href="#collapse-1">
												<h5 class="panel-title">
													<span
														class="label label-default">1</span> 기본계획수립	</h5>
											</a>
										</div>
										<div id="collapse-1"
											 class="panel-collapse collapse in"
											 aria-expanded="true">
											<div class="panel-body">
												<div class="faq-content">
													<label><span
															class="label label-warning">TIPS</span> 실시 시기,목적,방법(소규모/학년단위) 등 계획 수립</label>
													<table class="table table-bordered table-striped" id="group1_work1">

															@yield('thead')

														<tbody>
														<tr>
															<td class="text-center">
																<input type="checkbox" name="result_check[]" value="1">
															</td>
															<td class="text-center">체험학습 기본계획수립</td>

															<td>
																<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 실시 계획 기안문.hwp">(수학여행)현장체험학습 실시 계획 기안문</a>
																	</br>
																<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 실시 계획서 양식.hwp">수학여행 계획서 양식</a>
																	</br>
																<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 안심수학여행서비스신청서.hwp">안심수학여행서비스신청서</a>
																	</br>
																<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 청렴교육.hwp">청렴교육</a>
																	</br>
																<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 기본안전교육.hwp">기본안전교육</a>
																</br>
															</td>

															<td>
																<span class="glyphicon glyphicon-info-sign"></span>
																포함내용: 교육장소,차량이동,교육프로그램,상황별 안전교육,현장체험학습 관계자에 대한 청렴 교육 계획
																</br>
																<span class="glyphicon glyphicon-info-sign"></span>
																소규모,테마형 현장체험학습 추진 원칙 준수
																</br>
																<span class="glyphicon glyphicon-info-sign"></span>
																안심수학여행서비스는 수학여행개시 2개월전 신청서를 해당 지자체에 제출함.
																</br>
															</td>
														</tr>
													</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
{{-- *****************************  확인    ******************************** --}}
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading-2">
													<a role="button" class="nounderline" data-toggle="collapse"href="#collapse-2">
														<h5 class="panel-title">
															<span class="label label-default">2</span>
															학부모 동의 및 학생선호도 조사
														</h5>
													</a>
												</div>
												<div id="collapse-2" class="panel-collapse collapse" aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span class="label label-warning">TIPS</span>
																학부모 동의(의견)가 학생 의견으로 대체되지 않고 충분히 반영될 수 있는 방법으로 의견 수렴하여 민원이 발생하지 않도록 유의해야 함.</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr>
																	<td class="text-center">
																		<input type="checkbox" name="result_check[]" value="2">
																	</td>
																	<td class="text-center">체험학습 참가희망 조사 실시</td>
																	<td><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 체험학습 학부모 동의 및 학생 선호도 조사.hwp">체험학습 참가희망조사</a>
																	</br>
																</td>
																<td>
																	<span class="glyphicon glyphicon-info-sign"></span>미참가학생이 대상학생의 20(30)%초과시 계획변경
																</br>
																<span class="glyphicon glyphicon-info-sign"></span>
																안전요원수에 따라 금액차액 발생 명시
															</br>
														</td>
													</tr>
													<tr>
														<td class="text-center">
															<input type="checkbox" value="3"  name="result_check[]">
														</td>
														<td class="text-center">학생선호도 조사 실시
														</td>
														<td>
														</td>
														<td></td>

											</tr>
											<tr>
												<td class="text-center">
												<input type="checkbox" value="4" name="result_check[]">
											</td><td class="text-center">참가의견 조사결과 회신
											</td>
											<td><span class="glyphicon glyphicon-save-file"></span>
												<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 참가의견조사결과 알림.hwp">참가의견조사결과 알림
												</a>
												<br>
											</td>
											<td></td>

										</tr>
										<tr>
											<td class="text-center">
												<input type="checkbox" value="5"  name="result_check[]">
											</td>
											<td class="text-center">미참가 학생지도계획수립
											</td>
											<td>
												<span class="glyphicon glyphicon-save-file"></span>
												<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 미참가학생지도계획.hwp">
													미참가학생지도계획
												</a>
												<br>
											</td>
											<td>
												<span class="glyphicon glyphicon-info-sign"></span>
												미참가학생 대상 별도 교육과정 운영해야함
												<br>
												<span class="glyphicon glyphicon-info-sign"></span>
												미참가학생이 잔류학생 프로그램에 참여하였을 경우 출석으로 처리하고 자율활동(행사활동)영역에는 기록하지 않음
												<br>
											</td>
											</tr>
													</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
									<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-3">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-3">
														<h5 class="panel-title">
															<span
																class="label label-default">3</span> 현장체험학습 소위원회 운영	</h5>
													</a>
												</div>
												<div id="collapse-3"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 소규모 학교 경우 또는 학교장이「현장체험학습 소위원회」를 구성하지 않고도 소기의 목적 달성이																	가능하다고 판단되는 경우「학교운영위원회」로 대체 가능함.														</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>

																<tr><td class="text-center"><input type="checkbox" value="6"  name="result_check[]"></td>
																	<td class="text-center">소위원회 구성</td><td><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 활성화 위원회(소위원회) 구성 기안문.hwp">
																		소위원회 구성 기안문</a></br><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 활성화위원회(소위원회) 운영 계획서.hwp">소위원회운영 내부규정예시</a>
																	</br>
																	<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 활성화 위원회(소위원회) 회의록(예시).hwp">소위원회 회의록(예시)</a>
																</br>
															</td>
															<td>
																<span class="glyphicon glyphicon-info-sign"></span>
																소규모 학교(농촌기준:60명이하,도시기준:240명이하)의 경우 학교운영위원회로 대체 가능함.
															</br>
																<span class="glyphicon glyphicon-info-sign"></span>
																소위원회 구성시 위원은 위원장외 10인 이하로 구성하되, 학부모 비율이 50%이상되도록 구성
															</br>
														</td>
													</tbody>
												</table>
														</div>
													</div>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-4">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-4">
														<h5 class="panel-title">
															<span class="label label-default">4</span>
															 1차 현장답사
														</h5>
													</a>
												</div>
												<div id="collapse-4"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span class="label label-warning">TIPS</span>
																 무리한 일정 계획수립 삼가,학부모,교사,현장체험학습 소위원회 위원 등이 함께 참여하여 실시, 학교운영비로 사전답사 실시</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr>
																	<td class="text-center">
																		<input type="checkbox" value="7" id="chkwork_18" name="result_check[]">
																	</td>
																	<td class="text-center">
																		현장답사[계약 전] 계획 수립
																	</td>
																	<td>
																		<span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(계약 전) 기안문.hwp">현장답사 기안문</a>
																	</br>
																	<span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(계약 전) 계획서.hwp">수학여행 현장답사 계획서</a>
																</br>
																<span class="glyphicon glyphicon-save-file"></span>
																<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습(계약 전) KS표준 점검.hwp">현장체험학습 KS표준 점검</a>
															</br>
															<span class="glyphicon glyphicon-save-file"></span>
																<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습 현장답사(계약 전) 점검 체크리스트.hwp">현장체험학습 사전답사 점검</a>
															</br>
															<span class="glyphicon glyphicon-save-file"></span>
																<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 위원답사 불참 위임장(계약 전).hwp">위원답사 불참 위임장</a>
															</br>
															<span class="glyphicon glyphicon-save-file"></span>
															<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(계약 전) 출장복명서.hwp">출장복명서</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>
																사전 답사시 소위원회 위원 참가(미참가시 위임장 작성,보관)
															</br>
															<span class="glyphicon glyphicon-info-sign"></span>
															현장답사 1회 실시할 수 있는 경우(시,도교육청에서 운영하는 시설이용,MAS(다수공급자계약제도)를 통한 구매시, 지자체에서 제공하는 '안심수학여행 서비스' 등을 신청하여 회신받은 경우, 100명 미만 소규모 운영시, 최종계약일로부터 60일이내 실시하는 경우)
														</br>
														<span class="glyphicon glyphicon-info-sign"></span>
														사전답사 항목(실시경로,장소의 교육목적 부합여부,거리,소요시간,시설(식당포함)의 수용인원,시설의 위생상태,청소년 유해환경 인접여부, 위험지역, 교통사고 다발지역 등
													</br>
													<span class="glyphicon glyphicon-info-sign"></span>
													현장답사 무리한 일정 및 업체 위탁 지양
												</br>
												<span class="glyphicon glyphicon-info-sign"></span>
												현장답사 실시 전후 관련업체로 부터 금품 및 향응 요구 금지(할인 티켓,교사무료입장권,관리자 독실 등)
											</br>
										</td>
										<tr>

										<td class="text-center">
											<input type="checkbox" value="8" id="chkwork_21" name="result_check[]"></td>
											<td class="text-center">현장답사[계약 전] 결과 보고</td><td><span class="glyphicon glyphicon-save-file"></span>
												<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(계약 전) 결과 보고서.hwp">수학여행 현장답사 결과 보고서</a>
												<br>
												<span class="glyphicon glyphicon-save-file"></span>
												<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(계약 전) 결과표.hwp">수학여행 현장답사 결과표</a>
												<br>
											</td>
											<td></td>
											</tr>
											<tr>
												<td class="text-center">
													<input type="checkbox" value="9" id="chkwork_24" name="result_check[]"></td>
													<td class="text-center">전기,가스,위생 등 안전점검 확인 요청(숙박업소)</td>
													<td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 시설물 위생 및 안전점검 요청서 공문.hwp">
														시설물 위생 및 안전점검 요청서 공문</a>
														<br>
													</td>
													<td><span class="glyphicon glyphicon-info-sign"></span>최근 1년 이내에 실시한 확인서<br>
														<span class="glyphicon glyphicon-info-sign"></span>매년 동일한 식당,숙박지라도 사전답사는 실시해야함.<br></td>
													</tr><tr><td class="text-center"><input type="checkbox" value="10" id="chkwork_26" name="result_check[]"></td>
															<td class="text-center">화재점검 사전 요청(관할 소방서)</td><td><span class="glyphicon glyphicon-save-file"></span>
																<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 화재점검 사전 요청서 공문.hwp">화재점검 사전 요청서 공문</a>
																<br>
															</td>
															<td>
																<span class="glyphicon glyphicon-info-sign"></span>
																체험학습장소의 관할 소방서에 협조 요청 공문 발송
																<br>
															</td>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-5">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-5">
														<h5 class="panel-title">
															<span
																class="label label-default">5</span> 학교운영위원회 심의 및 학교장 결제</h5>
													</a>
												</div>
												<div id="collapse-5"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 운영위원회 심의 사항 존중</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr>
																	<td class="text-center">
																		<input type="checkbox" value="11" id="chkwork_28" name="result_check[]">
																	</td>
																	<td class="text-center">
																		운영위원회 의안 제안 및 심의
																	</td>
																	<td><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 운영위원회 의안 제안 기안문.hwp">운영위원회 의안 제안서(기안)
																		</a></br><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 운영위원회 의안 제안서(실시 계획서).hwp">운영위원회 의안 제안서(실시 계획서)</a>
																	</br><span class="glyphicon glyphicon-save-file"></span>
																	<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 운영위원회 의안 제안서(안전요원 배치(안)).hwp">안전요원 배치(안) 심의</a>
																</br>
															</td>
															<td>
															</td>
															<tr>
																<td class="text-center">
																	<input type="checkbox" value="12" id="chkwork_31" name="result_check[]"></td>
																	<td class="text-center">학교장 결제 요청</td>
																	<td>
																	</td>
																	<td>
																		<span class="glyphicon glyphicon-info-sign"></span>
																		학교 운영위원회 심의사항 존중<br></td>
															</tr>
														</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-6">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-6">
														<h5 class="panel-title">
															<span
																class="label label-default">6</span> 계약, 용역의뢰 및 보험가입</h5>
													</a>
												</div>
												<div id="collapse-6"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 모든 계약은 입찰이 원칙이나 추정가격이 2천만원 미만일 경우 수의계약도 가능함.</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="13" id="chkwork_34" name="result_check[]"></td>
																	<td class="text-center">표준약관 계약서 사용 계약</td>
																	<td><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 용역표준계약서.hwp">
																			용역표준계약서</a>
																		</br>
																	</td>
																	<td>
																		<span class="glyphicon glyphicon-info-sign"></span>
																		계약서 내 포함사항: 학생안전조항 반드시 명시 및 업체안전교육요구 포함,보험가입내용확인,안전사고발생시 처리방안 및 책임소재(범위) 포함,영업배상보험가입확인(차량,수련시설,숙식시
																	</br>
																	<span class="glyphicon glyphicon-info-sign"></span>
																	인솔교원의 비용은 학교운영비에서 업체에 일괄 송금함.
																</br>
																<span class="glyphicon glyphicon-info-sign"></span>
																인솔자 단독 숙소요구는 공무원행동강령에 위배됨.
															</br>
														</td>
													</tr><tr><td class="text-center"><input type="checkbox" value="14" id="chkwork_37" name="result_check[]"></td>
															<td class="text-center">청렴 서약(업체,교사)</td>
															<td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 업체청렴서약서.hwp">업체청렴서약서</a>
															</br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 교사 청렴서약서 양식.hwp">교사 청렴서약서 양식</a>
														</br></td><td><span class="glyphicon glyphicon-info-sign"></span>관련 업체로부터 어떤 형태로든 금품,향응,편의(교통,숙박 등)을 제공받거나 요구하는 행위 금지</br><span class="glyphicon glyphicon-info-sign"></span>팸투어 금지
														</br>
													</td>
												</tr>
												<tr><td class="text-center">
													<input type="checkbox" value="15" id="chkwork_40" name="result_check[]"></td>
													<td class="text-center">여행자 보험 가입 안내</td><td><span class="glyphicon glyphicon-save-file"></span>
														<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 여행자 보험가입 안내.hwp">여행자 보험가입 안내</a>
													</br>
												</td>
												<td>
													<span class="glyphicon glyphicon-info-sign"></span>
													가입대상: 참가하는 모든 사람(학생,교사,안전요원 등) 의무가입</br></td>
												</tr><tr><td class="text-center">
													<input type="checkbox" value="16" id="chkwork_43" name="result_check[]">
												</td><td class="text-center">용역 의뢰</td><td><span class="glyphicon glyphicon-save-file"></span>
													<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 용역업체 제안서.hwp">
														용역 의뢰방법</a></br></td><td></td></tr>
													</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-7">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-7">
														<h5 class="panel-title">
															<span
																class="label label-default">7</span> 2차 현장답사(시행직전)</h5>
													</a>
												</div>
												<div id="collapse-7"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 실제 업무담당자 또는 인솔자 중심으로 운영 가능	</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr>
																	<td class="text-center">
																		<input type="checkbox" value="17" id="chkwork_46" name="result_check[]"></td>
																		<td class="text-center">현장답사[시행 직전] 계획 수립</td><td><span class="glyphicon glyphicon-save-file"></span>
																			<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(시행 직전) 기안문.hwp">
																				현장답사 기안문</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(시행 직전) 계획서.hwp">
																					현장답사 계획서</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습(시행 직전) KS표준 점검.hwp">
																						현장체험학습 KS표준 점검</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습 현장답사(시행 직전) 점검 체크리스트.hwp">
																							현장체험학습 사전답사 점검</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 위원답사 불참 위임장(시행 직전).hwp">
																								위원답사 불참 위임장</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(시행 직전) 출장복명서.hwp">
																									출장복명서</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>
																										청소년 유해환경 인접여부,위험지역,이동경로 상의 교통사고 다발지역 및 안전사고 파악에 중점을 두고 답사함.</br>
																										<span class="glyphicon glyphicon-info-sign"></span>
																										시행직전 현장답사는 실제 업무담당자 또는 인솔자 중심으로 운영가능하나 학부모 위임장이나 확인서는 반드시 받아두도록 함.</br></td>
																									</tr>
																									<tr><td class="text-center"><input type="checkbox" value="18" id="chkwork_48" name="result_check[]"></td><td class="text-center">현장답사[시행 직전] 결과 보고</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(시행 직전) 결과 보고서.hwp">현장답사 결과 보고서</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장답사(시행 직전) 결과표.hwp">현장답사 결과표</a></br></td><td></td>
																			</tr>															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-8">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-8">
														<h5 class="panel-title">
															<span
																class="label label-default">8</span> 외부 협조 요청 및 확인</h5>
													</a>
												</div>
												<div id="collapse-8"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 책임범위 및 안전 관련 사항 요구</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="19" id="chkwork_50" name="result_check[]"></td><td class="text-center">특별 보호대상학생 관리 계획 수립</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 특별보호학생 관리대책 수립계획서.hwp">특별보호학생 관리대책 수립계획서</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>보호를 필요로 하는 학생이 활동 참가시 시설이나 업체에 명단과 허약정도 등을 사전에 통보하여 안전지도 대책 수립해야함.</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="20" id="chkwork_53" name="result_check[]"></td><td class="text-center">특별 보호대상학생 업체 통보 </td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 특별보호학생 업체통보 공문 및 확인서.hwp">특별보호학생 업체통보 공문</a></br></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="21" id="chkwork_56" name="result_check[]"></td><td class="text-center">무사고 운행실적 확인</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 무사고 운행실적 확인서.hwp">무사고 운행실적 확인서</a></br></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="22" id="chkwork_59" name="result_check[]"></td><td class="text-center">안전요원 확보 및 필수사항 확인 요청</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 성범죄 및 아동학대관련범죄 조회 요청(공문,신청서,동의서).hwp">성범죄 조회 요청(공문,신청서,동의서)</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>대한적십자연수 이수자, 안전요원 인력풀에서 채용</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="23" id="chkwork_62" name="result_check[]"></td><td class="text-center">경찰서 호송 및 음주측정 요청</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 버스호송 및 음주측정요청 공문 및 요청서.hwp">버스호송 및 음주측정요청 공문 및 요청서</a></br></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="24" id="chkwork_65" name="result_check[]"></td><td class="text-center">교육청 신고</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)교육청 계획변경현황 신고양식.xlsx">교육청 신고 양식</a></br></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="25" id="chkwork_66" name="result_check[]"></td><td class="text-center">현장체험학습 교육청 컨설팅 신청</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 컨설팅 체크리스트(점검).hwp">컨설팅 체크리스트(점검)</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 컨설팅 체크리스트(조치결과).hwp">컨설팅 체크리스트(조치결과)</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>150명이상 대규모 수학여행 실시학교는 수학여행지원단의 컨설팅실시후 적합한 경우에만 실시해야함.</br></td>
																			</tr>															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-9">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-9">
														<h5 class="panel-title">
															<span
																class="label label-default">9</span> 사전안전교육</h5>
													</a>
												</div>
												<div id="collapse-9"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 교과 및 창의적 체험활동 시간을 활용하여 사전교육 실시</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="26" id="chkwork_68" name="result_check[]"></td><td class="text-center">기본안전교육 실시</td><td></td><td><span class="glyphicon glyphicon-info-sign"></span>체험학습과 관련된 교육자료,현장정보 등을 미리 학생들에게 제공하여 사전 교육실시</br></td
																</tr><tr><td class="text-center"><input type="checkbox" value="27" id="chkwork_71" name="result_check[]"></td><td class="text-center">체험 유형별 안전교육 실시</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="28" id="chkwork_74" name="result_check[]"></td><td class="text-center">성범죄 예방 교육실시</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="29" id="chkwork_77" name="result_check[]"></td><td class="text-center">안전요원 안전교육 실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 안전요원 교육.hwp">안전요원 교육</a></br></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="30" id="chkwork_80" name="result_check[]"></td><td class="text-center">인솔 및 지도교사 안전교육 실시</td><td></td><td><span class="glyphicon glyphicon-info-sign"></span>교장은 인솔 및 지도교사에게 유사시에 대비하여 응급처리요령,안전지도요령,비상탈출방법 등에 대한 사전연수를 실시해야함(필요시 안전전문가를 통해 연수가능함)</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="31" id="chkwork_83" name="result_check[]"></td><td class="text-center">비상연락망 작성</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 비상연락망 양식.hwp">비상연락망 양식</a></br></td><td></td>
																</tr></tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-10">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-10">
														<h5 class="panel-title">
															<span
																class="label label-default">10</span> 구비 및 운영준비</h5>
													</a>
												</div>
												<div id="collapse-10"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 체험학습 운영계획서는 실시 3일전까지 학교 홈페이지 탑재(인적사항삭제)</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="32" id="chkwork_86" name="result_check[]"></td><td class="text-center">계획서 홈페이지 공개</td><td></td><td><span class="glyphicon glyphicon-info-sign"></span>실시 3일전, 개인정보 반드시 삭제</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="33" id="chkwork_89" name="result_check[]"></td><td class="text-center">NEIS 복무신청(초과근무 포함)</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 나이스 초과근무상신.hwp">수학여행 나이스 초과근무상신</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>초과근무 상신 관련 근거는 계획수립시 근무시간외 새벽,야간, 생활 지도자 편성내용을 근거로 작성함.</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="34" id="chkwork_92" name="result_check[]"></td><td class="text-center">비상약품 구비</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="35" id="chkwork_95" name="result_check[]"></td><td class="text-center">경비 지출 품의</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 에듀파인 품의서 양식.hwp">수학여행비 에듀파인 품의서 양식</a></br></td><td></td>
																			</tr>															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-11">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-11">
														<h5 class="panel-title">
															<span
																class="label label-default">11</span> 운영 및 경비집행</h5>
													</a>
												</div>
												<div id="collapse-11"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 비상사고시 대처방법 및 보고방법 출력/지참</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="36" id="chkwork_98" name="result_check[]"></td><td class="text-center">교육청 현장 점검</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="37" id="chkwork_99" name="result_check[]"></td><td class="text-center">단체차량이용 사전점검 및 차량표지 부착</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 차량부착표지.hwp">차량부착표지</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>운행차량 및 운전자 적격여부 확인(계약서상 자동차번호와 실제 자동차 번호일치여부,계약서상 운전자와 실제 운전자 일치여부)</br><span class="glyphicon glyphicon-info-sign"></span>차량별 운전자 연락체계 및 현장 총괄 책임자 지정서를 받아야 함</br><span class="glyphicon glyphicon-info-sign"></span>운행 전후 또는 운행중 운전자 음주여부 확인(학교자체에서 구입한 음주감지기로 측정가능함)</br><span class="glyphicon glyphicon-info-sign"></span>차량 표지 부착여부 확인해야함</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="38" id="chkwork_102" name="result_check[]"></td><td class="text-center">운전자 안전운전 교육 실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 안전운전서약서.hwp">안전운전서약서</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>운전자 안전교육 실시 및 운전자 안전운행 서약서 받음</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="39" id="chkwork_105" name="result_check[]"></td><td class="text-center">운송수단 이용 안전교육 실시</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="40" id="chkwork_108" name="result_check[]"></td><td class="text-center">경찰 호송 및 음주측정 실시</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="41" id="chkwork_111" name="result_check[]"></td><td class="text-center">사제동행 현장교육실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 교통안전점검체크리스트.hwp">교통안전점검체크리스트</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 음식안전점검체크리스트.hwp">음식안전점검체크리스트</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 숙소안전체크리스트.hwp">숙소안전체크리스트</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 화재예방안전점검체크리스트.hwp">화재예방안전점검체크리스트</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 캠핑 및 야영활동 안전점검 체크리스트.hwp">캠핑 및 야영활동 안전점검 체크리스트</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 겨울철야외활동안전점검체크리스트.hwp">겨울철야외활동안전점검체크리스트</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>위탁교육중에도 인솔,지도교사 필수 참가하여 임장지도 해야함.</br><span class="glyphicon glyphicon-info-sign"></span>담당 학생들의 동태 파악 및 안전사고 예방등을 위한 생활지도(학생안전관리규칙 제7조)</br><span class="glyphicon glyphicon-info-sign"></span>비상시 대비 상비약품을 반드시 소지하고, 이동 및 체험시설에 대한 현장 안전점검</br><span class="glyphicon glyphicon-info-sign"></span>반드시 활동 실시전 학생들의 건강상태를 묻고 확인</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="42" id="chkwork_114" name="result_check[]"></td><td class="text-center">이동경로별 안전교육 실시</td><td></td><td><span class="glyphicon glyphicon-info-sign"></span>이동 및 체험활동중 상황별로 적합한 생활지도 및 안전교육 실시</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="43" id="chkwork_117" name="result_check[]"></td><td class="text-center">숙소 안전교육 실시</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="44" id="chkwork_156" name="result_check[]"></td><td class="text-center">숙박지 현장점검실시(표집실시)</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="45" id="chkwork_119" name="result_check[]"></td><td class="text-center">사고발생시 조치사항 숙지</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 활동별 응급조치사항.hwp">활동별 응급조치사항</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>전 학생 및 인솔자 휴대폰 비상연락망을 작성하여 학교에서 관리해야함</br><span class="glyphicon glyphicon-info-sign"></span>응급상황 발생 및 필요시 학생,학부모,교사,학교에 즉시 연락해야함(*국립학교는 관할 시교육청 및 교육부 관련 부서에 동시 보고)</br><span class="glyphicon glyphicon-info-sign"></span>동일원인(동일음식)으로 추정되는 설사 등 유사증세 환자가 2명이상 동시 발생할 경우 치료조치후 교육청에 보고해야함</br><span class="glyphicon glyphicon-info-sign"></span>1차 유선보고시 발생일시 및 사건개요 보고 (근무시간내:기획조정관 학교안전팀(051-8600-861), 야간 및 공휴일:당직실(051-8600-101))</br><span class="glyphicon glyphicon-info-sign"></span>서면보고시 (초,중학교: 학교->교육지원청 유초,중등교육지원과, 고등학교: 학교->기획조정관 학교안전팀)</br><span class="glyphicon glyphicon-info-sign"></span>현지 사고 발생시 학생 후송은 반드시 119(시내)차량이나 129(시외)차량 이용</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="46" id="chkwork_122" name="result_check[]"></td><td class="text-center">임시출납원 임명</td><td></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="47" id="chkwork_125" name="result_check[]"></td><td class="text-center">학교법인카드 사용</td><td></td><td><span class="glyphicon glyphicon-info-sign"></span>사업자 등록이 되지않아 영수증 발급이 곤란한 경우, 임시출납원을 영수자로 하는 명세서 작성하여 첨부가능함.</br><span class="glyphicon glyphicon-info-sign"></span>선금은 계약금액의 70/100을 초과하지 않아야함.</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="48" id="chkwork_128" name="result_check[]"></td><td class="text-center">사건발생시 사안보고 요령 숙지</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 사건발생시 유선보고사항.hwp">사건발생시 유선보고사항</a></br><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 사건발생시 사안보고서.hwp">사건발생시 사안보고서</a></br></td><td></td>
																			</tr>															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-12">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-12">
														<h5 class="panel-title">
															<span
																class="label label-default">12</span> 정산</h5>
													</a>
												</div>
												<div id="collapse-12"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 체험학습 종료후 10일이내 정산결과를 학부모에게 공개해야함.</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="49" id="chkwork_131" name="result_check[]"></td><td class="text-center">정산 및 내역 공개</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 정산 및 공개 양식.hwp">정산 및 공개 양식</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>실시후 10일이내 정산하여야 하고 학부모에게 공개해야함.</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="50" id="chkwork_134" name="result_check[]"></td><td class="text-center">환불조치</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 환불 조치 기안.hwp">환불 조치 기안</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>전액 학부모에게 환불이 원침임, 단 나누기 어려운 소액일 경우 운영위원회 심의를 거쳐 학교발전기금으로 전출하거나 학생복지사업 등으로 이용가능.</br></td>
																			</tr>															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-13">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-13">
														<h5 class="panel-title">
															<span
																class="label label-default">13</span> 만족도평가</h5>
													</a>
												</div>
												<div id="collapse-13"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 체험학습 종료후 7일 이내 실시</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')
																<tbody>
																<tr><td class="text-center"><input type="checkbox" value="51" id="chkwork_137" name="result_check[]"></td><td class="text-center">인솔 교직원 청렴도 평가 실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습 청렴도 설문지 (교원).hwp">현장체험학습 청렴도 설문지(교원)</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>인솔교직원은 청렴도 평가를 별도로 실시하고 결과는 학교에서 관리함.</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="52" id="chkwork_139" name="result_check[]"></td><td class="text-center">학생 평가 실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습 결과설문지 (학생).hwp">현장체험학습 결과설문지(학생)</a></br></td><td><span class="glyphicon glyphicon-info-sign"></span>참가학생의 설문 평균값을 현장체험학습 결과보고의 만족도 점수에 기록함</br></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="53" id="chkwork_141" name="result_check[]"></td><td class="text-center">학부모 평가 실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습 결과설문지 (학부모).hwp">현장체험학습 결과설문지(학부모)</a></br></td><td></td>
																</tr><tr><td class="text-center"><input type="checkbox" value="54" id="chkwork_143" name="result_check[]"></td><td class="text-center">교사 평가 실시</td><td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 현장체험학습 결과설문지 (교원).hwp">현장체험학습 결과설문지(교원)</a></br></td><td></td>
																</tr></tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
																					<div class="panel panel-default">
												<div class="panel-heading" role="tab"
													 id="heading-14">
													<a role="button" class="nounderline" data-toggle="collapse"
													   href="#collapse-14">
														<h5 class="panel-title">
															<span
																class="label label-default">14</span> 평가결과 처리</h5>
													</a>
												</div>
												<div id="collapse-14"
													 class="panel-collapse collapse "
													 aria-expanded="false">
													<div class="panel-body">
														<div class="faq-content">
															<label><span
																	class="label label-warning">TIPS</span> 체험학습 종료후 14일 이내 실시</label>
															<table class="table table-bordered table-striped"
																   id="group1_work1">
																@yield('thead')

																<tbody>
																<tr>
																	<td class="text-center"><input type="checkbox" value="55" id="chkwork_145" name="result_check[]"></td>
																	<td class="text-center">평가결과 현장체험학습 공개방에 공개</td>
																	<td></td>
																	<td><span class="glyphicon glyphicon-info-sign"></span>평가조사 결과는 학교 및 수학여행 통합포털사이트 ' 현장체험학습 결과공개방'에 공개</br>
																		<span class="glyphicon glyphicon-info-sign"></span>체험학습 실시후 14일 이내에 필수 공개(시기,대상,참가인원,경비,이동경로, 학부모 동의율,계약내용,이동수단,사고발생현황,만족도결과 등)</br></td>
																</tr>
																<tr>
																	<td class="text-center"><input type="checkbox" value="56" id="chkwork_147" name="result_check[]"></td>
																	<td class="text-center">평가결과 소위워회 통보</td>
																	<td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 평가결과 소위원회 통보양식.hwp">평가결과 소위원회 통보양식</a></br></td>
																	<td><span class="glyphicon glyphicon-info-sign"></span>평가결과는 체험학습 종료후 14일 이내에 “현장체험학습소위원회”에 통보하거나 위원들에게 송부함.</br></td>
																</tr>
																<tr>
																	<td class="text-center"><input type="checkbox" value="57" id="chkwork_149" name="result_check[]"></td>
																	<td class="text-center">학교생활기록부 기재</td><td><span class="glyphicon glyphicon-save-file"></span>
																		<a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 학교생활기록부기재방법.hwp">학교생활기록부기재방법</a></br></td>
																	<td><span class="glyphicon glyphicon-info-sign"></span>현장체험학습 실시 결과는 학교생활기록부 '창의적체험활동 상황'의 자율활동(행사,봉사활동 등)영역에 특기사항을 기록함.</br>
																			<span class="glyphicon glyphicon-info-sign"></span>미참가 학생의 경우 잔류학생에 참여하였을 경우 출석으로 처리하고, 자율활동(행사,봉사활동 등)영역에는 기록하지 않음</br></td>
																</tr>
																<tr>
																	<td class="text-center"><input type="checkbox" value="58" id="chkwork_152" name="result_check[]"></td>
																	<td class="text-center"><span class="label label-purple">선택사항</span> 에듀팟 기록</td>
																	<td></td>
																	<td><span class="glyphicon glyphicon-info-sign"></span>학생이 체험하고 느낀 소감 또는 보고서 등 학습 체험을 에듀팟에 누적 기록하여 진로 탐색 등에 활용할 수 있음.</br></td>
																</tr>
																<tr>
																	<td class="text-center"><input type="checkbox" value="59" id="chkwork_155" name="result_check[]"></td>
																	<td class="text-center"><span class="label label-purple">표집실시</span> 시민감사 실시(표집실시)</td>
																	<td><span class="glyphicon glyphicon-save-file"></span><a href="http://schooltrip.pen.go.kr/schooltrip/download_files/(수학여행)현장체험학습 시민감사관 현장체험학습 체크리스트.hwp">시민감사관 현장체험학습 체크리스트</a></br></td>
																	<td><span class="glyphicon glyphicon-info-sign"></span>대규모 수학여행 실시 학교중 임의 선발 실시</br></td>
																</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</section>	<iframe id="my_iframe" style="display:none;"></iframe>
		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->
</div>
			<a href="#" id="toTop"></a>
@endsection
