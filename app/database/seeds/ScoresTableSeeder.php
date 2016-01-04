<?php
Class ScoresTableSeeder extends Seeder
{
    
    public function run() {
        DB::table('exam_scores')->delete();
        
        $exam_scores = array();
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 30; $j++) {
                for ($k = 1; $k <= 6; $k++) {
                    $exam_score = array(
                        'student_id' => ($i - 1) * 30 + $j, 
                        'room_id' => $i, 
                        'subject_id' => $k, 
                        'score' => rand(1, 10),
                        'state' => 1
                    );
                    $exam_scores[] = $exam_score;
                }
            }
        }
        DB::table('exam_scores')->insert($exam_scores);
    }
}
?>