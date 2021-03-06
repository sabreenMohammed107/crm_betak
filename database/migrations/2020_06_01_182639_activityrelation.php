<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activityrelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is relations on the contact_activities table..
        Schema::table('contact_activities', function (Blueprint $table) {
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('activity_type_id')->references('id')->on('activities');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('todo_solved_by')->references('id')->on('users');
            $table->foreign('funnel_id')->references('id')->on('funnels');
            $table->foreign('activity_source_id')->references('id')->on('activity_sources');
        });

         //  This is relations on the activity_screenshots table..
         Schema::table('activity_screenshots', function (Blueprint $table) {
            $table->foreign('activity_id')->references('id')->on('contact_activities');
          
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
