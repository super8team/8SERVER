@extends('YAYAME.page.master')
@section('title' , 'YAYAME HOME')

@section('content')
  @php
    // 사용한 변수 정리

    // sheet2.blade.php

    $thead_form = echo(
  "<thead class='text-center'>
    <th width='5%'>확인</th>
    <th width='25%'>업무이름</th>
    <th width='27%'>관련파일</th>
    <th width='43%'>업무지침</th>
    <th width='10%'>도움말</th>
  </thead>"
);

  @endphp


@endsection
