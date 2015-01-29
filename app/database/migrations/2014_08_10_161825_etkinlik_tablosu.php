<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EtkinlikTablosu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',100);
			$table->text('description');
			$table->string('link',80);
			$table->string('date',50);
			$table->string('lang',3);
			$table->integer('key');
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
		Schema::drop('calendar');
	}

}
