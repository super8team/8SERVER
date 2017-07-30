@extends('master')

@section('title','계획 수정')

@section('content')
  {{-- 계획 수정 --}}
  {{-- 1단계 모든 입력을 새로입력 (현제 상태)--}}
  {{-- 2단계 DB 의 값을 인풋란에 미리 작성후 고칠 수있게--}}

  <div class="bluebg">
    <div class="container">
        <div class="panel panel-info">
				<div class="panel-heading text-center">
					<h3 class="panel-title" style="display: inline-block;">체험학습 계획 작성</h3>
          <a href="{{route('plan.teacher')}}" role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
            <span class="glyphicon glyphicon-open-file"></span>
            뒤로 가기
          </a>
          <a href="{{route('plan.destroy'),$plan_id}} "role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
            <span class="glyphicon glyphicon-open-file"></span>
            삭제
          </a>
					<span class="clearfix"></span>
				</div>
				<div class="panel-body">
          {{-- 저장하기 및 계획 작성 페이지로 이동 --}}
					<form class="sky-form" action="{{route('plan.update'),$plan_no}}" method="post">
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
									<input type="text" name="plan_title" class="form-control required"  value="{{$plan_title}}" size="20" maxlength="20" placeholder="체험학습 제목" required="" autofocus="">
								</div>
							</div>
              {{-- 날짜 입력 구간 --}}
							<div class="col-md-4">
								<div class="input-group date required" data-date-format="yyyy년 mm월 dd일">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
									<input type="text" class="form-control required" value="{{$plan_date}}" placeholder="체험학습 실시일" name="plan_date">
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
										<option value="" disabled="" selected="{{$trip_kind_value}}">체험학습종류</option>
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
										<option value="" disabled="" selected="{{$attend_class_count}}">참여 학급수</option>
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
									<input type="number" name="attend_student_count" class="form-control required" value="{{$attend_student_coutn}}" size="20" maxlength="20" placeholder="참여 학생수" required="">
								</div>
							</div>
              {{-- 미참여 학생 수 입력 --}}
							<div class="col-md-3">
								<div class="input-group required">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="unattend_student_count" class="form-control required" value="{{$unattend_student_coutn}}" size="20" maxlength="20" placeholder="미참여 학생수" required="">
								</div>
							</div>
						</div>
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								   <label class="text bold margin-top-3">교통수단 (복수선택가능) : </label>
							</div>
              {{-- 교통수단 선택 --}}
							<div class="col-md-9">
								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="전세버스" name="transpotation[]" >전세버스</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="항공" name="transpotation[]" >항공</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="선박" name="transpotation[]">선박</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="기차" name="transpotation[]">기차</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="대중교통" name="transpotation[]" >대중교통</label>

								<label class="checkbox-inline margin-right-15"><input type="checkbox" value="없음" name="transpotation[]">없음</label>
								<input type="text" size="20" placeholder="사용자입력" name="transpotation[]" >
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
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="수상활동"name="activity[]">수상활동</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="산악등반"name="activity[]">산악등반</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="장기도보"name="activity[]">장기도보</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="실험참가"name="activity[]">실험참가</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="도예체험"name="activity[]" >도예체험</label>

										<label class="checkbox-inline margin-right-15"><input type="checkbox" value="단순기술습득"name="activity[]">단순기술습득</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="위험기구사용"name="activity[]">위험기구사용</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="관광"name="activity[]">관광</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="관람(미술관,박물관 등)"name="activity[]" >관람(미술관,박물관 등)</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="도서관견학"name="activity[]">도서관견학</label>

										<label class="checkbox-inline margin-right-15"><input type="checkbox" value="강의참가"name="activity[]">강의참가</label>

										<input type="text" name="activity[]" size="20" class="form" placeholder="사용자입력">
									</div>
								</div>
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
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="시도교육청 직영시설이용" name="institution[]">시도교육청 직영시설이용</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="공공기관 인증프로그램이용" name="institution[]">공공기관 인증프로그램이용</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="공공기관 직영프로그램이용" name="institution[]">공공기관 직영프로그램이용</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="청소년단체운영프로그램이용" name="institution[]">청소년단체운영프로그램이용</label>
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="없음" name="institution[]">없음</label>
									</div>
								</div>
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
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="MAS 이용(다수공급자계약제도이용)" name="others[]">MAS 이용(다수공급자계약제도이용)</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="지자체 안심수학여행서비스신청 및 회신" name="others[]">지자체 안심수학여행서비스신청 및 회신</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="현장 경비(비용) 지출 없음" name="others[]">현장 경비(비용) 지출 없음</label>
									</div>
								</div>
								<div class="row  margin-bottom-10">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="최종계약일로부터 60일이내 체험학습 실시예정" name="others[]">최종계약일로부터 60일이내 체험학습 실시예정</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="특별보호대상학생없음(신체허약자등)" name="others[]">특별보호대상학생없음(신체허약자등)</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="수익자 부담 없음" name="others[]">수익자 부담 없음</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="계약 관계 없음" name="others[]" >계약 관계 없음</label>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
      </div>
    </div>

@endsection
