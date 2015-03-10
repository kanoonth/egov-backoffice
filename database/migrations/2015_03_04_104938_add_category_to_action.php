<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryToAction extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	// 	Schema::table('action', function($table)
	// 	{
	// 	    $table->integer('category_id')->unsigned();
	// 		$table->foreign('category_id')->references('id')->on('category');
	// 	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('action', function($table)
		// {
		//     $table->dropColumn('category_id');
		// });
	}

}
