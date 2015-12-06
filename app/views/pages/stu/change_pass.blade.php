@extends('layout.layout')
@section('title')
  He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
  <a href="{{Asset('')}}">Trang chủ</a>
  <span class="divider">›</span>
  Đổi mật khẩu
</nav>
@stop

@section('content')
<div class="panel">
  <div class="panel-title"> <i class="fa fa-user"></i>
    Đổi mật khẩu
  </div>
  <div class="panel-body">
    @if(Auth::check())
      @if(Auth::user()->userable_type=='student')
    <div class="col-md-3 col-sm-3"></div>
    <div id="formChangePass" class="col-md-6 col-sm-6 div_bound" style="padding-left: 15px">
    <input type="hidden" id="cur_pass" value="{{Auth::user()->password}}"/>
      <div class="div-row" style="margin-top: 10px">
        <div class="div-row-label" style="width: 32%"> <b>Mật khẩu cũ</b>
        </div>
        <div class="div-row-control" style="width: 60%">
          <input type="text" id="pass_old" name="pass_old" />
        </div>
      </div>
      <div class="div-row">
        <div class="div-row-label" style="width: 32%"> <b>Mật khẩu mới</b>
        </div>
        <div class="div-row-control" style="width: 60%">
          <input type="text" id="pass_new" name="pass_new" />
        </div>
      </div>
      <div class="div-row">
        <div class="div-row-label" style="width: 32%">
          <b>Nhập lại mật khẩu mới</b>
        </div>
        <div class="div-row-control" style="width: 60%">
          <input type="text" id="pass_new2" name="pass_new2" />
        </div>
      </div>
      <div class="div-row" style="text-align: center; margin-top: 10px">
      <input type="button" class="btn" value="Đổi mật khẩu" onclick="ChangePassClick();" />
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
  function ChangePassClick(){
    var msg = "";
    
  }
</script>
@stop