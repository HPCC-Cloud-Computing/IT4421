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
		Schema::create('student_profiles', function ($table) {

            $table->increments('id');
            $table->string('code',50);
            $table->string('lastname');
            $table->string('firstname');
            $table->integer('indentitycode');
            $table->date('birthday');
            $table->string('sex');
            $table->integer('department_id');
            $table->integer('cluster_id');
            $table->string('profile_code',50);
            $table->float('plusscore');
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
