@extends('layout.layout')
@section('title')
  He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
  <a href="/IT4421/public">Trang chủ</a>
  <span class="divider">›</span>
  Thông tin người dùng
</nav>
@stop

@section('content')
<div class="panel">
  <div class="panel-title"> <i class="fa fa-user"></i>
    Thông tin người dùng
  </div>
  <div class="panel-body">
    @if(Auth::check())
      @if(Auth::user()->userable_type=='student')
      <div class="col-md-3 col-sm-3"></div>
      <div class="col-md-6 col-sm-6 div_bound" style="padding-left: 15px;">
        <div class="div-row">
          <div class="div-row-label" style="width: 25%"> <b>Họ tên</b>
          </div>
          <div class="div-row-label" style="width: 60%">
            {{Auth::user()->userable->firstname.' '.Auth::user()->userable->lastname}}
          </div>
        </div>
        <div class="div-row">
          <div class="div-row-label" style="width: 25%"> <b>Giới tính</b>
          </div>
          <div class="div-row-label" style="width: 60%">{{Auth::user()->userable->sex}}</div>
        </div>
        <div class="div-row">
          <div class="div-row-label" style="width: 25%">
            <b>Ngày sinh</b>
          </div>
          <div class="div-row-label" style="width: 60%">
            {{-- {{Auth::user()->userable->birthday}} --}}
            <?php 
          $birthday = Auth::user()->
            userable->birthday;
          $birthday = date("d/m/Y", strtotime($birthday));
          echo $birthday;
        ?>
          </div>
        </div>
        <div class="div-row">
          <div class="div-row-label" style="width: 25%">
            <b>Số CMTND</b>
          </div>
          <div class="div-row-label" style="width: 60%">{{Auth::user()->userable->indentity_code}}</div>
        </div>
        <div class="div-row">
          <div class="div-row-label" style="width: 25%">
            <b>Số báo danh</b>
          </div>
          <div class="div-row-label" style="width: 60%">{{Auth::user()->userable->registration_number}}</div>
        </div>
        <div class="div-row">
          <div class="div-row-label" style="width: 25%">
            <b>Điểm cộng KV</b>
          </div>
          <div class="div-row-label" style="width: 60%">{{Auth::user()->userable->plus_score}}</div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3"></div>
    @endif
    @endif
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