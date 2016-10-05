<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDemograficoDetalle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demografico_detalle', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->smallInteger('status');
			$table->Integer('demografico_id')->unsigned();
			$table->foreign('demografico_id')->references('id')->on('demografico');
			$table->Integer('encuesta_id')->unsigned();
			$table->foreign('encuesta_id')->references('id')->on('encuesta');
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
		Schema::drop('demografico_detalle');
	}

}
