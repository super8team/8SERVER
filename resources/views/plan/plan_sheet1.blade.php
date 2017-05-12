
@extends('YAYAME.page.master')

@section('title','모체')

@section('content')
  <div class="bluedecobar">

  </div>
<div class="bluebg">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            검색 넣을 곳
            <div class="pull-right">
              오른쪽 정령 사용 하려나?
            </div>
          </div><!-- /.panel-heading -->
          <div class="panel-body">
            판넬 바디
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->
      </div> <!-- /.col-lg-4 -->

      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            헤딩
          </div><!-- /.panel-heading -->
            <div class="panel-body">
              <div class="list-group">
                  <a href="#" class="list-group-item">
                      <span class="pull-right text-muted small"><em>4 minutes ago</em>
                      </span>
                  </a>
              </div><!-- /.list-group -->
           </div><!-- /.panel-body -->
          </div>
          <!-- /.panel -->
          <div class="panel panel-default">
              <div class="panel-heading">
                맵 들어가는 곳
              </div>
              <div class="panel-body">
              맵
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        <div class="chat-panel panel panel-default">
          <div class="panel-heading">
              <i class="fa fa-comments fa-fw"></i> 시간 표 넣을 곳

            </div><!-- /.panel-heading -->
            <div class="panel-body">
              시간 표 넣을 곳
            </div>
          </div><!-- /.panel-footer -->
        </div><!-- /.panel .chat-panel -->
      </div><!-- /.col-lg-4 -->
    </div>
  </div>

</div>
@endsection
