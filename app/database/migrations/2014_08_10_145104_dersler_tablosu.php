<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DerslerTablosu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lesson', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('top_lesson')->nullable()->default(null);
			$table->integer('content_id')->default(0);
			$table->integer('categories_id')->default(0);
			$table->string('name',100);
			$table->integer('date');
			$table->string('link',100);
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
		Schema::drop('lesson');
	}

}
