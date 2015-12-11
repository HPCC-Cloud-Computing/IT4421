<?php

Class MajorsTableSeeder extends Seeder{

	public function run(){

		DB::table('majors')->delete();

		$majors = array(
			array(
                'code'               => 'KT01',
                'university_id'      => 1,
                'name'               => 'Kỹ thuật 1',
                'target'             => 1000,
                'combination'        => 'A',
                'condition'          => 'điểm trung bình 3 năm cấp 3 lớn hơn 7',
                'info'               => 'Ai hỏi em em học trường nào đấy...Trường của chúng là trường Bách Khoa'
            ),
            array(
                'code'               => 'KT02',
                'university_id'      => 1,
                'name'               => 'Kỹ thuật 2',
                'target'             => 1000,
                'combination'        => 'A',
                'condition'          => 'điểm trung bình 3 năm cấp 3 lớn hơn 7',
                'info'               => 'Ai hỏi em em học trường nào đấy...Trường của chúng là trường Bách Khoa'
            ),
            array(
                'code'               => 'NEU01',
                'university_id'      => 2,
                'name'               => 'Kinh tế 1',
                'target'             => 450,
                'combination'        => 'A|A1',
                'condition'          => '',
                'info'               => ''
            ),
            array(
                'code'               => 'NEU02',
                'university_id'      => 2,
                'name'               => 'Kinh tế 2',
                'target'             => 300,
                'combination'        => 'A',
                'condition'          => '',
                'info'               => ''
            ),
            array(
                'code'               => 'D520503',
                'university_id'      => 3,
                'name'               => 'Kỹ thuật trắc địa - bản đồ',
                'target'             => 100,
                'combination'        => 'A',
                'condition'          => '',
                'info'               => ''
            ),
            array(
                'code'               => 'D480201',
                'university_id'      => 3,
                'name'               => 'Công nghệ thông tin',
                'target'             => 200,
                'combination'        => 'A',
                'condition'          => '',
                'info'               => ''
            ),
            array(
                'code'               => 'D440224',
                'university_id'      => 3,
                'name'               => 'Thủy văn',
                'target'             => 100,
                'combination'        => 'A',
                'condition'          => '',
                'info'               => ''
            )
            ,
            array(
                'code'               => 'D340101',
                'university_id'      => 3,
                'name'               => 'Quản trị kinh doanh',
                'target'             => 150,
                'combination'        => 'A',
                'condition'          => '',
                'info'               => ''
            )
		);
		DB::table('majors')->insert( $majors );
	}
}

?>