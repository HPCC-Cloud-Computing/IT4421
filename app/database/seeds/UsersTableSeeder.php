<?php

Class UsersTableSeeder extends Seeder{

	public function run(){
		DB::table('users')->delete();

		$users = array(
			array(
                'username'      => 'bka2016',
                'password'      => md5('bka@2016'),
                'email' => 'bka@mail.gov.vn',
                'userable_id'   => 1,
                'userable_type' => 'cluster'
            ),
            array(
                'username'      => 'kha2016',
                'password'      => md5('kha@2016'),
                'email' => 'kha@mail.gov.vn',
                'userable_id'   => 2,
                'userable_type' => 'cluster'
            ),
            array(
                'username'      => 'hndepartment',
                'password'      => md5('123456'),
                'email' => 'hn_department@mail.gov.vn',
                'userable_id'   => 62,
                'userable_type' => 'department'
            ),
            array(
                'username'      => 'daidv',
                'password'      => md5('vandai123'),
                'email' => 'daikk11@gmail.com',
                'userable_id'   => 1,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'kiennv',
                'password'      => md5('123456'),
                'email' => 'kienv@gmail.com',
                'userable_id'   => 2,
                'userable_type' => 'student'
            ),
            array(
                'username'      => 'binhnq',
                'password'      => md5('123456'),
                'email' => 'binh@gmail.com',
                'userable_id'   => 13,
                'userable_type' => 'student'
            )
            
		);
		DB::table('users')->insert( $users );
	}
}

?>