<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDemografico extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demografico', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->smallInteger('status');
			$table->Integer('id_encuesta')->unsigned();
			$table->foreign('id_encuesta')->references('id')->on('encuesta');
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
		Schema::drop('demografico');
	}

}
