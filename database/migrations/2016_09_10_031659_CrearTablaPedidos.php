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
			$table->double('subtotal');
			$table->double('iva');
			$table->integer('total_producto');
			$table->double('precio_total');
			$table->smallInteger('status');
			$table->Integer('id_usuario')->unsigned();
			$table->foreign('id_usuario')->references('id')->on('usuarios');
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
		Schema::drop('pedidos');
	}

}
