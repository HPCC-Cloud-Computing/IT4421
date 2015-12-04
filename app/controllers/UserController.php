<?php

class UserController extends \BaseController {

	public function changePassword($id) {
		$userData = array(
			'password' => Hash::make(Input::get('password')),
		);
		$this->update($id, $userData);
		return Redirect::back();
	}

	public function login() {

		// run the validation rules on the inputs from the form
		// dd(Input::all());
		$validator = Validator::make(Input::all(), User::$rules_login);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			Session::flash('error_login', 'Log In failed!!!');
			return Redirect::back();
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
			);
			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the  section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				$url_previous = Session::get("login_previous");
				Session::forget("login_previous");
				return Redirect::to($url_previous);
				// echo "true";
				return Redirect::back();
				return Redirect::to(URL::previous()); //test

			} else {

				// validation not successful, send back to form
				return Redirect::to('login');
				$password = Hash::make(Input::get('password'));
				echo json_encode($password);
				// echo "false";
				Session::flash('error_login', 'Log In failed!!!');
				return Redirect::back();
			}
		}
	}

	public function logout() {
		Auth::logout();
		//return Redirect::back();
		return Redirect::to('/');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
		//return User::all()->take(10);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add() {
		//
		//$userData = array(
		//'username' => Input::get('username'),
		//'email' => Input::get('email'),
		//'password' => Hash::make(Input::get('password')),
		//);

		//$user = new User($userData);
		//$user->save();
		//$user = User::create($userData);

		//tao room moi
		//$roomRestful = new RoomRestful; //?
		//$room = RoomRestful::add($user);

		//return $user;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function show($id)
	// {

	// 	$user = User::find($id);
	// 	if ($user->isAdmin()) {
	// 		return View::make('admin_profile')->with($user);
	// 	}

	// 	$userable = $user->userable();
	// 	$userable_type = $user->getUserableType();
	// 	$data = array('user'=> $user, 'userable'=> $userable)

	// 	if ($userable_type == 'student') {
	// 		//$studentController = new StudentController;
	// 		//return $studentController->show($user, $userable);
	// 		return View::make('student_profile')->with('data',$data);
	// 	}
	// 	elseif ($userable_type == 'university') {
	// 		//$universityController = new UniversityController;
	// 		//return $universityController->show($user, $userable);
	// 		return View::make('university_profile')->with('data',$data);
	// 	}
	// 	elseif ($userable_type == 'department') {
	// 		//$departmentController = new DepartmentController;
	// 		//return $departmentController->show($user, $userable);
	// 		return View::make('department_profile')->with('data',$data);
	// 	}
	// 	elseif ($userable_type == 'cluster')
	// 	{
	// 		//$clusterController = new ClusterController;
	// 		//return $clusterController->show($user, $userable);
	// 		return View::make('cluster_profile')->with('data',$data);
	// 	}
	// 	//$profile = $user->userable();
	// 	//$data = array('user' => $user, 'profile' => $profile);
	// 	//return $data;
	// }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, array $userData) {
		User::find($id)->update($userData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
