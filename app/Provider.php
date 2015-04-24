<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model {

	/**
	* No timestamps for a provider
	*
	* @var bool
	*/
	public $timestamps = false;

	/**
	* Fillable for a provider
	*
	* @var bool
	*/

	protected $fillable = [
		'name',
		'copyright_email'
	];

}
