<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

	 Schema::create('blog', function($table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('src');
            $table->string('href');
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
		Schema::drop('usuarios');//
	}

}
