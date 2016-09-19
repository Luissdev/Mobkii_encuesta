<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNegocio extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('negocio', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('descripcion');
			$table->smallInteger('status');
			$table->rememberToken();
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
		Schema::drop('negocio');
	}

}
