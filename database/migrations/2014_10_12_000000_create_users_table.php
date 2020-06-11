<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image',1000)->nullable();
            $table->string('password');
            $table->string('full_name')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address',300)->nullable();
            $table->integer('status')->nullable();
            $table->integer('active')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
