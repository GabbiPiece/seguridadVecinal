<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

	 Schema::create('usuario', function($table) {
            $table->increments('ide_usuario');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('celular');
						$table->string('direccion');
            $table->string('zona_id');
            $table->string('usuario');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->timestamp('update_at');
            $table->integer('active');
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
		Schema::drop('usuarios');//
	}

}
