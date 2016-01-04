<?php

Class UsersTableSeeder extends Seeder{

	public function run(){
		DB::table('users')->delete();

		$users = array(
			array(
                'username'      => 'bka2016',
                'password'      => Hash::make('bka@2016'),
                'email' => 'bka@mail.gov.vn',
                'userable_id'   => 1,
                'userable_type' => 'cluster'
            ),
            array(
                'username'      => 'kha2016',
                'password'      => Hash::make('kha@2016'),
                'email' => 'kha@mail.gov.vn',
                'userable_id'   => 2,
                'userable_type' => 'cluster'
            ),
            array(
                'username'      => 'hndepartment',
                'password'      => Hash::make('123456'),
                'email' => 'hn_department@mail.gov.vn',
                'userable_id'   => 62,
                'userable_type' => 'department'
            ),
            array(
                'username'      => 'daidv',
                'password'      => Hash::make('vandai123'),
                'email' => 'daikk11@gmail.com',
                'userable_id'   => 1,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'kiennv',
                'password'      => Hash::make('123456'),
                'email' => 'kienv@gmail.com',
                'userable_id'   => 2,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'kiennq',
                'password'      => Hash::make('123456'),
                'email' => 'kiennq@gmail.com',
                'userable_id'   => 3,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'kiennt',
                'password'      => Hash::make('123456'),
                'email' => 'kiennt@gmail.com',
                'userable_id'   => 4,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'thangnq',
                'password'      => Hash::make('123456'),
                'email' => 'thangnq@gmail.com',
                'userable_id'   => 23,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'luannh',
                'password'      => Hash::make('123456'),
                'email' => 'luannh@gmail.com',
                'userable_id'   => 36,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'thangmh',
                'password'      => Hash::make('123456'),
                'email' => 'thangmh@gmail.com',
                'userable_id'   => 31,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'huannt',
                'password'      => Hash::make('123456'),
                'email' => 'huannt@gmail.com',
                'userable_id'   => 44,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'anhcs',
                'password'      => Hash::make('123456'),
                'email' => 'anhcs@gmail.com',
                'userable_id'   => 60,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'taimh',
                'password'      => Hash::make('123456'),
                'email' => 'taimh@gmail.com',
                'userable_id'   => 71,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'binhnq',
                'password'      => Hash::make('123456'),
                'email' => 'binh@gmail.com',
                'userable_id'   => 13,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'bkhn',
                'password'      => Hash::make('123456'),
                'email' => 'bkhn@mail.edu.com',
                'userable_id'   => 1,
                'userable_type' => 'university'
            ),
            array(
                'username'      => 'ktqd',
                'password'      => Hash::make('123456'),
                'email' => 'ktqd@edu.com',
                'userable_id'   => 2,
                'userable_type' => 'university'
            )
            ,
            array(
                'username'      => 'minister',
                'password'      => Hash::make('123456'),
                'email' => 'gov@edu.com',
                'userable_id'   => 1,
                'userable_type' => 'minister'
            )
		);
		DB::table('users')->insert( $users );
	}
}

?>