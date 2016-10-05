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
			$table->Integer('id_demografico')->unsigned();
			$table->foreign('id_demografico')->references('id')->on('demografico');
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
