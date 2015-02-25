<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('available', function($table)
		{
			$table->integer('place_id')->unsigned();
			$table->foreign('place_id')->references('place_id')->on('place');
			$table->integer('action_id')->unsigned();
			$table->foreign('action_id')->references('action_id')->on('action');
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
		Schema::drop('available');
	}

}
