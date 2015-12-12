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
                'code'      => 'LNH',
                'name'      => 'ĐH Lâm nghiệp'
            ),
            array(
                'code'      => 'NNH',
                'name'      => 'HV Nông nghiệp Việt Nam'
            ),
            array(
                'code'      => 'QGS',
                'name'      => 'ĐH Quốc gia TP HCM'
            ),
            array(
                'code'      => 'HUI',
                'name'      => 'ĐH Công nghiệp TP HCM'
            ),
            array(
                'code'      => 'SPK',
                'name'      => 'ĐH S.Phạm kỹ thuật TP HCM'
            ),
            array(
                'code'      => 'SPS',
                'name'      => 'ĐH Sư phạm TP HCM'
            ),
            array(
                'code'      => 'SGD',
                'name'      => 'ĐH Sài Gòn'
            ),
            array(
                'code'      => 'DTT',
                'name'      => 'ĐH Tôn Đức Thắng'
            ),
            array(
                'code'      => 'YDS',
                'name'      => 'ĐH Y Dược TP HCM'
            ),
            array(
                'code'      => 'DCT',
                'name'      => 'ĐH CN thực phẩm TP HCM'
            ),
            array(
                'code'      => 'HHA',
                'name'      => 'ĐH Hàng hải Việt Nam'
            ),
            array(
                'code'      => 'THP',
                'name'      => 'ĐH Hải Phòng'
            ),
            array(
                'code'      => 'TTB',
                'name'      => 'ĐH Tây Bắc'
            ),
            array(
                'code'      => 'DT',
                'name'      => 'ĐH Thái Nguyên'
            ),
            array(
                'code'      => 'TQU',
                'name'      => 'ĐH Tân Trào'
            ),
            array(
                'code'      => 'THV',
                'name'      => 'ĐH Hùng Vương'
            ),
            array(
                'code'      => 'YTB',
                'name'      => 'ĐH Y Thái Bình '
            ),
            array(
                'code'      => 'HDT',
                'name'      => 'ĐH Hồng Đức '
            ),
            array(
                'code'      => 'TDV',
                'name'      => 'ĐH Vinh'
            ),
            array(
                'code'      => 'DHU',
                'name'      => 'ĐH Huế'
            ),
            array(
                'code'      => 'DND',
                'name'      => 'ĐH Đà Nẵng'
            ),
            array(
                'code'      => 'DQN',
                'name'      => 'ĐH Quy Nhơn'
            ),
            array(
                'code'      => 'NLG',
                'name'      => 'ĐH Nông lâm tại Gia Lai'
            ),
            array(
                'code'      => 'TTN',
                'name'      => 'ĐH Tây Nguyên'
            ),
            array(
                'code'      => 'TDL',
                'name'      => 'ĐH Đà Lạt'
            ),
            array(
                'code'      => 'TSN',
                'name'      => 'ĐH Nha Trang'
            ),
            array(
                'code'      => 'TCT',
                'name'      => 'ĐH Cần Thơ'
            ),
            array(
                'code'      => 'SPD',
                'name'      => 'ĐH Đồng Tháp'
            ),
            array(
                'code'      => 'DVT',
                'name'      => 'ĐH Trà Vinh '
            ),
            array(
                'code'      => 'TTG',
                'name'      => 'ĐH Tiền Giang'
            ),
            array(
                'code'      => 'TAG',
                'name'      => 'ĐH An Giang'
            ),
            array(
                'code'      => 'DBL',
                'name'      => 'ĐH Bạc Liêu'
            )
        );

        DB::table('clusters')->insert( $clusters );
    }

}
