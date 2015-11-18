@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="/IT4421/public">Trang chủ</a>
	<span class="divider">›</span>
	Tra cứu điểm thi
</nav>
@stop

@section('content')
<div class="panel" style='height: 100%'>
	<div class="panel-title">Tra cứu điểm thi</div>
	<div class="panel-body">
		<div class="col-md-3 col-sm-3"></div>
		<div class="col-md-6 col-sm-6" style="margin-top: 15px;">
			<div class="div-row">
				<div class="div-row-label" style="line-height: 1.5; width: 100%; text-align: left"> <b>Họ tên thí sinh hoặc số báo danh</b>
				</div>
				<div class="div-row-control" style="width: 100%">
					<input type="text" placeholder="6LfnJxETAAAAAP66nDUy9-A_PcwuTYbS5GM2Oj8z" />
				</div>
			</div>
			<div class="div-row">
				<div class="div-row-label" style="width: 100%; text-align: left"> <b>Cụm thi</b>
				</div>
				<div class="div-row-control" style="width: 100%">
					<select name="" style="width: 100%">
						<option value="">Cụm số 1 - Trường ĐH Bách Khoa Hà Nội</option>
					</select>
				</div>
			</div>
			<div class="div-row">
				<div class="div-row-label" style="width: 25%"></div>
				<div class="div-row-control" style="width: 75%">
					<div class="g-recaptcha" data-sitekey="6LfnJxETAAAAAFM7r2_mCqMndRiIEsfJ2dhrZjKZ"></div>
				</div>
			</div>
			<div class="div-row">
				<input type="button" class="btn" value="Tra cứu" style="width: 81%;padding: 8px;text-transform: uppercase;font-size: 14px;font-weight: 400;" />
			</div>
		</div>
		<div class="col-md-3 col-sm-3"></div>
		<div class="div-row" style="margin-top: 15px">
			<table class="datatable">
				<thead>
					<tr>
						<th rowspan="2">STT</th>
						<th rowspan="2">Họ và tên</th>
						<th rowspan="2">SBD</th>
						<th colspan="6">Môn thi</th>
						<th rowspan="2">Tổng điểm</th>
					</tr>
					<tr>
						<th>Toán</th>
						<th>Văn</th>
						<th>Lý</th>
						<th>Hóa</th>
						<th>Sinh</th>
						<th>Tiếng Anh</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Nguyễn Văn A</td>
						<td>123456</td>
						<td>10</td>
						<td>10</td>
						<td>10</td>
						<td>10</td>
						<td>10</td>
						<td>10</td>
						<td>60</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

@section('javascript')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#tracuudiemthi').attr('class', 'nav-item active');
    //Set height cho content
    var h = $('#main').css('height');
    h = parseInt(h) + 66;
    $('#content').css('height', h);
  });
</script>
@stop