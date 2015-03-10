<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('category', function($table)
		// {
		// 	$table->increments('id');
		// 	$table->string('name',50)->unique();
		// 	$table->timestamps();
		// });
		// Schema::table('action', function($table)
		// {
		//     $table->integer('category_id')->unsigned();
		// 	$table->foreign('category_id')->references('id')->on('category');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('category');
		// Schema::table('action', function($table)
		// {
		//     $table->dropColumn('category_id');
		// });
	}

}
