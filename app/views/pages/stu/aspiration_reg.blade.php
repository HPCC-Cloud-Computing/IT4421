@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="/IT4421/public">Trang chủ</a>
	<span class="divider">›</span>
	Đăng ký xét tuyển
</nav>
@stop

@section('style')
<style>
 	.row-aspiration{
 		padding: 10px 0;
 		border-bottom: 1px solid #eaeae8;
 		width: 100%;
    	float: left;
    	clear: both;
 	}
 	.row-aspiration .div-row-label{
 		font-weight: bold
 	}
</style>
@stop

@section('content')
<div class="panel">
	<div class="panel-title">Đăng ký xét tuyển</div>
	<div class="panel-body">
		<div class="col-md-12 col-sm-12">
			<div class="div-row" style="text-align: center">
				<h3 style="margin-bottom: 0; line-height: 0">Các nguyện vọng đăng ký</h3>
				<br /> <i>(Xếp theo thứ tự ưu tiên từ trên xuống dưới)</i>
			</div>
			<div class="row-aspiration">
				<div class="div-row">
					<div class="div-row-label">1. Nhóm ngành/Ngành</div>
					<div class="div-row-control">
						<select name="" style="width: 260px">
							<option value="">Công nghệ thông tin</option>
						</select>
					</div>
					<div class="div-row-label">Trường</div>
					<div class="div-row-control" style="margin-right: 0">
						<select name="" style="width: 300px">
							<option value="">ĐH Bách Khoa Hà Nội</option>
						</select>
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label" style="margin-left: 13px">Tổ hợp môn thi dùng để xét tuyển</div>
					<div class="div-row-control">
						<select name="" style="width: 189px">
							<option value="">Khối A (Toán, Lý, Hóa)</option>
							<option value="">Khối A1 (Toán, Lý, Tiếng Anh)</option>
							<option value="">Khối B (Toán, Hóa, Sinh)</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row-aspiration">
				<div class="div-row">
					<div class="div-row-label">2. Nhóm ngành/Ngành</div>
					<div class="div-row-control">
						<select name="" style="width: 260px">
							<option value="">Công nghệ thông tin</option>
						</select>
					</div>
					<div class="div-row-label">Trường</div>
					<div class="div-row-control" style="margin-right: 0">
						<select name="" style="width: 300px">
							<option value="">ĐH Bách Khoa Hà Nội</option>
						</select>
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label" style="margin-left: 13px">Tổ hợp môn thi dùng để xét tuyển</div>
					<div class="div-row-control">
						<select name="" style="width: 189px">
							<option value="">Khối A (Toán, Lý, Hóa)</option>
							<option value="">Khối A1 (Toán, Lý, Tiếng Anh)</option>
							<option value="">Khối B (Toán, Hóa, Sinh)</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row-aspiration">
				<div class="div-row">
					<div class="div-row-label">3. Nhóm ngành/Ngành</div>
					<div class="div-row-control">
						<select name="" style="width: 260px">
							<option value="">Công nghệ thông tin</option>
						</select>
					</div>
					<div class="div-row-label">Trường</div>
					<div class="div-row-control" style="margin-right: 0">
						<select name="" style="width: 300px">
							<option value="">ĐH Bách Khoa Hà Nội</option>
						</select>
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label" style="margin-left: 13px">Tổ hợp môn thi dùng để xét tuyển</div>
					<div class="div-row-control">
						<select name="" style="width: 189px">
							<option value="">Khối A (Toán, Lý, Hóa)</option>
							<option value="">Khối A1 (Toán, Lý, Tiếng Anh)</option>
							<option value="">Khối B (Toán, Hóa, Sinh)</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row-aspiration">
				<div class="div-row">
					<div class="div-row-label">4. Nhóm ngành/Ngành</div>
					<div class="div-row-control">
						<select name="" style="width: 260px">
							<option value="">Công nghệ thông tin</option>
						</select>
					</div>
					<div class="div-row-label">Trường</div>
					<div class="div-row-control" style="margin-right: 0">
						<select name="" style="width: 300px">
							<option value="">ĐH Bách Khoa Hà Nội</option>
						</select>
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label" style="margin-left: 13px">Tổ hợp môn thi dùng để xét tuyển</div>
					<div class="div-row-control">
						<select name="" style="width: 189px">
							<option value="">Khối A (Toán, Lý, Hóa)</option>
							<option value="">Khối A1 (Toán, Lý, Tiếng Anh)</option>
							<option value="">Khối B (Toán, Hóa, Sinh)</option>
						</select>
					</div>
				</div>
			</div>

			<div class="div-row" style="text-align: center; margin-top: 15px">
				<input type='button' class="btn" value="Gửi đăng ký" />
			</div>

		</div>
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#dangkyxettuyen').attr('class', 'nav-item active');
    //Set height cho content
    var h = $('#main').css('height');
    h = parseInt(h) - 10;
    $('#content').css('height', h);
  });
</script>
@stop