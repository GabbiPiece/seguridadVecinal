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
            $table->string('ale_mensaje');
            $table->string('ale_tipo');
            $table->string('ale_calle');
            $table->string('ale_numero');
            $table->string('zona_barrio');
            $table->string('usuario');
            
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
