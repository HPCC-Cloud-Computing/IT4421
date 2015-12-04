<?php

Class CombinationsTableSeeder extends Seeder{

	public function run(){
		DB::table('combinations')->delete();

		$combinations = array(
			array(
                'name'      => 'A',
                'id_subject1'      => 1,
                'id_subject2' => 2,
                'id_subject3' => 3
            ),
            array(
                'name'      => 'A1',
                'id_subject1'      => 1,
                'id_subject2' => 2,
                'id_subject3' => 6
            ),
            array(
                'name'      => 'B',
                'id_subject1'      => 1,
                'id_subject2' => 3,
                'id_subject3' => 4
            ),
            array(
                'name'      => 'C',
                'id_subject1'      => 5,
                'id_subject2' => 7,
                'id_subject3' => 8
            ),
            array(
                'name'      => 'D',
                'id_subject1'      => 1,
                'id_subject2' => 5,
                'id_subject3' => 6
            )
		);
		DB::table('combinations')->insert( $combinations );
	}
}
?>