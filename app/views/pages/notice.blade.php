@extends('layout.layout')
@section('title')
  He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
  <a href="/IT4421/public">Trang chủ</a>
  <span class="divider">›</span>
  {{$notice->title}}
</nav>
@stop

@section('content')
<div class="panel">
  <div class="panel-title"> <i class="fa fa-bullhorn"></i>
    Thông báo
  </div>
  <div class="panel-body">

    <div class="title-page">
      {{$notice->title}}
    </div>
    <div class="div-row">
      <ul class="notice-info">
      <li>
        <i class="fa fa-user"></i> Admin
      </li>
      <li>
        <i class="fa fa-calendar"></i> {{$notice->created_at->format('d/m/Y')}}
      </li>
      <li>
        <i class="fa fa-clock-o"></i> {{$notice->created_at->format('H:M')}}
      </li>
    </ul>
    </div>
    <p>{{$notice->content}}</p>
  </div>
</div>

@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  
</script>
@stop