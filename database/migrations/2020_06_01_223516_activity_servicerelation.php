<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivityServicerelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //  This is relations on the activity_services table..
         Schema::table('activity_services', function (Blueprint $table) {
            $table->foreign('activity_id')->references('id')->on('contact_activities');
            $table->foreign('service_id')->references('id')->on('activities');
          
        });

        //  This is Realations for the todo_statuses Table ..
        Schema::table('todo_statuses', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

        //  This is Realations for the activity_sources Table ..
        Schema::table('activity_sources', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

         //  This is Realations for the countries Table ..
         Schema::table('countries', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });


         //  This is Realations for the cities Table ..
         Schema::table('cities', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

         //  This is Realations for the reach_sources Table ..
         Schema::table('reach_sources', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

        //  This is Realations for the nationalities Table ..
        Schema::table('nationalities', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

        //  This is Realations for the titles Table ..
        Schema::table('titles', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

         //  This is Realations for the activities Table ..
         Schema::table('activities', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });
         //  This is Realations for the statuses Table ..
         Schema::table('statuses', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });
      

         //  This is Realations for the faqs Table ..
         Schema::table('faqs', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });


         //  This is Realations for the services Table ..
         Schema::table('services', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

        //  This is Realations for the contacts Table ..
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
        });

        //  This is Realations for the roles Table ..
        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
           
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
