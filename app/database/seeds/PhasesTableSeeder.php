<?php

Class PhasesTableSeeder extends Seeder{

	public function run(){
		DB::table('phases')->delete();

        /*state co the la: wait|active|end. Ae xem them*/
		$combinations = array(
			array(
                'code'      => 'PHASE1',
                'name'      => 'Trước tuyển sinh',
                'state' => 'on',
                'starttime' => '2015-4-1',
                'endtime' => '2015-6-30'
            ),
            array(
                'code'      => 'PHASE2',
                'name'      => 'Trong đợt thi',
                'state' => 'on',
                'starttime' => '2015-7-1',
                'endtime' => '2015-7-31'
            ),
            array(
                'code'      => 'PHASE3',
                'name'      => 'Nộp hồ sơ',
                'state' => 'on',
                'starttime' => '2015-8-1',
                'endtime' => '2015-8-20'
            ),
            array(
                'code'      => 'PHASE4',
                'name'      => 'Sau khi chốt các hồ sơ nguyện vọng',
                'state' => 'on',
                'starttime' => '2015-8-20',
                'endtime' => '2015-11-20'
            )
		);
		DB::table('phases')->insert( $combinations );
	}
}
?>