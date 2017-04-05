<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table){

           $table->increments('id');
           $table->string('responder_name')->nullable();
           $table->integer('servey_id')->nullable();
           $table->integer('question_id')->nullable();
           $table->integer('answer_id')->nullable();
           $table->string('status')->nullable();
           $table->string('result')->nullable();
           $table->integer('plened_time')->nullable();
           $table->integer('spent_time')->nullable();
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
        Schema::dropIfExists('results');
    }
}
