<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalisilanlarTablosu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worked', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('lesson_id');
			$table->integer('user_id');
			$table->string('time',10);		
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
		Schema::drop('worked');
	}

}
