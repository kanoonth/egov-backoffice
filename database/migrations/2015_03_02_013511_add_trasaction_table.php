<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrasactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('transaction')->insert(array(
			'type'=>'S',
			'content'=>'CREATE TABLE Category(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT);',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('transaction')->insert(array(
			'type'=>'S',
			'content'=> 'CREATE TABLE Action(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT,category_id INTEGER);',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('transaction')->insert(array(
			'type'=>'S',
			'content'=>'CREATE TABLE Requirement(action_id INTEGER, document_id INTEGER, is_optional INTEGER);',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('transaction')->insert(array(
			'type'=>'S',
			'content'=>'CREATE TABLE Document(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT, photo_path TEXT);',
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
	}

}
