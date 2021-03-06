
@extends('master')

@section('title','委員会管理')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

    <script type="text/javascript">
        function searchClick() {
            $.ajax({
                type: "post",
                url: "{{route('ajax')}}",
                data: {'search': $('#searchBar').val()},
                success: function (data) {
                    $('#searchBar').val();
                    console.log(data[0]);
                    $('#createDiv').empty();
                    for ($i=0; $i < data.length; $i++) {
                        var div = document.createElement('div');
                        div.innerHTML=data[$i].name;

                        var person_name    = document.createTextNode(data[$i].name);

                        var val = div.innerHTML=data[$i].name;

                        var check = document.createElement('input');
                        check.setAttribute('type', 'checkbox');
                        check.setAttribute('name', 'list');
                        check.setAttribute('value',val);
                        var member_serial = document.createElement('input');
                        member_serial.setAttribute('type','text');
                        member_serial.setAttribute('name','serial');
                        member_serial.setAttribute('value',data[$i].no);
                        member_serial.setAttribute('hidden',true);
//                      console.log('serial');
//                      console.log(member_serial);

//                      디버깅 체크
//                     console.log(data[$i].name);
                        document.getElementById('createDiv').appendChild(check);
                        document.getElementById('createDiv').appendChild(member_serial);
                        document.getElementById('createDiv').appendChild(person_name);

//                      console.log(document.getElementById('createDiv'));

                    }
                }
            })
        }

        function addMemberBtn() {
//       var a = document.getElementById('createDiv');

          var user_list = document.getElementsByName('list');
          var user_serial = document.getElementsByName('serial');
          console.log('数'+user_list.length)
          for(var i = 0; i < user_list.length ; i++ ){

                if(user_list[i].checked) {
                    //추가된 위원회 이름

                    var list_name = user_list[i].value;
                    var list_serial = user_serial[i].value;

                    var parent_div            = document.getElementById('added_member');
                    var added_list_parent     = document.createElement('div');

                    var person_name    = document.createTextNode(list_name);

                    var check = document.createElement('input');
                    check.setAttribute('type', 'checkbox');
                    check.setAttribute('name', 'added_list');
                    check.setAttribute('value',list_name);
                    var serial = document.createElement('input');
                    serial.setAttribute('type','text');
                    serial.setAttribute('value',list_serial);
                    serial.setAttribute('name','serial[]');
                    serial.setAttribute('hidden','true');

                    added_list_parent.appendChild(serial);
                    added_list_parent.appendChild(check);
                    added_list_parent.appendChild(person_name);

                    console.log(added_list_parent);

                    parent_div.appendChild(added_list_parent);

                }

            }

        }

        function deleteMemberBtn() {
            var member = document.getElementsByName('added_list');
            var parent = document.getElementById('added_member');
            console.log(member[0]);
            for(var i = member.length-1;i >= 0; i--){
                console.log(i);
                console.log(member[i]);
                if(member[i].checked){
                    console.log(member[i].parentNode);
                    parent.removeChild(member[i].parentNode);
                }

          }
          console.log('削除');
          console.log(parent);
      }


        function enterkey() {
            if (window.event.keyCode == 13) {
                searchClick();
            }
        }


        function storageBtn(count){


            var storage_list = [];
            var parent = document.getElementsByName('added_list');

            for(var i =0; i < parent.length; i++){
                storage_list[i] = parent[i].value;
            }

            var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');

        }



        // 1- 2 검색후 조건이 있을경우 div를 비움
        // 1- 3 없을경우 안내 멘트


        // 2 대기
        // 2-1 대기자들은 체크박스로 구분
        // 2-2 버튼을 누르면 체크된 항목은 지워지고 추가할 목록에 표시

        //3
        //  });


    </script>
    <div class="bluedecobar">

    </div>
    <style media="screen">
        .panel-heading{
            height: 55px;
        }
        .panel-body{
            min-height: 300px;
        }
        .scrollspy {
            position: relative;
            height: 200px;
            overflow: auto;
        }
        .body {
            position: relative;
        }



    </style>

    {{--<form type action="{{route('staff.storage')}}" method="post">--}}
    {{--<input type="hidden" name="">--}}

    {{--</form>--}}


    <div class="bluebg">
        <div class="container">
            {{--      <form class="form" action="{{route('staff.memberadd')}}" method="POST">--}}
            {{--{{ csrf_field() }}--}}
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="form-group col-sm-9">
                            <input type="text" name="search" id="searchBar" placeholder="お名前を検索してください" onKeyDown="enterkey()">
                        </div>
                        <button type="button" onclick="searchClick()" id="searchBtn" class="btn btn-default">検索</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="panel-body scrollspy-b ">
                        {{-- Step 1 :검색 --}}

                        {{-- Step 2 : 데이터 추가
                             검색 안 했을시 담당 반의 학생의 학부모 출력
                             담당 반이 없는 교사의경우 .. 아몰랑-> ㅋㅋㅋㅋ

                        --}}
                        <table id="search"class="table table-bordered table-hover">
                            <tr>
                                <td>
                                    <div id="createDiv"></div>
                                </td>
                            </tr>
                            {{-- 서버에서 추가된 이름 과 아이디를 저장한다. --}}
                        </table>
                        {{-- Step 3 : 선택 --}}
                    </div>
                </div>
            </div>

            {{-- Step 4 : 이동 --}}
            <div class="col-sm-2">

                <div class="text-center">
                    <button id="addMember" type="button" onclick="addMemberBtn()"  class="btn btn-lg btn-default">
                        追加
                        <span class="glyphicon glyphicon-forward"></span>
                    </button>
                    <a role="button" id="deleteMember" onclick="deleteMemberBtn()" class="btn btn-lg btn-default">
                        削除
                        <span class="glyphicon glyphicon-backward"></span>
                    </a>
                </div>
            </div>



            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading"><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        現在の委員会
                    </div><!-- /.panel-heading -->
                    <div class="panel-body scrollspy">

                        <form action="{{route('staff.storage')}}" method="POST">
                            <table class="table table-bordered table-hover ">
                                {{--                    @for ($i=0; $i <10 ; $i++)--}}

                                <tr>
                                    <td id = 'added_member'>

                                    </td>
                                </tr>

                                {{--@endfor--}}
                            </table>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="committee_number" value='{{$plan_number}}'>
                            <input type="submit" value="保存">
                        </form>
                    </div><!-- /.panel-body -->
                </div>
            </div><!-- /.panel .chat-panel -->
        </div>
@endsection








