@extends('YAYAME.page.master')
@section('title' , 'YAYAME HOME')

@section('content')
  @php
  $POST["A0"] = "a";
  $POST["A1"] = "";
  $POST["A2"] = "c";
  $POST["A3"] = "";
  $POST["A4"] = "e";
  $POST["A5"] = "f";

// 체크박스 쳌
for($lenth_A = 0; $lenth_A <6 ; $lenth_A++ ){
  $input_A = 'A'.$lenth_A;
  if (isset($POST["$input_A"])) {
    $input_A_arr["$lenth_A"] = $POST["$input_A"];
  }
}

foreach ($input_A_arr as $value) {
  echo $value;
}
  @endphp

@endsection
