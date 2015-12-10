<?php

Class NoticesTableSeeder extends Seeder{

	public function run(){
		DB::table('notices')->delete();

		$notices = array(
			array(
                'title'      => 'BÁO CÁO NHANH KẾT QUẢ TUYỂN SINH ĐẾN NGÀY 24 THÁNG 8',
                'content'      => 'Đến ngày 24 tháng 8 năm 2015 đã có 505,939[1] thí sinh đăng ký xét tuyển vào các trường ĐH, CĐ.

- Theo báo cáo của 104 trường[2] (4 trường CĐ và 100 trường ĐH) đã xét tuyển trong số hơn 400 trường ĐH, CĐ: có 57 trường xét được từ 80% chỉ tiêu trở lên, trong đó có 43 trường đã xét đủ chỉ tiêu. Tổng số chỉ tiêu mà 104 trường này tuyển được là 252,766 đạt gần 85% chỉ tiêu (xét tuyển bằng kết thi THPT quốc gia); 38 trường (chiếm 60,32%) đạt từ 80% chỉ tiêu trở lên, trong đó có 28 trường (chiếm 44,44%) tuyển đủ chỉ tiêu ngay đợt 1[3].

- Số lượt thí sinh thay đổi nguyện vọng đăng ký xét tuyển là 44.224 (chiếm 8,7% [4] tổng số thí sinh ĐKXT đợt 1), trong số thí sinh đăng ký thay đổi nguyện vọng ĐKXT tại sở GDĐT là 11.081, tại các trường ĐH, CĐ là 33,143. Việc thay đổi nguyện vọng ĐKXT chủ yếu tập trung vào khoảng 30 trường có số thí sinh ĐKXT vượt nhiều so với chỉ tiêu.'
            ),
            array(
                'title'      => 'Nộp hồ sơ thi tốt nghiệp THPT',
                'content'      => 'Kính gửi: Các Sở Giáo dục và Đào tạo

 

Từ năm 2011, theo quy định tại các văn bản hướng dẫn tổ chức thi tốt nghiệp trung học phổ thông của Bộ Giáo dục và Đào tạo, các Sở Giáo dục và Đào tạo phải gửi Danh sách công nhận tốt nghiệp trung học phổ thông về Bộ (năm 2011- 2012 gửi về Cục Khảo thí và Kiểm định chất lượng giáo dục, từ năm 2013 gửi về Văn phòng Bộ) sau khi kết thúc kỳ thi. Tuy nhiên đến nay còn một số Sở Giáo dục và Đào tạo chưa nộp Danh sách công nhận tốt nghiệp các năm từ 2011 đến 2014.

Để việc lưu trữ hồ sơ thi tốt nghiệp trung học phổ thông được đầy đủ, thống nhất, Bộ Giáo dục và Đào tạo yêu cầu:

1. Các Sở Giáo dục và Đào tạo gửi Danh sách công nhận tốt nghiệp trung học phổ thông năm 2015 (bản chính) về Bộ trước ngày 20/8/2015.

2. Đối với các Sở có tên trong Danh sách kèm theo, yêu cầu gửi Danh sách công nhận tốt nghiệp trung học phổ thông (bản chính hoặc bản có xác nhận của Sở) của các năm chưa nộp.

Hồ sơ của các Sở Giáo dục và Đào tạo gửi về Văn phòng Bộ Giáo dục và Đào tạo (Phòng Lưu trữ - Thư viện), 35 Đại Cồ Việt, Phường Lê Đại Hành, Quận Hai Bà Trưng, Thành phố Hà Nội). Điện thoại liên hệ 04 38681440.'
            ),
            array(
                'title'      => 'Giải đáp thắc mắc liên quan đến xét tuyển ĐH, CĐ năm 2015',
                'content'      => '1. Trong đợt 1 xét tuyển vào đại học, cao đẳng hệ chính quy năm 2015, có những thí sinh thay đổi nguyện vọng ĐKXT nhưng các trường đại học, cao đẳng chưa cập nhật kịp thời vào danh sách xét tuyển. Để đảm bảo quyền lợi cho thí sinh, đề nghị các trường thống kê, lập danh sách những thí sinh này, báo cáo Bộ Giáo dục và Đào tạo để được hướng dẫn xử lý thống nhất.

2. Để kịp thời giải đáp thắc mắc của thí sinh và phụ huynh trong xét tuyển vào đại học, cao đẳng (gọi chung là các trường) hệ chính quy năm 2015, Bộ Giáo dục và Đào tạo yêu cầu các trường:

- Thành lập Tổ công tác chuyên trách để giải đáp các thắc mắc liên quan đến công tác xét tuyển ĐH, CĐ năm 2015. Tổ công tác có nhiệm vụ tiếp đón, hỗ trợ và cung cấp thông tin đầy đủ, chính xác cho thí sinh và phụ huynh về công tác xét tuyển ĐH, CĐ;

- Bố trí những người nắm vững nghiệp vụ về công tác tuyển sinh ĐH, CĐ tham gia Tổ công tác;

- Bố trí phòng làm việc, máy tính, điện thoại và các điều kiện cần thiết khác phục vụ cho hoạt động của Tổ công tác;

- Công bố các thông tin liên quan đến Tổ công tác như: Địa điểm làm việc, sổ điện thoại và email để liên hệ, thời gian làm việc trên trang thông tin điện tử của Trường và các phương tiện thông tin đại chúng khác để thí sinh và phụ huynh biết;

- Tổ công tác làm việc trong giờ hành chính, bắt đầu từ ngày 28/8/2015 đến khi kết thúc công tac xét tuyển CĐ (21/11/2015);

- Những nội dung đề đạt của thí sinh và phụ huynh trường không giải quyết được chuyển về Tổ công tác của Bộ Giáo dục và Đào tạo theo địa chi:

+ Phòng 203, Trung tâm Hội nghị Giáo dục, số 23, Lê Thánh Tông, Tp. Hà Nội.

+ Điện thoại: 04.38262004;                              Email: hotrots2015@moet.edu.vn

Bộ Giáo dục và Đào tạo yêu cầu các Trường tổ chức thực hiện nghiêm túc nội dung Công văn này./.

'
            )
		);
		DB::table('notices')->insert( $notices );
	}
}
?>