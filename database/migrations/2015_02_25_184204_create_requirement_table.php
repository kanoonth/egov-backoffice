<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requirement', function($table)
		{
			$table->integer('document_id')->unsigned();
			$table->foreign('document_id')->references('document_id')->on('document');
			$table->integer('action_id')->unsigned();
			$table->foreign('action_id')->references('action_id')->on('action');
			$table->boolean('is_optional');
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
		Schema::drop('requirement');
	}

}
