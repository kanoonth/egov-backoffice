<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('transaction')->insert(array(
			'type'=>'S',
			'content'=>'SELECT * FROM test',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('transaction')->insert(array(
			'type'=>'F',
			'content'=>'http://google.co.th',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('transaction')->where('type','=','S')->delete();
		DB::table('transaction')->where('type','=','F')->delete();
	}

}
