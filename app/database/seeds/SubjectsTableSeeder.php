<?php

Class SubjectsTableSeeder extends Seeder{

	public function run(){

		DB::table('subjects')->delete();

		$subjects = array(
			array(
                'code'      => 'TOAN',
                'name'      => 'Môn Toán',
                'time'      => '2015-10-14 07:00:12'
            ),
            array(
                'code'      => 'LY',
                'name'      => 'Môn Vật Lý',
                'time'      => '2015-10-14 13:00:12'
            ),
            array(
                'code'      => 'HOA',
                'name'      => 'Môn Hóa Học',
                'time'      => '2015-10-15 7:00:12'
            ),
            array(
                'code'      => 'SINH',
                'name'      => 'Môn Sinh Học',
                'time'      => '2015-10-15 13:00:12'
            ),
            array(
                'code'      => 'VAN',
                'name'      => 'Môn Văn Học',
                'time'      => '2015-10-14 7:00:12'
            )
		);
		DB::table('subjects')->insert( $subjects );
	}
}

?>