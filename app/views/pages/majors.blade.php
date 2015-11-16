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
		{{-- <div class="div-row">
			<div class="div-row-label">Trường</div>
			<div class="div-row-control">
				<select name="">
					<option value="">-- Tất cả --</option>
				</select>
			</div>
		</div> --}}
		<div class="title-page">
			Trường đại học Bách khoa Hà Nội
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
			</tbody>
		</table>
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8"></script>
@stop