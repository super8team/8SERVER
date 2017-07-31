
@extends('master')

@section('content')


    <script>
     function searchClick() {
         $.ajax({
             type: "post",
             url: "{{route('ajax')}}",
             data: {ajax: "ㅎㅎ"},
             success: function (data) {
                 console.log(data);




             }
         })
     }
    </script>


    <input type="text" class="form-control" placeholder="이름을 검색 해주세요">
    <button onclick="searchClick()" type="button" id="searchBtn" class="btn btn-default">검색</button>






@endsection



