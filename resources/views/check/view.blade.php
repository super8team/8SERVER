@extends('master')

@section('title','チェックリストビュー')

@section('content')

{{-- <script type="text/javascript">
  $("tr").children().first().addClass(".text-center");
</script> --}}
  <div class="bluedecobar"></div>
  <div class="bluebg">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">チェックリスト結果
             <a role="button" href="javascript:history.back()" aria-label="Right Align"
             class="btn btn-sm btn-default ">
              {{-- <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> --}}
              戻る
            </a>
          </h3>
        </div>
        <div class="panel-body" style="min-height:500px;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>区分</th>
                <th>点検項目</th>
                <th style="min-width:50px;">確認</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="5">安全管理</td>
                <td>1 安全を確保するための非常状況時の対処案を確保したのか?</td>
                <td></td>
              </tr>
              <tr>
                <td>2 非常連絡網や非常状況対処案、非常措置マニュアル等の管理運営基準を設けたのか?</td>
                <td></td>
              </tr>
              <tr>
                <td>3 各種安全事故に備えた応急体系(非常措置システム、非常連絡網など)については、サービス従事者が熟知できるようにしたのか? (教育)</td>
                <td></td>
              </tr>
              <tr>
                <td>4 修学旅行サービスを提供する過程で事故発生に備えて迅速な避難が可能になるよう関連法規の規定によって、旅行地施設の安全を確保したのか?</td>
                <td></td>
              </tr>
              <tr>
                <td>5 運送手段や宿泊施設の安全と関連した点検、検査、測定などの内容を文書で記録や保管しているか?</td>
                <td></td>
              </tr>
              <tr>
                <td rowspan="4">緊急事態発生時の対応策</td>
                <td>1 車両の移動のうち、一般の事故や安全事故発生時の対処案を用意したのか?</td>
                <td></td>
              </tr>
              <tr>
                <td>2 食中毒ㆍ盗難や紛失物の発生時の対処案を用意したのか?</td>
                <td></td>
              </tr>
              <tr>
                <td>3 宿泊施設などの各種施設物内の安全事故や火災などに対する対策を用意したのか? </td>
                <td></td>
              </tr>
              <tr>
                <td>4 その他の発生可能な緊急事態に対する対策を用意したのか?</td>
                <td></td>
              </tr>
              <tr>
                <td rowspan="2">出発地観光バスの搭乗業務</td>
                <td>1 観光バスに修学旅行車両の案内標識及び当該契約件別運行記録証を貼り付けたのか?</td>
                <td></td>
              </tr>
              <tr>
                <td>2 全体座席のシートベルトが正常に操作可能か確認したか?</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
