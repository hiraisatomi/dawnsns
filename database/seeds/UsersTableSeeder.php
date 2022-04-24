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
        //初期設定
        DB::table('users')->insert([
            'username' => 'さとみ',
            'mail' => 'hiraisatomi@gmail.com',
            'password' => Hash::make('satoko'),
            'bio' => 'DAWNカリキュラムでSNSを学習しています。',
            'iconimage' => '/images/dawm.png'
        ]);

    }
    //     public function up()
    // {
    //     Schema::create('users', function (Blueprint $table)
    //     {
    //         $table->increments('id')->autoIncrement();
    //         $table->string('username',255);
    //         $table->string('mail',255);
    //         $table->string('password',255);
    //         $table->string('bio',400)->nullable();
    //         $table->string('images',255)->default('dawn.png')->nullable();
    //         $table->timestamps();
    //     });
    // }
       
        
    //     public function down()
    //     {
    //         Schema::dropIfExists('follow_users');
    //     }
    }


