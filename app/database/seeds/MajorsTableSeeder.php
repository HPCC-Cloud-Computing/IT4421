<?php

Class MajorsTableSeeder extends Seeder{

	public function run(){

		DB::table('majors')->delete();

		$majors = array(
			array(
                'code'               => 'KT01',
                'university_id'      => 1,
                'target'             => 1000,
                'combidation'        => '{"1":"A"}',
                'condition'          => 'điểm trung bình 3 năm cấp 3 lớn hơn 7',
                'info'               => 'Ai hỏi em em học trường nào đấy...Trường của chúng là trường Bách Khoa'
            ),
            array(
                'code'               => 'KT02',
                'university_id'      => 1,
                'target'             => 1000,
                'combidation'        => '{"1":"A"}',
                'condition'          => 'điểm trung bình 3 năm cấp 3 lớn hơn 7',
                'info'               => 'Ai hỏi em em học trường nào đấy...Trường của chúng là trường Bách Khoa'
            ),
            array(
                'code'               => 'NEU01',
                'university_id'      => 2,
                'target'             => 450,
                'combidation'        => '{"1":"A", "2":"A1"}',
                'condition'          => '',
                'info'               => ''
            ),
            array(
                'code'               => 'NEU02',
                'university_id'      => 2,
                'target'             => 300,
                'combidation'        => 'A',
                'condition'          => '',
                'info'               => ''
            )
          
		);
		DB::table('majors')->insert( $majors );
	}
}

?>