<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('queue', function($table)
		{
			$table->increments('queue_id');
			$table->integer('place_id')->unsigned();
			$table->foreign('place_id')->references('place_id')->on('place');
			$table->integer('action_id')->unsigned();
			$table->foreign('action_id')->references('action_id')->on('action');
			$table->string('queue_code',30);
			$table->dateTime('time_added');
			$table->dateTime('appointment_time');
			$table->string('identification_no',13);
			$table->string('phone_no',13);
			$table->integer('status');
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
		Schema::drop('queue');
	}

}
