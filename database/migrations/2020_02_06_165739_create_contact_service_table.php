<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_service', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('service_id')->unsigned()->nullable();
            $table->string('notes', 700)->nullable();
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
        Schema::dropIfExists('contact_service');
    }
}
