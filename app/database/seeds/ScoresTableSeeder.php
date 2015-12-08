<?php

Class ScoresTableSeeder extends Seeder{

	public function run(){
		DB::table('exam_scores')->delete();

		$rooms = array(
			array(
                'student_id'      => 4,
                'room_id'      => 1,
                'subject_id' => 1,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 4,
                'room_id'      => 1,
                'subject_id' => 2,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 4,
                'room_id'      => 1,
                'subject_id' => 3,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 4,
                'room_id'      => 1,
                'subject_id' => 4,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 4,
                'room_id'      => 1,
                'subject_id' => 5,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 4,
                'room_id'      => 1,
                'subject_id' => 6,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 5,
                'room_id'      => 1,
                'subject_id' => 1,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 5,
                'room_id'      => 1,
                'subject_id' => 2,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 5,
                'room_id'      => 1,
                'subject_id' => 3,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 5,
                'room_id'      => 1,
                'subject_id' => 4,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 5,
                'room_id'      => 1,
                'subject_id' => 5,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 5,
                'room_id'      => 1,
                'subject_id' => 6,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 6,
                'room_id'      => 1,
                'subject_id' => 1,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 6,
                'room_id'      => 1,
                'subject_id' => 2,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 6,
                'room_id'      => 1,
                'subject_id' => 3,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 6,
                'room_id'      => 1,
                'subject_id' => 4,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 6,
                'room_id'      => 1,
                'subject_id' => 5,
                'score' => 10,
                'state' => 0
            ),
            array(
                'student_id'      => 6,
                'room_id'      => 1,
                'subject_id' => 6,
                'score' => 10,
                'state' => 0
            )
		);
		DB::table('exam_scores')->insert( $rooms );
	}
}
?>