@extends('layout.layout')
@section('title')
  He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
  <a href="/IT4421/public">Trang chủ</a>
  <span class="divider">›</span>
  Thông báo 1
</nav>
@stop

@section('content')
<div class="panel">
  <div class="panel-title"> <i class="fa fa-bullhorn"></i>
    Thông báo
  </div>
  <div class="panel-body">
    <div class="title-page">
      Thông báo 1
    </div>
    <div class="div-row">
      <ul class="notice-info">
      <li>
        <i class="fa fa-user"></i> Admin
      </li>
      <li>
        <i class="fa fa-calendar"></i> 18/11/2015
      </li>
      <li>
        <i class="fa fa-clock-o"></i> 22:00
      </li>
    </ul>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div>

@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  
</script>
@stop