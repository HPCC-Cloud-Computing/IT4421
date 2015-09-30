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
		Schema::create('majors', function ($table) {

            $table->increments('id');
            $table->string('code',50);
            $table->integer('target',11);
            $table->string('condition');
            $table->string('info');
            

            //$table->string('title',100)->default("Room Title");
            //$table->string('genres',50)->default("Room Genres");//the loai nhac
           
            

            $table->nullableTimestamps();
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
