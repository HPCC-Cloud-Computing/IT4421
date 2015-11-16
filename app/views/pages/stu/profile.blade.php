@extends('layout.layout')
@section('title')
  He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
  <a href="/IT4421/public">Trang chủ</a>
  <span class="divider">›</span>
  Thông tin tài khoản
</nav>
@stop

@section('content')
<div class="panel">
  <div class="panel-title"> <i class="fa fa-user"></i>
    Thông tin tài khoản
  </div>
  <div class="panel-body">
    
  </div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#thongtinnguoidung').attr('class', 'nav-item active');
  });
</script>
@stop