<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenulerTablosu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('top_menu')->nullable()->default(Null);
			$table->integer('article_id')->default(0);
			$table->string('name',100);
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
		Schema::drop('menu');
	}

}
