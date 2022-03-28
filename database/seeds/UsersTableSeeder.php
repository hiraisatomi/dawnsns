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
            'bio' => 'DAWNカリキュラムでSNSを学習しています。',
        ]);

        Schema::create('follow_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('followed_user_id')->index();
            $table->unsignedBigInteger('following_user_id')->index();
            $table->foreign('followed_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('following_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->foreign('followed_user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreign('following_user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }
        
        public function down()
        {
            Schema::dropIfExists('follow_users');
        }
    }


