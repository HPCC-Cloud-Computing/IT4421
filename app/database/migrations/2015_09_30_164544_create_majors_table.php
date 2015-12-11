<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('majors', function (Blueprint $table) {

            $table->increments('id');
            $table->string('code',20);
            $table->integer('university_id')->unsigned();
            $table->foreign('university_id')->references('id')->on('universities');
            $table->text('name');
            $table->integer('target');
            $table->string('combination',10);
            $table->text('condition');
            $table->text('info');
            

            //$table->string('title',100)->default("Room Title");
            //$table->string('genres',50)->default("Room Genres");//the loai nhac
           
            

            //$table->nullableTimestamps();
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
		Schema::dropIfExists('majors');
	}

}
