<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return User::all()->take(10);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$userData = array(
        	'username' => Input::get('username'), 
        	'email' => Input::get('email'),
        	'password' => Hash::make(Input::get('password')),
        	);

        //$user = new User($userData);
        //$user->save();
        $user = User::create($userData);

        //tao room moi
        //$roomRestful = new RoomRestful; //?
       	//$room = RoomRestful::store($user);

        return $user;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$user = User::find($id);
		$userable = $user->userable();
		$userable_type = $user->getUserableType();
		if ($userable_type == 'student') {
			$studentController = new StudentController;
			return $studentController->show($user, $userable);
		}
		elseif ($userable_type == 'university') {
			$universityController = new UniversityController;
			return $universityController->show($user, $userable);
		}
		elseif ($userable_type == 'department') {
			$departmentController = new DepartmentController;
			return $departmentController->show($user, $userable);
		}
		else{
			$clusterController = new ClusterController;
			return $clusterController->show($user, $userable);
		}
		//$profile = $user->userable();
		//$data = array('user' => $user, 'profile' => $profile);
		//return $data;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
