<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
 */

App::before(function ($request) {
	//
});

App::after(function ($request, $response) {
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
 */

Route::filter('auth', function () {
	if (Auth::guest()) {
		if (Request::ajax()) {
			return Response::make('Unauthorized', 401);
		} else {
			Session::flash('message', 'Ban can dang nhap de truy cap chuc nang nay!');
			Session::flash('alert-class', 'alert-danger');
			return Redirect::to('/');
		}
	}
});

////////// filter theo user_type //////////////////////

Route::filter('minister', function () {
	if (strtolower(Auth::user()->userable_type) != 'minister') {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Authorized failed!!!');
		return Redirect::to('/');
	}
});

Route::filter('cluster', function () {
	if (strtolower(Auth::user()->userable_type) != 'cluster') {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Authorized failed!!!');
		return Redirect::to('/');
	}
});

Route::filter('department', function () {
	if (strtolower(Auth::user()->userable_type) != 'department') {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Authorized failed!!!');
		return Redirect::to('/');
	}
});

Route::filter('university', function () {
	if (strtolower(Auth::user()->userable_type) != 'university') {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Authorized failed!!!');
		return Redirect::to('/');
	}
});

Route::filter('student', function () {
	if (strtolower(Auth::user()->userable_type) != 'student') {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Authorized failed!!!');
		return Redirect::to('/');
	}
});

////////// filter theo timeline scheduler //////////////////////

Route::filter('truoc_tuyen_sinh', function () {
	$check = 1;
	$scheduler = Phase::where('code', '1')->first();
	$date = date("Y-m-d");
	// dd($date);
	if ($scheduler->state == 'off') {
		$check = 0;
	} else if ($scheduler->state == 'auto') {
		if (($date < $scheduler->starttime) || ($date > $scheduler->endtime)) {
			$check = 0;
		}
	}
	if (!$check) {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Chuc nang bi vo hieu hoa trong khoang thoi gian nay!!!');
		return Redirect::back();
	}
});

Route::filter('trong_tuyen_sinh', function () {
	$check = 1;
	$scheduler = Phase::where('code', '2')->first();
	$date = date("Y-m-d");
	// dd(($date < $scheduler->starttime) || ($date > $scheduler->endtime));
	if ($scheduler->state == 'off') {
		$check = 0;
	} else if ($scheduler->state == 'auto') {
		if (($date < $scheduler->starttime) || ($date > $scheduler->endtime)) {
			$check = 0;
		}
	}
	// dd($check);
	if (!$check) {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Chuc nang bi vo hieu hoa trong khoang thoi gian nay!!!');
		return Redirect::back();
	}
});

Route::filter('sau_tuyen_sinh', function () {
	$check = 1;
	$scheduler = Phase::where('code', '3')->first();
	$date = date("Y-m-d");
	// dd($date);
	if ($scheduler->state == 'off') {
		$check = 0;
	} else if ($scheduler->state == 'auto') {
		if (($date < $scheduler->starttime) || ($date > $scheduler->endtime)) {
			$check = 0;
		}
	}
	if (!$check) {
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Chuc nang bi vo hieu hoa trong khoang thoi gian nay!!!');
		return Redirect::back();
	}
});

Route::filter('auth.basic', function () {
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
 */

Route::filter('guest', function () {
	if (Auth::check()) {
		return Redirect::to('/');
	}

});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
 */

Route::filter('csrf', function () {
	if (Session::token() != Input::get('_token')) {
		throw new Illuminate\Session\TokenMismatchException;
	}
});
