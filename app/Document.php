<?php namespace App;

use App\Requirement;
use Illuminate\Database\Eloquent\Model;

class Document extends Model {

	protected $table = 'document';

	protected $fillable = ['name', 'description','photo_path'];

}
