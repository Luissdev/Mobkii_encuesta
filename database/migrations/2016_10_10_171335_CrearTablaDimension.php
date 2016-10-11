<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDimension extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dimension', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('dimension');
			$table->smallInteger('status');
			$table->Integer('modelo_id')->unsigned();
			$table->foreign('modelo_id')->references('id')->on('modelo');
			$table->smallInteger('padre_id')->unsigned();
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
		Schema::drop('dimension');
	}

}
