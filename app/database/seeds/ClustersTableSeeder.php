<?php

class ClustersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('clusters')->delete();


        $clusters = array(
            array(
                'code'      => 'BKA',
                'name'      => 'ĐH Bách khoa Hà Nội'
            ),
            array(
                'code'      => 'KHA',
                'name'      => 'ĐH Kinh tế Quốc dân'
            ),
            array(
                'code'      => 'TLA',
                'name'      => 'ĐH Thủy lợi'
            ),
            array(
                'code'      => 'KQH',
                'name'      => 'HV Kỹ thuật quân sự'
            ),
            array(
                'code'      => 'DCN',
                'name'      => 'ĐH Công nghiệp Hà Nội'
            ),
            array(
                'code'      => 'SPH',
                'name'      => 'ĐH Sư phạm Hà Nội'
            ),
            array(
                'code'      => 'admin',
                'name'      => 'admin@example.org'
            ),
            array(
                'code'      => 'LNH',
                'name'      => 'ĐH Lâm nghiệp'
            ),
            array(
                'code'      => 'NNH',
                'name'      => 'HV Nông nghiệp Việt Nam'
            )
        );

        DB::table('cluters')->insert( $clusters );
    }

}
