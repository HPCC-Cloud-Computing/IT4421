<?php

Class StudentsTableSeeder extends Seeder{

	public function run(){

		DB::table('students')->delete();

        $lastname_array = array(
            'Kiên',
            'Bình',
            'Thắng',
            'Luân',
            'Huân',
            'Anh',
            'Tài',
            'Hiền',
            'Huyền',
            'Hương',
            'Mai',
            'Đào'
            );
        $firstname_array = array(
            'Nguyễn Văn',
            'Nguyễn Quang',
            'Nguyễn Thế',
            'Nguyễn Thị',
            'Nguyễn Hoàng',
            'Trần Văn', 
            'Trần Thị',
            'Trần Thế',
            'Cao Siêu',
            'Mạc Hồng'
            );

		$students = array(
			array(
                'profile_code'              => 'xyz7628h32',
                'registration_number'       => 'TDV6789',
                'lastname'                  => 'Đại',
                'firstname'                 => 'Đặng Văn',
                'indentity_code'            => '184053674',
                'birthday'                  => '1994-06-19',
                'sex'                       => 'nam',
                'plus_score'                => 1.5,
                'department_id'             => 22
            )
		);
        $n = sizeof($lastname_array);
        $m = sizeof($firstname_array);
        for ($i=0; $i < $n ; $i++) { 
            for ($j=0; $j < $m ; $j++) { 
                $id = (string)($i).(string)($j); // tạo một string ghép 2 số lại, định danh
                $student = array(

                'profile_code'              => md5($id),
                'registration_number'       => $id,
                'lastname'                  => $lastname_array[$i],
                'firstname'                 => $firstname_array[$j],
                'indentity_code'            => '184053674',
                'birthday'                  => '1994-06-19',
                'sex'                       => 'nam',
                'plus_score'                => 0.5,
                'department_id'             => 62 #rand(1,60)
                );

                $students[] = $student;
            }
        }
		DB::table('students')->insert( $students );
	}
}

?>