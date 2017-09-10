@extends('master')

@section('title','계획 수정')

@section('content')
  {{-- 계획 수정 --}}
  {{-- 1단계 모든 입력을 새로입력 (현제 상태)--}}
  {{-- 2단계 DB 의 값을 인풋란에 미리 작성후 고칠 수있게--}}
@php
$lang = 'jp';

if($lang == 'kr'){
  $lang_plan_list         = '계획 리스트';
  $lang_create_plan       = '계획 작성하기';
  $lang_create_mission    = '미션 작성하기';
  $lang_plan_name         = '체험학습 제목';
  $lang_plan_date         = '체험학습 실시일';
  $lang_short_cut         = '바로가기';
  $lang_back              = '뒤로가기';
  $lang_sheet             = '서류작성';
  $lang_staff             = '위원회';
  $lang_survey            = '설문조사';
  $lang_notice            = '가정통신문';
  $lang_scheduel          = '스케쥴';
  $lang_checklist         = '체크리스트';
  $lang_report            = '소감문';
  $lang_share             = '공유';
  $lang_modal_share_title = '공유하기';
  $lang_modal_share_btn   = '계획 공유하기';
  $lang_modal_cancle_btn  = '취소';
  $lang_delete            = '삭제';
  $lang_select_trip_kind  = '체험학습 종류 선택';
  $lang_trip_kind_syugaku = '수학여행';
  $lang_trip_kind_tomaru  = '숙박형';
  $lang_trip_kind_touzitu = '1일형';
}
if($lang == 'jp'){
  $lang_plan_list         = '計画リスト';
  $lang_create_plan       = '計画作成';
  $lang_create_mission    = 'ミッション作成';
  $lang_plan_name         = '体験学習タイトル';
  $lang_plan_date         = '体験学習実行日';
  $lang_short_cut         = 'ショットカット';
  $lang_back              = 'もどる';
  $lang_sheet             = '書類作成';
  $lang_staff             = '委員会';
  $lang_survey            = 'アンケート';
  $lang_notice            = 'お知らせ';
  $lang_scheduel          = 'スケージュール';
  $lang_checklist         = 'チェックリスト';
  $lang_report            = '感想文';
  $lang_share             = '共有';
  $lang_modal_share_title = '共有する';
  $lang_modal_share_btn   = '計画共有';
  $lang_modal_cancle_btn  = '取り消し';
  $lang_delete            = '消し';
  $lang_select_trip_kind  = '体験学習種類';
  $lang_trip_kind_syugaku = '修学旅行';
  $lang_trip_kind_tomaru  = '泊まる';
  $lang_trip_kind_touzitu = '当日';
  
}
@endphp
  <div class="bluebg">
    <div class="container">
        <div class="panel panel-info">
				<div class="panel-heading text-center">
					<h3 class="panel-title" style="display: inline-block;">体験学習修正</h3>
          <a href="{{route('plan.teacher')}}" role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
            <span class="glyphicon glyphicon-open-file"></span>
            {{$lang_back }}
          </a>
          <a href="{{route('plan.destroy'),$plan_id}} "role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
            <span class="glyphicon glyphicon-open-file"></span>
            {{$lang_delete}}
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
                  <span class="glyphicon glyphicon-search">修正</span>
                </button>
							</div>
						</div>
						<div class="row form-group">
              {{-- 계획 제목 작성 구간 --}}
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<input type="text" name="plan_title" class="form-control required"  value="{{$plan_title}}" size="20" maxlength="20" placeholder="{{$lang_plan_name}}" required="" autofocus="">
								</div>
							</div>  
              {{-- 날짜 입력 구간 --}}
							<div class="col-md-4">
								<div class="input-group date required" data-date-format="yyyy년 mm월 dd일">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
									<input type="text" class="form-control required" value="{{$plan_date}}" placeholder="{{$lang_plan_date}}" name="plan_date">
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
										<option value="" disabled="" selected="{{$trip_kind_value}}">{{$lang_select_trip_kind}}</option>
										<option value="{{$lang_trip_kind_syugaku}}">{{$lang_trip_kind_syugaku}}</option>
										<option value="{{$lang_trip_kind_tomaru}}">{{$lang_trip_kind_tomaru}}</option>
										<option value="{{$lang_trip_kind_touzitu}}">{{$lang_trip_kind_touzitu}}</option>
									</select>
								</div>
							</div>
              {{-- 참여 학급 수 선택 --}}
							<div class="col-md-3">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
									<select class="form-control" name="attend_class_count" required="">
										<option value="" disabled="" selected="{{$attend_class_count}}">参加クラス数</option>
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
									<input type="number" name="attend_student_count" class="form-control required" value="{{$attend_student_coutn}}" size="20" maxlength="20" placeholder="参加学生数" required="">
								</div>
							</div>
              {{-- 미참여 학생 수 입력 --}}
							<div class="col-md-3">
								<div class="input-group required">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="unattend_student_count" class="form-control required" value="{{$unattend_student_coutn}}" size="20" maxlength="20" placeholder="未参加学生数" required="">
								</div>
							</div>
						</div>
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								   <label class="text bold margin-top-3">交通: </label>
							</div>
              {{-- 교통수단 선택 --}}
							<div class="col-md-9">
								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="貸し切りバス" name="transpotation[]" >貸し切りバス</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="航空" name="transpotation[]" >航空</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="船" name="transpotation[]">船</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="電鉄" name="transpotation[]">電鉄</label>

								<label class="checkbox-inline margin-right-3"><input type="checkbox" value="公共交通機関" name="transpotation[]" >公共交通機関</label>

								<label class="checkbox-inline margin-right-15"><input type="checkbox" value="なし'" name="transpotation[]">なし</label>
								<input type="text" size="20" placeholder="自由入力" name="transpotation[]" >
							</div>
						</div>
            {{-- 체험 프로그램 선택 --}}
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								<label class="text bold margin-top-3">体験プログラム : </label>
							</div>
							<div class="col-md-9">
								<div class="row margin-bottom-10">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="レジャー"name="activity[]">レジャー</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="登攀"name="activity[]">登攀</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="徒歩"name="activity[]">徒歩</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="実験参加"name="activity[]">実験参加</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="陶芸体験"name="activity[]" >陶芸体験</label>

										<label class="checkbox-inline margin-right-15"><input type="checkbox" value="単純技術取得"name="activity[]">単純技術取得</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="危険な道具使用"name="activity[]">危険な道具使用</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="観光"name="activity[]">観光</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="観覧"name="activity[]" >観覧</label>

										{{-- <label class="checkbox-inline margin-right-3"><input type="checkbox" value="도서관견학"name="activity[]">도서관견학</label> --}}

										<label class="checkbox-inline margin-right-15"><input type="checkbox" value="講座参加"name="activity[]">講座参加</label>

										<input type="text" name="activity[]" size="20" class="form" placeholder="自由入力">
									</div>
								</div>
							</div>
						</div>
            {{-- 기관 인증여부 선택 --}}
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								<label class="text bold margin-top-3">機関認証拒否 : </label>
							</div>
							<div class="col-md-9">
								<div class="row  margin-bottom-10">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="国家直営施設利用" name="institution[]">国家直営施設利用</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="公共機関認証プログラム利用" name="institution[]">公共機関認証プログラム利用</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="公共機関直営プログラム利用" name="institution[]">公共機関直営プログラム利用</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="青少年団体運営プログラム利用" name="institution[]">青少年団体運営プログラム利用</label>
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="なし" name="institution[]">なし</label>
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
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="MAS 利用" name="others[]">MAS 利用</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="安心できる巣医学旅行サービス申し込み" name="others[]">安心できる巣医学旅行サービス申し込み</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="現場での払いなし" name="others[]">現場での払いなし</label>
									</div>
								</div>
								<div class="row  margin-bottom-10">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="最終契約日から６０日以内に学習実行する予定" name="others[]">最終契約日から６０日以内に学習実行する予定</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="特別保護対象なし" name="others[]">特別保護対象なし</label>

										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="受益者負担なし" name="others[]">受益者負担なし</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="checkbox-inline margin-right-3"><input type="checkbox" value="契約関係なし" name="others[]" >契約関係なし</label>
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
