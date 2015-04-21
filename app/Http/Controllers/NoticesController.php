<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NoticesController extends Controller {

	/**
		* Create a new notices controller instance
	**/
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
		* Show all notices
		*
		* @return string
	**/

	public function index()
	{
		return 'All notices';
	}

	/**
		* Show a page to create a new notice
		*
		* @return \Response
	**/
	public function create()
	{
		// get list of providers

		// load a view to create a new notice
		return view('notices.create');
	}

}
