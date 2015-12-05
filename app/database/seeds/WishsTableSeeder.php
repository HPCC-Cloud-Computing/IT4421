<?php

Class WishsTableSeeder extends Seeder{

	public function run(){

		DB::table('wishs')->delete();

		$wishs = array(
			array(
                'student_id'    => 1,
                'major_id'      => 1,
                'sumscore'      => 25.5,
                'number_order' => 1
            ),
            array(
                'student_id'    => 2,
                'major_id'      => 1,
                'sumscore'      => 26.5,
                'number_order' => 1
            ),
            array(
                'student_id'    => 3,
                'major_id'      => 1,
                'sumscore'      => 27.5,
                'number_order' => 1
            ),
            array(
                'student_id'    => 4,
                'major_id'      => 1,
                'sumscore'      => 23.5,
                'number_order' => 2
            ),
            array(
                'student_id'    => 4,
                'major_id'      => 2,
                'sumscore'      => 23.5,
                'number_order' => 1
            ),
            array(
                'student_id'    => 5,
                'major_id'      => 1,
                'sumscore'      => 19.5,
                'number_order' => 1
            ),
            array(
                'student_id'    => 7,
                'major_id'      => 1,
                'sumscore'      => 20,
                'number_order' => 1
            ),
            array(
                'student_id'    => 8,
                'major_id'      => 1,
                'sumscore'      => 25,
                'number_order' => 1
            ),
            array(
                'student_id'    => 1,
                'major_id'      => 2,
                'sumscore'      => 18,
                'number_order' => 2
            ),
		);
		DB::table('wishs')->insert( $wishs );
	}
}

?>