<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('phases', function (Blueprint $table) {

            $table->increments('id');
            $table->string('code',20)
            $table->text('name');
            $table->string('state');
            $table->date('starttime');
            $table->date('endtime');
            
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
		Schema::dropIfExists(('phases');
	}

}
