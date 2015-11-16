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