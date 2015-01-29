<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KullanicilarTablosu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',80);
			$table->string('fullname',80);
			$table->string('email',30);
			$table->string('password',100);
			$table->string('number',20);
			$table->string('phone',20);
			$table->smallInteger('class_id');
			$table->string('remember_token',100);
			$table->smallInteger('status')->default(0);		
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
		Schema::drop('users');
	}

}
