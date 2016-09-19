<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cantidad_producto');
			$table->double('subtotal');
			$table->double('iva');
			$table->smallInteger('id_usuario')->unsigned();
			$table->smallInteger('id_producto')->unsigned();
			$table->smallInteger('status');
			$table->foreign('id_usuario')->references('id')->on('usuarios');
			$table->foreign('id_producto')->references('id')->on('productos');
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
		Schema::drop('pedidos');
	}

}
