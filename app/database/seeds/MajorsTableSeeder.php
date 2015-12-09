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
            )
          
		);
		DB::table('majors')->insert( $majors );
	}
}

?>