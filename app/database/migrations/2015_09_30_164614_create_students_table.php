<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('students', function (Blueprint $table) {

            $table->increments('id');

            $table->string('profile_code',50);
            $table->string('registration_number',20)
            $table->string('lastname',50);
            $table->string('firstname',30);
            $table->string('indentity_code',20);
            $table->date('birthday');
            $table->string('sex',3);
            $table->float('plus_score');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
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
		Schema::dropIfExists(('students');
	}

}
