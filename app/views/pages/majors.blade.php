@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="/IT4421/public">Trang chủ</a>
	<span class="divider">›</span>
	Ngành học - chỉ tiêu
</nav>
@stop

@section('content')
<div class="panel">
	<div class="panel-title">Ngành học - chỉ tiêu</div>
	<div class="panel-body">
		<div class="div-row">
			<div class="div-row-label"><b>Trường</b></div>
			<div class="div-row-control">
				<select name="" style="width: 200px">
					{{-- <option value="">-- Chọn trường --</option> --}}
					<option value="">ĐH Bách Khoa Hà Nội</option>
				</select>
			</div>
		</div>
		
		<table class="datatable">
			<thead>
				<tr>
					<th>Nhóm ngành</th>
					<th>Các ngành đào tạo</th>
					<th>Mã ngành</th>
					<th>Chỉ tiêu dự kiến</th>
					<th>Tổ hợp môn thi xét tuyển</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>KT11</td>
					<td>Kỹ thuật cơ điện tử</td>
					<td>D520114</td>
					<td>250</td>
					<td>Toán, Lý, Hóa<br />
					Toán, Lý, Anh<br>
					(Toán là môn thi chính)
					</td>
				</tr>
				<tr>
					<td>KT11</td>
					<td>Kỹ thuật cơ điện tử</td>
					<td>D520114</td>
					<td>250</td>
					<td>Toán, Lý, Hóa<br />
					Toán, Lý, Anh<br>
					(Toán là môn thi chính)
					</td>
				</tr>
				<tr>
					<td>KT11</td>
					<td>Kỹ thuật cơ điện tử</td>
					<td>D520114</td>
					<td>250</td>
					<td>Toán, Lý, Hóa<br />
					Toán, Lý, Anh<br>
					(Toán là môn thi chính)
					</td>
				</tr>
				<tr>
					<td>KT11</td>
					<td>Kỹ thuật cơ điện tử</td>
					<td>D520114</td>
					<td>250</td>
					<td>Toán, Lý, Hóa<br />
					Toán, Lý, Anh<br>
					(Toán là môn thi chính)
					</td>
				</tr>
				<tr>
					<td>KT11</td>
					<td>Kỹ thuật cơ điện tử</td>
					<td>D520114</td>
					<td>250</td>
					<td>Toán, Lý, Hóa<br />
					Toán, Lý, Anh<br>
					(Toán là môn thi chính)
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var h = $('#main').css('height');
    	h = parseInt(h) - 10;
    	$('#content').css('height', h);	
	});
</script>
@stop