<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('wishs', function (Blueprint $table) {

            $table->increments('id');
           
            $table->integer('student_id',20)->unsigned();
            $table->foreign('student_id')->references('id')->on('student');
            $table->integer('major_id')->unsigned();
            $table->foreign('major_id')->references('id')->on('majors');
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
		Schema::dropIfExists(('wishs');
	}

}
