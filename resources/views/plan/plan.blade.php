@extends('master')

@section('title','계획 작성')

@section('content')
  <div class="bluebg">
    <div class="container">
        <div class="panel panel-info">
				<div class="panel-heading text-center">
					<h3 class="panel-title" style="display: inline-block;">체험학습 계획 작성</h3>
          <a href="javascript:history.back()"role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
            <span class="glyphicon glyphicon-open-file"></span>
            뒤로 가기
          </a>
					<span class="clearfix"></span>
				</div>
				<div class="panel-body">
          {{-- 임시 서류 작성 페이지로 이동  --}}
          @if (isset($plan_no))
						<a href="{{route('plan.show', $plan_no)}} "role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
					@else
						<a href="{{route('plan.create')}} "role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
					@endif
            <span class="glyphicon glyphicon-open-file"></span>
            임시 계획 작성
          </a>
          {{-- 값이 있는 경우 표시 --}}
          @if (isset($plan_no))
            <a href="{{route('plan.destroy', $plan_no)}} "role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
              <span class="glyphicon glyphicon-open-file"></span>
              삭제
            </a>
          @endif
          {{-- 저장하기 및 계획 작성 페이지로 이동 --}}
          {{-- plansheet --}}
          @if (isset($plan_no))
            <form class="sky-form" action="{{route('plan.update',$plan_no)}}" method="post">
          	{{ method_field('PUT') }}
          @else
            <form class="sky-form" action="{{route('plan.store')}}" method="post">
          @endif
            {{csrf_field()}}
            <input type="hidden" name="user_no" value="{{Auth::id()}}">
						<div class="row form-group">
							<div class="btn-group pull-right">
                {{-- 서브밋 부분 --}}
								<button type="submit" class="btn btn-danger btn-sm margin-right-20">
                  <span class="glyphicon glyphicon-search">계획작성하기</span>
                </button>
							</div>
						</div>
						<div class="row form-group">
              {{-- 계획 제목 작성 구간 --}}
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<input type="text" name="plan_title" class="form-control required" @if(isset($plan_title)) value="{{$plan_title}}" @endif size="20" maxlength="20" placeholder="체험학습 제목" required="" autofocus="">
								</div>
							</div>
              {{-- 날짜 입력 구간 --}}
							<div class="col-md-4">
								<div class="input-group date required" data-date-format="yyyy년 mm월 dd일">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
									<input type="date" class="form-control required" @if(isset($plan_title)) value="{{$plan_date}}" @endif placeholder="체험학습 실시일" name="plan_date">
								</div>

							</div>
              {{-- 담당교사 이름 입력 구간 --}}
							{{-- <div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" name="teacher_name" class="form-control required" size="20" maxlength="20" placeholder="체험학습 담당 교사명" required="">
								</div>
							</div> --}}
						</div>
						<div class="row form-group">
              {{-- 체험학습 종류 선택 --}}
							<div class="col-md-3">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
									<select class="form-control" name="trip_kind_value" required="">
										<option value="" disabled="" @if(isset($plan_title)) selected="{{$trip_kind_value}}" @endif>체험학습종류</option>
										<option value="수학여행">수학여행</option>
										<option value="숙박형">숙박형</option>
										<option value="1일형">1일형</option>
									</select>
								</div>
							</div>
              {{-- 참여 학급 수 선택 --}}
							<div class="col-md-3">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
									<select class="form-control" name="attend_class_count" required="">
										<option value="" disabled="" @if(isset($plan_title)) selected="{{$attend_class_count}}" @endif>참여 학급수</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
									</select>
								</div>
							</div>
              {{-- 참여 학생 수 입력 --}}
							<div class="col-md-3">
								<div class="input-group required">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="attend_student_count" @if(isset($plan_title)) value="{{$attend_student_count}}" @endif class="form-control required" size="20" maxlength="20" placeholder="참여 학생수" required="">
								</div>
							</div>
              {{-- 미참여 학생 수 입력 --}}
							<div class="col-md-3">
								<div class="input-group required">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="unattend_student_count" @if(isset($plan_title)) value="{{$unattend_student_count}}" @endif class="form-control required" size="20" maxlength="20" placeholder="미참여 학생수" required="">
								</div>
							</div>
						</div>
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								   <label class="text bold margin-top-3">교통수단 (복수선택가능) : </label>
							</div>
              {{-- 교통수단 선택 --}}
							<div class="col-md-9">
								@php
									$tmp_transportation = ['전세버스','항공','선박','기차','대중교통','없음'];
									$tmp_activity				= ['수상활동','산악등반','장기도보','실험참가','도예체험','단순기술습득','위험기구사용','관광','관람(미술관,박물관 등)','도서관견학','강의참가'];
									$tmp_institution		=	['시도교육청 직영시설이용','공공기관 인증프로그램이용','공공기관 직영프로그램이용','청소년단체운영프로그램이용','없음'];
									$tmp_others					= ['MAS 이용(다수공급자계약제도이용)','지자체 안심수학여행서비스신청 및 회신','현장 경비(비용) 지출 없음','최종계약일로부터 60일이내 체험학습 실시예정','특별보호대상학생없음(신체허약자등)','수익자 부담 없음','계약 관계 없음'];
								@endphp
								
								@for($i=0; $i<count($tmp_transportation); $i++)
                  	<label class="checkbox-inline margin-right-3">
                      <input type="checkbox" value="{{$i+1}}" name="transpotation[]" @if(isset($transpotation)) @if(in_array($i+1, $transpotation)) checked @endif @endif>
                        {{$tmp_transportation[$i]}}
                    </label>
                	@endfor
								{{-- <input type="text" size="20" placeholder="사용자입력" name="transpotation[]" > --}}
							</div>
						</div>
            {{-- 체험 프로그램 선택 --}}
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								<label class="text bold margin-top-3">체험 프로그램 선택 : </label>
							</div>
							<div class="col-md-9">
								<div class="row margin-bottom-10">
									<div class="col-md-12">
										@for($i =0; $i < count($tmp_activity); $i++)
                      <label class="checkbox-inline margin-right-3">
                        <input type="checkbox" value="{{$i+1}}" name="activity[]" class="transpotation" @if(isset($activity)) @if(in_array($i+1, $activity)) checked @endif @endif>
                          {{$tmp_activity[$i]}}
                      </label>
	               		@endfor
										
									</div>
								</div>
								<!--<div class="row">-->
								<!--	<div class="col-md-12">-->
								<!--	5-->
								<!--		{{-- <input type="text" name="activity[]" size="20" class="form" placeholder="사용자입력"> --}}-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
            {{-- 기관 인증여부 선택 --}}
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								<label class="text bold margin-top-3">기관인증 여부 선택 : </label>
							</div>
							<div class="col-md-9">
								<div class="row  margin-bottom-10">
									<div class="col-md-12">
										@for($i =0; $i < count($tmp_institution); $i++)
                      <label class="checkbox-inline margin-right-3">
                        <input type="checkbox" value="{{$i+1}}" name="institution[]" class="transpotation" @if(isset($institution)) @if(in_array($i+1, $institution)) checked @endif @endif>
                          {{$tmp_institution[$i]}}
                      </label>
	               		@endfor
									</div>
								</div>
								<!--<div class="row">-->
								<!--	<div class="col-md-12">-->
								<!--		<label class="checkbox-inline margin-right-3"><input type="checkbox" value="4" name="institution[]" @if (isset($institution[3])) checked @endif>청소년단체운영프로그램이용</label>-->
								<!--		<label class="checkbox-inline margin-right-3"><input type="checkbox" value="5" name="institution[]" @if (isset($institution[4])) checked @endif>없음</label>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
            {{-- 기타 선택 사항 입력 --}}
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								<label class="text bold margin-top-3">기타 선택사항 입력: </label>
							</div>
							<div class="col-md-9">
								<div class="row margin-bottom-10">
									<div class="col-md-12">
										@for($i =0; $i < count($tmp_others); $i++)
                      <label class="checkbox-inline margin-right-3">
                        <input type="checkbox" value="{{$i+1}}" name="others[]" class="transpotation" @if(isset($others)) @if(in_array($i+1, $others)) checked @endif @endif>
                          {{$tmp_others[$i]}}
                      </label>
	               		@endfor
									</div>
								</div>
								<!--<div class="row  margin-bottom-10">-->
								<!--	<div class="col-md-12">-->
								<!--		<label class="checkbox-inline margin-right-3"><input type="checkbox" value="4" name="others[]" @if (isset($others[3])) checked @endif>최종계약일로부터 60일이내 체험학습 실시예정</label>-->
								<!--		<label class="checkbox-inline margin-right-3"><input type="checkbox" value="5" name="others[]" @if (isset($others[4])) checked @endif>특별보호대상학생없음(신체허약자등)</label>-->
								<!--		<label class="checkbox-inline margin-right-3"><input type="checkbox" value="6" name="others[]" @if (isset($others[5])) checked @endif>수익자 부담 없음</label>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="row">-->
								<!--	<div class="col-md-12">-->
								<!--		<label class="checkbox-inline margin-right-3"><input type="checkbox" value="7" name="others[]" @if (isset($others[6])) checked @endif>계약 관계 없음</label>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
					</form>
				</div>
			</div>
    </div>
  </div>
@endsection
