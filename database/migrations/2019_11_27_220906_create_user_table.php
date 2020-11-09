<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('name')->unique();
            $table->string('contact')->unique();
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('date_of_birth');
            $table->string('password');
            $table->string('avatar')->default('p.png');
            $table->string('confirm_password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
