<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model {

	protected $table = 'requirement';

	public $timestamps = true;

	protected $fillable = ['action_id', 'document_id','is_optional'];

}
