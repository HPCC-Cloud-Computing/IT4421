<?php

Class DepartmentsTableSeeder extends Seeder{

	public function run(){
		DB::table('departments')->delete();

		$departments = array(
			'Sở GD tỉnh An Giang',
			'Sở GD tỉnh Bà Rịa - Vũng Tàu',
			'Sở GD tỉnh Bắc Giang',
			'Sở GD tỉnh Bắc Kạn',
			'Sở GD tỉnh Bạc Liêu',
			'Sở GD tỉnh Bắc Ninh',
			'Sở GD tỉnh Bến Tre',
			'Sở GD tỉnh Bình Định',
			'Sở GD tỉnh Bình Dương',
			'Sở GD tỉnh Bình Phước',
			'Sở GD tỉnh Bình Thuận',
			'Sở GD tỉnh Cà Mau',
			'Sở GD tỉnh Cao Bằng',
			'Sở GD tỉnh Đắk Lắk',
			'Sở GD tỉnh Đắk Nông',
			'Sở GD tỉnh Điện Biên',
			'Sở GD tỉnh Đồng Nai',
			'Sở GD tỉnh Đồng Tháp',
			'Sở GD tỉnh Gia Lai',
			'Sở GD tỉnh Hà Giang',
			'Sở GD tỉnh Hà Nam',
			'Sở GD tỉnh Hà Tĩnh',
			'Sở GD tỉnh Hải Dương',
			'Sở GD tỉnh Hậu Giang',
			'Sở GD tỉnh Hòa Bình',
			'Sở GD tỉnh Hưng Yên',
			'Sở GD tỉnh Khánh Hòa',
			'Sở GD tỉnh Kiên Giang',
			'Sở GD tỉnh Kon Tum',
			'Sở GD tỉnh Lai Châu',
			'Sở GD tỉnh Lâm Đồng',
			'Sở GD tỉnh Lạng Sơn',
			'Sở GD tỉnh Lào Cai',
			'Sở GD tỉnh Long An',
			'Sở GD tỉnh Nam Định',
			'Sở GD tỉnh Nghệ An',
			'Sở GD tỉnh Ninh Bình',
			'Sở GD tỉnh Ninh Thuận',
			'Sở GD tỉnh Phú Thọ',
			'Sở GD tỉnh Quảng Bình',
			'Sở GD tỉnh Quảng Nam',
			'Sở GD tỉnh Quảng Ngãi',
			'Sở GD tỉnh Quảng Ninh',
			'Sở GD tỉnh Quảng Trị',
			'Sở GD tỉnh Sóc Trăng',
			'Sở GD tỉnh Sơn La',
			'Sở GD tỉnh Tây Ninh',
			'Sở GD tỉnh Thái Bình',
			'Sở GD tỉnh Thái Nguyên',
			'Sở GD tỉnh Thanh Hóa',
			'Sở GD tỉnh Thừa Thiên Huế',
			'Sở GD tỉnh Tiền Giang',
			'Sở GD tỉnh Trà Vinh',
			'Sở GD tỉnh Tuyên Quang',
			'Sở GD tỉnh Vĩnh Long',
			'Sở GD tỉnh Vĩnh Phúc',
			'Sở GD tỉnh Yên Bái',
			'Sở GD tỉnh Phú Yên',
			'Sở GD tỉnh Cần Thơ',
			'Sở GD tỉnh Đà Nẵng',
			'Sở GD tỉnh Hải Phòng',
			'Sở GD tỉnh Hà Nội',
			'Sở GD tỉnh TP HCM'
		);
		$n = sizeof($departments);
		$array = array();
		for ($i=0; $i < $n; $i++) { 
			$array[] = array(
				'code' => 'Department'.(string)($i+1), 
				'name' => $departments[$i]
				);
		}
		DB::table('departments')->insert( $array );
	}
}

?>