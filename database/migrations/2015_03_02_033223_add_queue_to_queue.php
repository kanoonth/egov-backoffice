<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQueueToQueue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		 DB::table('queue')->insert(array(
		 				'place_id'=>'0',
                        'identification_no'=>'1100200863077',
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
	}

}
