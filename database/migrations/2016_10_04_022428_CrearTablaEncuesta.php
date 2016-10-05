<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEncuesta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('encuesta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->Integer('modelo_id')->unsigned();
			$table->foreign('modelo_id')->references('id')->on('modelo');
			$table->smallInteger('status');
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
		Schema::drop('encuesta');
	}

}
