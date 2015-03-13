<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	protected $table = 'transaction';

	public $timestamps = true;

	//protected $fillable = ['name', 'description','photo_path'];

}
