<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ContentsPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contents_packages')->insert([
             ['name' => '고구려 역사', 'explain' => '설명1', 'owner' => DB::table('users')
                                                                                     ->where('type', 'teacher')->inRandomOrder()
                                                                                     ->first()->no],
             ['name' => '발해역사', 'explain' => '설명2', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
             ['name' => '고려 역사', 'explain' => '설명3', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
             ['name' => '신라 역사', 'explain' => '설명4', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
             ['name' => '통일 신라 역사', 'explain' => '설명5', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
             ['name' => '삼국시대 역사', 'explain' => '설명6', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
             ['name' => '대구 YMCA', 'explain' => '설명7', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
             ['name' => '신도시의 역사', 'explain' => '설명8', 'owner' => DB::table('users')
                ->where('type', 'teacher')->inRandomOrder()
                ->first()->no],
             ['name' => '이승만대통령에 대해서', 'explain' => '설명9', 'owner' => DB::table('users')
                 ->where('type', 'teacher')->inRandomOrder()
                 ->first()->no],
           // ['name' => '이순신', 'explain' => '이순신 일대기를 알아 볼 수 있는 패키지', 'owner' => 28]
        ]);


//        $users = App\User::where('type','teacher')->get();
//
//        $users->each(function ($user) {
//            $user->work()->save(
//                factory(App\ContentsPackage::class, 3)->make()
//            );
//
//            $contentspackages = App\ContentsPackage::get();
//            $contentspackages->each(function ($package) {
//                // 공유, 카피본을 만들고 그 카피본을 공유
//                // -> 기존 패키지 변경이 영향 안 미침
//                $sharedPackage = [
//                    'owner' => $package->owner,
//                    'name' => $package->name,
//                    'explain' => $package->explain,
//                    'copy' => 1, // 이게 카피본이라는 뜻
//                ];
//                DB::table('contents_packages')->insert($sharedPackage);
//                $newPackage = DB::table('contents_packages')->orderBy('no', 'asc')->first();
//                $newPackage->contentsPackageShares()->save(
//                    factory(App\ContentsPackageShare::class)->make()
//                );
//            });
//        });
    }
}



// contentspackage -> contents
// 콘텐츠는 명세가 아무거나 들어가면 안 될 듯 해서 아직 안 넣었음!
// 연제한테 랜덤으로 명세 받을 것
