<?php

Class UniversitiesTableSeeder extends Seeder{

	public function run(){

		DB::table('universities')->delete();

		$rooms = array(
			array(
                'code'      => 'BKA',
                'name'      => 'ĐH Bách Khoa Hà Nội',
                'info'      => 'Là trường ĐH kỹ thuật hàng đầu Việt Nam. Môi trường học thân thiện...'
            ),
            array(
                'code'      => 'KHA',
                'name'      => 'ĐH Kinh tế Quốc dân',
                'info'      => 'Trường học chắp cánh cho các các nhà kinh tế trẻ, đào tạo ra các nhân tố dẫn đưòng cho kinh tế VN...'
            ),
            array(
                'code'      => 'TLA',
                'name'      => 'ĐH Thủy lợi',
                'info'      => 'Muốn phát triển ngành công nghiệp lúa nước, ngành điện, ngành nước sách thì chúng ta cần điều gì? Kỹ thuật và các kỹ sư thủy lợi..'
            ),
            array(
                'code'      => 'KQH',
                'name'      => 'HV Kỹ thuật quân sự',
                'info'      => 'Các sản phẩm do sinh viên và thầy cô trường làm ra đang lan rộng cả trong lĩnh vực quân sự hay đời sống nhân dân...'
            )
		);
		DB::table('universities')->insert( $array );
	}
}

?>