<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEncuestaDetalle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('encuesta_detalle', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('valor');
			$table->Integer('encuesta_id')->unsigned();
			$table->foreign('encuesta_id')->references('id')->on('encuesta');
			$table->Integer('modelo_id')->unsigned();
			$table->foreign('modelo_id')->references('id')->on('modelo');
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
		Schema::drop('encuesta_detalle');
	}

}
