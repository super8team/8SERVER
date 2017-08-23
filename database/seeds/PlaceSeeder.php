<?php

use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([

            ['name'=>'영진전문대 도서관', 'explain'=>'설명1', 'lat'=>35.895139, 'lng'=>128.622535, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'동대구역', 'explain'=>'설명2', 'lat'=>35.878020, 'lng'=>128.627862, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'경대병원역', 'explain'=>'설명3', 'lat'=>35.866499, 'lng'=>128.604974, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'반월당역', 'explain'=>'설명4', 'lat'=>35.865664, 'lng'=>128.593486, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'서문시장역', 'explain'=>'설명5', 'lat'=>35.869994, 'lng'=>128.582222, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'북구청역', 'explain'=>'설명6', 'lat'=>35.884151, 'lng'=>128.581366, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'칠성초등학교', 'explain'=>'설명7', 'lat'=>35.886719, 'lng'=>128.593658, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'대산초등학교', 'explain'=>'설명8', 'lat'=>35.897173, 'lng'=>128.593572, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'연암공원', 'explain'=>'설명9', 'lat'=>35.899900, 'lng'=>128.600526, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'대동초등학교', 'explain'=>'설명10', 'lat'=>35.897329, 'lng'=>128.612370, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'국립경주박물관', 'explain' => '오전 9시부터 오후 6시까지 입장 가능한 경주 국립 박물관', 'lat'=>35.8293902, 'lng'=>129.2268327, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'불국사', 'explain' => '불국사는 대한민국 경상북도 경주시 동쪽 토함산에 있는 대한불교 조계종 소속 사찰이다. 신라시대인 경덕왕에서 혜공왕 시대에 걸쳐 대규모로 중창되었다. 신라 이후 고려와 조선시대에 이르기까지 여러 번 수축되었으며, 임진왜란 때에는 불타버렸다. 대한불교 조계종 제11교구 본사이고, 1995년 유네스코 세계문화유산으로 지정되었다.', 'lat'=>35.789901, 'lng'=>129.332033, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'석굴암', 'explain' => "경주 석굴암 석굴은 대한민국 경상북도 경주시의 토함산 중턱에 있는 석굴로서 국보 24호로 지정되어 있다. 신라 경덕왕 10년, 당시 51세였던 김대성이 만들기 시작했고 20여년 후 완성되었다. 신라의 건축과 조형미술이 반영되어 있다. 석굴암의 원래 이름은 '석불사'였으나, '석굴', '조가절' 등의 이름을 거쳐 일제강점기 이후로 석굴암으로 불리고 있다", 'lat'=>35.795079, 'lng'=>129.349694, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'은제사리내합', 'explain' => "무구정광대다라니경을 보관중이다.", 'lat'=>35.789351, 'lng'=>129.333046, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'천왕문', 'explain' => "", 'lat'=>35.788394, 'lng'=>129.332494, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'코오롱호텔', 'explain' => "", 'lat'=>35.787630, 'lng'=>129.322063, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'제주국제공항', 'explain' => "", 'lat'=>33.507065, 'lng'=>126.494651, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'한라산국립공원', 'explain' => "", 'lat'=>33.392748, 'lng'=>126.490843, 'radius'=>10, 'img'=>'noIMG'],
            ['name'=>'붉은오름', 'explain' => "", 'lat'=>33.377589, 'lng'=>126.465834, 'radius'=>10, 'img'=>'noIMG'],

        ]);

    }
}
