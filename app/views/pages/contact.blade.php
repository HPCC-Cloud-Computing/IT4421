@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="/IT4421/public">Trang chủ</a>
	<span class="divider">›</span>
	Liên hệ
</nav>
@stop

@section('content')
<div class="panel">
	<div class="panel-title">Liên hệ</div>
	<div class="panel-body">
		<div class="col-md-2 col-sm-2"></div>
		<div class="col-md-8 col-sm-8 div_bound" style="padding-left: 15px; padding-top: 15px;">
		<div class="div-row">
			<div class="div-row-label"><b>Họ tên</b></div>
			<div class="div-row-control">
				<input type="text" id="hoten" name="hoten" />
			</div>
		</div>
		<div class="div-row">
			<div class="div-row-label"><b>Email</b></div>
			<div class="div-row-control">
				<input type="text" id="email" name="email" />
			</div>
		</div>
		<div class="div-row">
			<div class="div-row-label"><b>Số điện thoại</b></div>
			<div class="div-row-control">
				<input type="text" id="sodienthoai" name="sodienthoai" />
			</div>
		</div>
		<div class="div-row">
			<div class="div-row-label"><b>Chủ đề</b></div>
			<div class="div-row-control">
				<input type="text" id="chude" name="chude" />
			</div>
		</div>
		<div class="div-row">
			<div class="div-row-label"><b>Nội dung</b></div>
			<div class="div-row-control">
				<textarea id="noidung" name="noidung" rows="3"></textarea>
			</div>
		</div>
		<div class="div-row" style="text-align: center; margin-top: 10px">
			<input type="button" class="btn" value="Gửi tin nhắn" />
		</div>
		</div>
		<div class="col-md-2 col-sm-2"></div>
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#lienhe').attr('class', 'nav-item active');
  });
</script>
@stop