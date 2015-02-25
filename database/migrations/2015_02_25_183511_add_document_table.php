<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('document')->insert(array(
			'name'=>'test1',
			'description'=>'test1',
			'photo_path'=>'test1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('document')->insert(array(
			'name'=>'test2',
			'description'=>'test2',
			'photo_path'=>'test2',
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
		DB::table('document')->where('name','=','test1')->delete();
		DB::table('document')->where('name','=','test2')->delete();
	}

}
