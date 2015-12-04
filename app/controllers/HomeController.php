<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		if(isset(Auth::user()->userable_type)){
			if (Auth::user()->userable_type == 'minister')
				return Redirect::to('/st-admin/minis');
			if (Auth::user()->userable_type == 'department')
				return Redirect::to('/st-admin/depart');
			if (Auth::user()->userable_type == 'cluster')
				return Redirect::to('/st-admin/clus');
			if (Auth::user()->userable_type == 'university')
				return Redirect::to('/st-admin/uni');
		}
		$notices = Notice::orderBy('id', 'desc')->take(3)->get();
		$phases = Phase::all();
		$data = array(
				'notices'=>$notices
			);
		return View::make('pages.home',$data);
	}

	public function checkCaptra()
	{
		if(isset(Input::get('g-recaptcha-response'))) {
			$captra = Input::get('g-recaptcha-response');
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=YOUR SECRET KEY&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        if($response.success==false)
	        {
	          echo '<h2>You are spammer ! Get the @$%K out</h2>';
	        }else
	        {
	          echo '<h2>Thanks for posting comment.</h2>';
	        }
		}
	}
}
