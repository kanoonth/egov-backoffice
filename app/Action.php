<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model {

	protected $table = 'action';

	protected $fillable = ['name', 'description'];

}
