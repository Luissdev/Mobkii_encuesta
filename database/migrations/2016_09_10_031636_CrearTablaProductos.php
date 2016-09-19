<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('imagen');
			$table->string('descripcion');
			$table->double('precio');
			$table->smallInteger('status');
			$table->Integer('id_negocio')->unsigned();
			$table->foreign('id_negocio')->references('id')->on('negocio');			
			$table->Integer('id_categoria')->unsigned();
			$table->foreign('id_categoria')->references('id')->on('categorias');
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
		Schema::drop('productos');
	}

}
