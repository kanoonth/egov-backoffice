<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('place')->insert(array(
			'name'=>'test1',
			'description'=>'test1',
			'full_address'=>'test1',
			'latitude'=>'5.23',
			'longitude'=>'6.73',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('place')->insert(array(
			'name'=>'test2',
			'description'=>'test2',
			'full_address'=>'test2',
			'latitude'=>'10.98',
			'longitude'=>'9.83',
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
		DB::table('place')->where('name','=','test1')->delete();
		DB::table('place')->where('name','=','test2')->delete();
	}

}
