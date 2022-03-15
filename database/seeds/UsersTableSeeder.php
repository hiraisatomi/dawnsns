<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'さとみ',
            'mail' => 'hiraisatomi@gmail.com',
            'password' => Hash::make('satoko'),
            'bio' => '一つ目のユーザーです',
        ]);

}
}

