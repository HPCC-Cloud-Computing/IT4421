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
		<div class="col-md-2 col-sm-2"></div>
		<div class="col-md-8 col-sm-8" style="margin-top: 15px">
			<div class="div-row">
				<div class="div-row-label" style="line-height: 1.5; width: 25%"> <b>Họ tên thí sinh
						<br>hoặc số báo danh</b>
				</div>
				<div class="div-row-control" style="width: 75%">
					<input type="text" style="width: 180px" />
				</div>
			</div>
			<div class="div-row">
				<div class="div-row-label" style="width: 25%"> <b>Cụm thi</b>
				</div>
				<div class="div-row-control" style="width: 75%">
					<select name="" style="width: 100%">
						<option value="">Cụm số 1 - Trường ĐH Bách Khoa Hà Nội</option>
					</select>
				</div>
			</div>
			<div class="div-row">
				<div class="div-row-label" style="width: 25%"></div>
				<div class="div-row-control" style="width: 75%">
					<h3>Captcha</h3>
				</div>
			</div>
			<div class="div-row" style="text-align: center">
				<input type="button" class="btn" value="Tra cứu" />
			</div>
		</div>
		<div class="col-md-2 col-sm-2"></div>
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
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#tracuudiemthi').attr('class', 'nav-item active');
    //Set height cho content
    var h = $('#main').css('height');
    h = parseInt(h) - 10;
    $('#content').css('height', h);
  });
</script>
@stop