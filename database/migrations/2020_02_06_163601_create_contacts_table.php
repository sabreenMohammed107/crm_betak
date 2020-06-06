<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('title_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('primary_mobile')->nullable();
            $table->string('secondry_mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('fb_account', 500)->nullable();
            $table->string('website')->nullable();
            $table->string('address', 300)->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('nationality_id')->unsigned()->nullable();
            $table->string('job')->nullable();
            $table->string('company')->nullable();
            $table->integer('contact_type')->nullable();
            $table->integer('assigned_to')->unsigned()->nullable();
            $table->integer('reach_source_id')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->integer('customer_type')->nullable();
            $table->string('identity')->nullable();
            $table->string('identity_path')->nullable();
            $table->integer('created_by_user')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
