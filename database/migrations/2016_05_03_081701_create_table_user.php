<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('email');
        //     $table->string('password');
        //     $table->timestamps();
        //     $table->boolean('iscompleted', false);
                // $table->string('name', 100);
                // $table->string('shortdesc', 30);
                // $table->string('about');
                // $table->string('phone');
                // $table->dateTime('completed_at',null);
        //  $table->string('profilpict', 50)->default('noimage.jpg');

        // });
        Schema::table('users', function (Blueprint $table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('users');
    }
}
