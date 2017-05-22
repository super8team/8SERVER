<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        ['id'=>'jina', 'password'=>bcrypt('jina123'), 'name'=>'진아임', 'type'=>'teacher'],
        ['id'=>'swpark', 'password'=>bcrypt('123456'), 'name'=>'성원임', 'type'=>'student'],
      ];

      DB::table('users')->insert($users);
    }
}
