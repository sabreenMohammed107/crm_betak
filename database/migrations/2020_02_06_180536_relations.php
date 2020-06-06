<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //  This is Realations for the users Table ..
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('role_id')->references('id')->on('roles');
        });

        //  This  is all relations on the contacts table..
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('created_by_user')->references('id')->on('users');
            $table->foreign('reach_source_id')->references('id')->on('reach_sources');
            $table->foreign('status_id')->references('id')->on('statuses');
        });

        //  This is relations on the contact_service table..
        Schema::table('contact_service', function (Blueprint $table) {
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('service_id')->references('id')->on('services');
        });


      

        //  This is relations on the cities table..
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
