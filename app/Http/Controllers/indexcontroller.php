<?php namespace App\Http\Controllers;

use Config;

use Response;

use Request;

use DB;

use App\User;

use Input;

use Action;

use View;

use Cookie;

use Redirect;

use Mail;




class indexcontroller extends Controller {

public function index()

	

	{
		return view('welcome');
		
		
	}
	
	
	



}



?>