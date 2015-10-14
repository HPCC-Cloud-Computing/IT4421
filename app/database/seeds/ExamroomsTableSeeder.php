<?php

Class ExamroomsTableSeeder extends Seeder{

	public function run(){
		DB::table('rooms')->delete();

		$rooms = array(
			array(
                'code'      => 'HUST001',
                'address'      => 'D9 501 ĐH Bách Khoa Hà Nội, cho leo tầng 5 nhé =))'
                'cluster_id' => 1
            ),
            array(
                'code'      => 'HUST002',
                'address'      => 'D9 502 ĐH Bách Khoa Hà Nội, cho leo tầng 5 nhé =))'
                'cluster_id' => 1
            ),
            array(
                'code'      => 'HUST003',
                'address'      => 'Phòng 201 THPT Phương Mai'
                'cluster_id' => 1
            ),
            array(
                'code'      => 'HUST004',
                'address'      => 'Phòng 202 THPT Phương Mai'
                'cluster_id' => 1
            )
		);
		DB::table('rooms')->insert( $array );
	}
}

?>