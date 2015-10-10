<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamroomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('rooms', function (Blueprint $table) {

            $table->increments('id');
            $table->string('code',20);
            $table->text('address');
            $table->integer('cluster_id')->unsigned();
            $table->foreign('cluster_id')->references('id')->on('clusters');
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
		Schema::dropIfExists('rooms');
	}

}
