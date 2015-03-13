<?php namespace App;

use App\Action;
use App\Requirement;
use App\Document;
use App\Category;
use App\Available;
use Illuminate\Database\Eloquent\Model;

class Action extends Model {

	protected $table = 'action';

	public $timestamps = true;

	protected $fillable = ['name', 'description','category_id'];


}
