@extends('master')

@section('title','計画作成')

@section('content')
  @php
  // $plan_id    = 99;
  // $plan_title ="뚝배기 깨기 여행";
  // $plan_date  = "2017-09-28";
  // $transpotation = {"전세버스","선박"};

      if(isset($plan_id)){

          if(!isset($plan_title )){
            $plan_title  = "";
          }
          if(!isset($plan_date)){
            $plan_date = "";
          }
          if(!isset($teacher_name)){
            $teacher_name = "";
          }
          if(!isset($trip_kind_value)){
            $trip_kind_value = "";
          }
          if(!isset($attend_class_count)){
            $attend_class_count = "";
          }
          if(!isset($attend_student_count)){
            $attend_student_count = "";
          }
          if(!isset($unattend_student_count)){
            $unattend_student_count = "";
          }
      }
      // $plan_title  = "경주 불국사 체험학습";
      // $plan_date = "2017-09-08";
      // $teacher_name = "김갑순";
      // $trip_kind_value = "수학여행"; 
      // $attend_class_count = "3";
      // $attend_student_count = "123";
      // $unattend_student_count = "1";
      
      $plan_title  = "京都体験学習";
      $plan_date = "2017-09-08";
      $teacher_name = "橋本カンナ";
      $trip_kind_value = "수학여행"; 
      $attend_class_count = "3";
      $attend_student_count = "123";
      $unattend_student_count = "1";
      
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
                  
        // plan_title 		           = “(String)”,
        // plan_date                = “(String)”,
        // teacher_name			       = “(String)”,
        // trip_kind_value		       = “(String)”,		//체험학습 종류
        // attend_class_count		   = “(String)”,		//참여 학급 수
        // attend_student_count		 = “(String)”,		//참여 학생 수
        // unattend_student_count	 = “(String)”		  //미참여 학생 수
        // transpotation []			   = “(ArrayString)”	//교통수단 정보
        // activity[]		           = “(ArrayString)”	//체험학습 프로그램
        // institution[]			       = “(ArrayString)”	//기관인증여부
        // others[]			           = “(ArrayString)”	//기타
        // result_check[]			     = “(ArrayString)”	//진행도 여부를 파악용 체크
        // 
  @endphp
  <div class="bluebg">
    <div class="container">
        <div class="panel panel-info">
				<div class="panel-heading text-center">
					<h3 class="panel-title" style="display: inline-block;">{{$lang_create_plan}}</h3>
          <a href="{{route('plan.teacher')}}" role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            {{$lang_back}}
          </a>
					<span class="clearfix"></span>
				</div>
				<div class="panel-body">        
          {{-- 값이 있는 경우 표시 --}}
          @if (isset($plan_no))
            <a href="{{route('plan.destroy', $plan_no)}} "role="button" class="btn btn-sm btn-success margin-right-10 pull-right">
              <span class="glyphicon glyphicon-open-file"></span>
              {{$lang_delete}}
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
                  <span class="glyphicon glyphicon-search">{{$lang_create_plan}}</span>
                </button>
							</div>
						</div>
						<div class="row form-group">
              {{-- 계획 제목 작성 구간 --}}
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  @if(isset($plan_title)) 
									  <input type="text" name="plan_title" class="form-control required" 
                    value="{{$plan_title}}" size="20" maxlength="20" placeholder="{{$lang_plan_name}}" required="" autofocus="">
                  @else
                    <input type="text" name="plan_title" class="form-control required" 
                     size="20" maxlength="20" placeholder="{{$lang_plan_name}}" required="" autofocus="">
                  @endif
								</div>
							</div>
              {{-- 날짜 입력 구간 --}}
							<div class="col-md-4">
								<div class="input-group date required" data-date-format="yyyy년 mm월 dd일">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
                  @if(isset($plan_date)) 
                    <input type="date" class="form-control required" value="{{$plan_date}}" name="plan_date">
                  @else
                    <input type="date" class="form-control required" placeholder="{{$lang_plan_date}}" name="plan_date">
                  @endif
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
                   <option value="" disabled="" selected="">体験学習種類</option>
                    @if(isset($trip_kind_value))  
                      @if($trip_kind_value == '{{$lang_select_trip_kind}}')
                        <option value="{{$lang_select_trip_kind}}" selected="selected">{{$lang_select_trip_kind}}</option>
                      @else
                        <option value="{{$lang_trip_kind_syugaku}}">{{$lang_trip_kind_syugaku}}</option>
                      @endif
                      @if($trip_kind_value == '{{$lang_trip_kind_tomaru}}')
                        <option value="{{$lang_trip_kind_tomaru}}" selected="selected">{{$lang_trip_kind_tomaru}}</option>
                      @else
                        <option value="{{$lang_trip_kind_tomaru}}" >{{$lang_trip_kind_tomaru}}</option>
                      @endif
                      @if($trip_kind_value == '{{$lang_trip_kind_touzitu}}')
                        <option value="{{$lang_trip_kind_touzitu}}" selected="selected">{{$lang_trip_kind_touzitu}}</option>
                      @else
                        <option value="{{$lang_trip_kind_touzitu}}" >{{$lang_trip_kind_touzitu}}</option>
                      @endif
                    @else
                      <option value="{{$lang_trip_kind_syugaku}}">{{$lang_trip_kind_syugaku}}</option>
                      <option value="{{$lang_trip_kind_tomaru}}">{{$lang_trip_kind_tomaru}}</option>
                      <option value="{{$lang_trip_kind_touzitu}}" >{{$lang_trip_kind_touzitu}}</option>
                    @endif
									</select>
								</div>
							</div>
              {{-- 참여 학급 수 선택 --}}
							<div class="col-md-3">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
									<select class="form-control" name="attend_class_count" required="">
										<option value="" disabled="" >参加するクラス数</option>
                   @if(isset($attend_class_count))  
                        @for ($t=1; $t <=15 ; $t++)
                          <option value="{{$t}}" @if ($attend_class_count == $t) selected="selected"@endif>{{$t}}</option>
                        @endfor
                      @else
                        @for ($t=1; $t <=15 ; $t++)
                          <option value="{{$t}}">{{$t}}</option>
                        @endfor
                    @endif
									</select>
								</div>
							</div>
              {{-- 참여 학생 수 입력 --}}
							<div class="col-md-3">
								<div class="input-group required">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="attend_student_count" @if(isset($attend_student_count)) value="{{$attend_student_count}}" @endif class="form-control required" size="20" maxlength="20" placeholder="参加生徒数" required="">
								</div>
							</div>
              {{-- 미참여 학생 수 입력 --}}
							<div class="col-md-3">
								<div class="input-group required">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="number" name="unattend_student_count" @if(isset($unattend_student_count)) value="{{$unattend_student_count}}" @endif class="form-control required" size="20" maxlength="20" placeholder="未参加生徒数" required="">
								</div>
							</div>
						</div>
						<div class="row well well-sm form-group center-block">
							<div class="col-md-3">
								   <label class="text bold margin-top-3">公共交通機関 : </label>
							</div>
              {{-- 교통수단 선택 --}}
							<div class="col-md-9">
								@php
									$tmp_transportation = ['貸し切りバス','航空','船','電鉄','公共交通機関','なし'];
									$tmp_activity				= ['レジャー','登攀','徒歩','実験参加','陶芸体験','単純技術取得','危険な道具使用','観光','観覧','講座参加'];
									$tmp_institution		=	['国家直営施設利用','公共機関認証プログラム利用','公共機関直営プログラム利用','青少年団体運営プログラム利用','なし'];
									$tmp_others					= ['MAS 利用','安心できる巣医学旅行サービス申し込み','現場での払いなし','最終契約日から６０日以内に学習実行する予定','特別保護対象なし','受益者負担なし','契約関係なし'];
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
								<label class="text bold margin-top-3">体験プログラム選択 : </label>
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
								<label class="text bold margin-top-3">機関認証拒否: </label>
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
								<label class="text bold margin-top-3">その他入力: </label>
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
