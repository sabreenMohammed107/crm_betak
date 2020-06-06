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
            $table->foreign('activity_id')->references('id')->on('contact_activitie');
            $table->foreign('service_id')->references('id')->on('activities');
          
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
