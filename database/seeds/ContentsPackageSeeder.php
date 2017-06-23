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
            //
            // ['name' => '콘텐츠1', 'explain' => '설명1', 'owner' => DB::table('users')
            //                                                                         ->where('type', 'teacher')->inRandomOrder()
            //                                                                         ->first()->no],
            // ['name' => '콘텐츠2', 'explain' => '설명2', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠3', 'explain' => '설명3', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠4', 'explain' => '설명4', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠5', 'explain' => '설명5', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠6', 'explain' => '설명6', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠7', 'explain' => '설명7', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠8', 'explain' => '설명8', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            // ['name' => '콘텐츠9', 'explain' => '설명9', 'owner' => DB::table('users')
            //     ->where('type', 'teacher')->inRandomOrder()
            //     ->first()->no],
            ['name' => '패키지임다', 'explain' => '불국사를 대표하는 문제', 'owner' => 106]

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
