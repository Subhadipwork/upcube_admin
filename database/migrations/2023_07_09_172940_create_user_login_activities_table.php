<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('user_login_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('login_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_login_activities');
    }
}
