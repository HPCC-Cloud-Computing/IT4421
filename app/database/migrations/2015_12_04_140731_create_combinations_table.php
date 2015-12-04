<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('combinations', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name',50);
            $table->integer('id_subject1');
            $table->integer('id_subject2');
            $table->integer('id_subject3');
            $table->foreign('id_subject1')->references('id')->on('subjects');
            $table->foreign('id_subject2')->references('id')->on('subjects');
            $table->foreign('id_subject3')->references('id')->on('subjects');
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
		Schema::dropIfExists('combinations');
	}

}
