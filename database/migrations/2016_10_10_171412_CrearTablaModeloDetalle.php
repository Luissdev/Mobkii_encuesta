<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaModeloDetalle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modelo_detalle', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pregunta');
			$table->Integer('sg');
			$table->Integer('ic');
			$table->Integer('modelo_id')->unsigned();
			$table->foreign('modelo_id')->references('id')->on('modelo');
			$table->Integer('dimension_id')->unsigned();
			$table->foreign('dimension_id')->references('id')->on('dimension');
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
		Schema::drop('modelo_detalle');
	}

}
