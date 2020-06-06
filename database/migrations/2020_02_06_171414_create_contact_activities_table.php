<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('activity_type_id')->unsigned()->nullable();
            $table->dateTime('activity_date', 6)->nullable();
            $table->integer('ingoing_outgoining_flag')->nullable();
            $table->integer('activity_type')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('priority')->nullable();
            $table->string('facebook_url', 250)->nullable();
            $table->integer('assigned_to')->unsigned()->nullable();
            $table->integer('todo_status_id')->unsigned()->nullable();
            $table->integer('todo_solved_by')->unsigned()->nullable();
            $table->dateTime('max_todo_date', 6)->nullable();
            $table->integer('activity_source_id')->unsigned()->nullable();
            $table->string('notes', 1000)->nullable();
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
        Schema::dropIfExists('contact_activities');
    }
}
