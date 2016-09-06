<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('alerta', function($table) {
            $table->increments('ale_id');
						$table->string('ale_direccion');
            $table->string('ale_mensaje');
            $table->integer('zona_id');
            $table->integer('tipo_id');
            $table->integer('ide_usuario');            
           	//
               });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alerta');////
	}

}
