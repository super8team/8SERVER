@extends('master')

@section('title','審議結果')

@section('content')
    <script>
        {{--$(document).ready(function({{$resp}}){--}}
        {{--var responds = document.getElementsByClassName('respond');--}}
        {{--console.log({{$resp}});--}}
        {{--//            console.log(responds);--}}

        {{--for (var i=0; i < responds.length; i++) {--}}

        {{--responds[$i].innerHTML = string;--}}

        {{--}--}}

        {{--})--}}


        function resp(resp){
            var responds = document.getElementsByClassName('respond');

            for (var i=0; i < responds.length; i++) {
                if(resp[i]==1)
                    responds[i].innerHTML = 'o';
                else
                    responds[i].innerHTML = 'x'
            }
        }

    </script>
    {{-- <script type="text/javascript">
      $("tr").children().first().addClass(".text-center");
    </script> --}}
    <body onload='resp({{$resp}})'>
    <div class="bluedecobar"></div>
    <div class="bluebg">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">アンケート結果
                        <a role="button" href="{{route('staff', ['count'=>$count])}}" aria-label="Right Align"
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
                            <th>大分類</th>
                            <th>小分類</th>
                            <th>チェック項目</th>
                            <th style="min-width:50px;">確認</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="5">安全管理</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 安全を確保するための非常状況時の対処案を確保したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 非常連絡網や非常状況対処案、非常措置マニュアル等の管理運営基準を設けたのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp  各種安全事故に備えた応急体系(非常措置システム、非常連絡網など)については、サービス従事者が熟知できるようにしたのか? (教育)</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 修学旅行サービスを提供する過程で事故発生に備えて迅速な避難が可能になるよう関連法規の規定によって、旅行地施設の安全を確保したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 運送手段や宿泊施設の安全と関連した点検、検査、測定などの内容を文書で記録や保管しているか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="4">緊急事態発生時の<br/>対応策</td>
                            <td rowspan="4"></td>
                            <td>1&nbsp 車両の移動のうち、一般の事故や安全事故発生時の対処案を用意したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 食中毒ㆍ盗難や紛失物の発生時の対処案を用意したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 宿泊施設などの各種施設物内の安全事故や火災などに対する対策を用意したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp その他の発生可能な緊急事態に対する対策を用意したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">出発地観光バスの<br/>搭乗業務</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 観光バスに修学旅行車両の案内標識及び当該契約件別運行記録証を貼り付けたのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 全体座席のシートベルトが正常に操作可能か確認したか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 車両で油のにおいや不快な臭いがしないか確認したか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 安全を考慮して、安全ベルトの着用などバス内の安全ルールを説明したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 全員搭乗を確認したか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="4">旅行地移動業務</td>
                            <td rowspan="4"></td>
                            <td>1&nbsp 運行中の座席を離脱しないように案内したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 運行中の飲酒歌舞をしないように案内したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 旅行の休憩所停車について公知したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 安全のために運転者が必ず規定された運行速度を遵守するように案内したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">駅ㆍ旅客船ターミナルㆍ空港到着前の業務</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 旅行業者のロゴや会社名が表記された識別が可能な大きさの案内板を利用して簡単に旅行業者を識別できるようにしたのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 運送便、搭乗時間、搭乗口、出発時間、所要時間など必要な情報を案内したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 客室の配分表を利用して出発人数を確認したか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 搭乗券発給後の搭乗ゲートと搭乗時間を説明したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 搭乗口に案内して全員搭乗を確認したか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">建物</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 生徒団体を受けられる規模か?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 生徒団体活動をできる施設を備えているのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 食堂の規模や位置が学生が使用するのに適切か?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 宿舎の周りが危険にさらされているわけではないか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 生徒たちに放送など案内できる施設を備えているのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">内部施設</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 生徒たちをいくつかの層に分散配置できるか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 生徒たちが安全な休息のためにバンビョル適正人員を配置したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 施設は安全か?(世帯、ガラス窓、洗面台など)</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 外部の騒音が遮断されるか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 生徒の安全のための宿舎の戸締り装置がきちんと作動されるか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="6">安全</td>
                            <td rowspan="6"></td>
                            <td>1&nbsp 学校で消防署に宿泊施設の火災の点検を要請したのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 生徒たちの移動通路や非常口は確保されているのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp ガラス窓の安全開閉装置が作動しているか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 階段や手すりに滑り止めテープや安全装置ができているのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 部屋の間のベランダが生徒たちが越えているほどに設計されて危険ではないか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 火事の危険施設の統制(電気レンジ、ガスレンジ、炊事道具など)ができるか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">生活指導</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 宿舎内や近隣に青少年有害事業所があったわけではないか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 部屋の中にTVがある場合、青少年有害番組を統制できるのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 一般客室と生徒の区分統制ができるか?(層別統制可能かどうか)?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 日程終了後、生徒および外部の人の出入りを把握する施設が整ったのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 宿舎内の便宜施設の使用時間を統制できるのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">衛生</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 食堂の衛生状態が清潔なのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 部屋の寝具の保管及び衛生状態は清潔なのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 浴室や共同、洗面所の掃除状態は綺麗か?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp トイレの衛生状態及び換気施設は正常的なのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 植樹帯や、水衛生状態は良好か?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">食堂</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 生徒団体を受けられる規模と経験を持っているか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp メニュー構成が生徒たちの好みに適しているのか</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 調理室の衛生状態が良好か?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 調理師たちは 衛生服と 衛生帽子を着用しているか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 食堂は移動時間を最適化できるところに位置しているのか</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="5">日程やコース</td>
                            <td rowspan="5"></td>
                            <td>1&nbsp 生徒の発達段階に相応しい日程か?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp コースの選定が教育課程と連携して教育的効果があるのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 安全教育など独自の教育活動を計画しているか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 移動動線を考慮して効率的なコースの選定が行われたのか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp ショッピングや娯楽施設などに生徒たちが放置されているわけではないか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="6">車両</td>
                            <td rowspan="6">車両の状態のチェック</td>
                            <td>1&nbsp すべての座席のシートベルトは正常作動しますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 開門の門可能な窓位置を確認していますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 消化器設備状況及び位置を確認していますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 非常脱出用ハンマー(蛍光用)配置の有無や位置を確認していますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 車両内部は清潔、悪臭がしていませんか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 生徒搭乗車両の表紙（前、後ろ)がきちんと装着されていますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="9">運転者</td>
                            <td rowspan="7">交通法規遵守</td>
                            <td>1&nbsp 運転者飲酒検知を実施しましたか?(警察協力)</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 安全距離、制限速度、信号、停止線を遵守していますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 車両は運行中に対向車線侵犯をしないですか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 車線を守り、実線区間で追い越していませんか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>5&nbsp 運転中携帯電話やカーナビ操作をしないですか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 車両に定められた定員を超過していませんか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>7&nbsp 隊列の運行(2代以上)をしていませんか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="2">運転者ミーティング</td>
                            <td>8&nbsp 運行の日程を協議しましたか?(経由地、目的地、休憩所など)</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>9&nbsp 運行の日程は過度でないですか?(適切な休息保障)</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="6">運転者</td>
                            <td rowspan="4">運転者安全教育非常時行動</td>
                            <td>1&nbsp シートベルト着用を教育しての着用状態を確認していますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 運行中の移動禁止や非常時の対処要領、教育(避難手順など)をしましたか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 車両火災の際、消火器の使用教育をしましたか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>4&nbsp 危急状況時の非常ハンマー使用教育をしましたか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="2">休憩所の安全</td>
                            <td>5&nbsp 休憩所で守らなければならない安全教育を実施しましたか?(歩行路の順守、移動や後進車両主義、休憩所内の走らないでことこと)</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>6&nbsp 休憩所の出発時間を教えてくれましたか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="2">連絡先</td>
                            <td rowspan="2">非常連絡先の構築</td>
                            <td>1&nbsp 車両運転者と引率責任者の連絡先をメモしましたか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 生徒や父兄の非常連絡先を持っていますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td rowspan="3">その他</td>
                            <td rowspan="3">その他</td>
                            <td>1&nbsp 救急袋を準備し、薬品の使用説明書を確認していますか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>2&nbsp 船酔いする生徒のための衛生封筒は用意したんですか?</td>
                            <td class="respond"></td>
                        </tr>
                        <tr>
                            <td>3&nbsp 保護の必要の生徒名簿を確認しましたか?(常備薬、席配置)</td>
                            <td class="respond"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">댓글--}}
                    {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body" style="min-height:300px;">--}}
                    {{--<div class="row">--}}
                    {{--<table class="table table-bordered col-lg-1">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>번호</th>--}}
                            {{--<th>내용</th>--}}
                            {{--<th>작성자</th>--}}
                            {{--<th style="min-width:50px;">작성날짜</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>1</td>--}}
                            {{--<td>아이들 교육을 위해서라면 꼭 가봐야 할 장소 같네요!!</td>--}}
                            {{--<td>박성원</td>--}}
                            {{--<td>2017/00/00</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>2</td>--}}
                            {{--<td>좋네요..</td>--}}
                            {{--<td>권유성</td>--}}
                            {{--<td>2017/00/00</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>3</td>--}}
                            {{--<td>아~ 두말할 필요도 없죠~!</td>--}}
                            {{--<td>정연제</td>--}}
                            {{--<td>2017/00/00</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
                    {{--<form class="form" action="" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-offset-2 col-md-8">--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" class="form-control" placeholder="내용을 입력 하세요.">--}}
                                    {{--<span class="input-group-btn">--}}
                                     {{--<button class="btn btn-default" type="button">확인</button>--}}
                                 {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
</body>
