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
      <div id="msgChangePass" class="div-row"></div>
      <div class="div-row" style="margin-top: 10px">
        <div class="div-row-label" style="width: 32%"> <b>Mật khẩu cũ</b>
        </div>
        <div class="div-row-control" style="width: 60%">
          <input type="password" id="pass_old" name="pass_old" />
          <span id="msgPassOld" style="color: red; margin-top: 5px"></span>
        </div>
      </div>
      <div class="div-row">
        <div class="div-row-label" style="width: 32%"> <b>Mật khẩu mới</b>
        </div>
        <div class="div-row-control" style="width: 60%">
          <input type="password" id="pass_new" name="pass_new" />
          <span id="msgPassNew" style="color: red; margin-top: 5px"></span>
        </div>
      </div>
      <div class="div-row">
        <div class="div-row-label" style="width: 32%">
          <b>Nhập lại mật khẩu mới</b>
        </div>
        <div class="div-row-control" style="width: 60%">
          <input type="password" id="re_pass_new" name="re_pass_new" />
          <span id="msgRePassNew" style="color: red; margin-top: 5px"></span>
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
  var flag = 0;
  $(document).ready(function() {
    $('#pass_old').keyup(function(event) {
      var oldPass = $('#pass_old').val();
      if(oldPass != "")
        $('#msgPassOld').html('');
    });
    $('#pass_new').keyup(function(event) {
      var newPass = $('#pass_new').val();
      if(newPass != "")
        $('#msgPassNew').html('');
    });
    $('#re_pass_new').keyup(function(event) {
    var passnew = $('#pass_new').val();
    var repassnew = $('#re_pass_new').val();
    if(repassnew != passnew){
      $('#msgRePassNew').html("Mật khẩu không khớp");
      flag = 1;
    }
    else{
      $('#msgRePassNew').html("");
      flag = 0;
    }
    });
  });
  
  function ChangePassClick(){
    var oldPass = $('#pass_old').val();
    var newPass = $('#pass_new').val();
    var reNewPass = $('#re_pass_new').val();
    if(oldPass == ""){
      flag = 1;
      $('#msgPassOld').html('Trường này là bắt buộc');
    }
    if(newPass == ""){
      flag = 1;
      $('#msgPassNew').html('Trường này là bắt buộc');
    }
    if(reNewPass == ""){
      flag = 1;
      $('#msgRePassNew').html('Trường này là bắt buộc');
    }
    if(flag == 1)
      return;
    else{
      $.ajax({
        type: 'POST',
        url: "{{url('/stu/save_pass')}}",
        data: {oldpass: oldPass, newpass: reNewPass},
        success: function(result){
          console.log(result);
          if(result == "SUCCESS"){
            $('#msgChangePass').attr('style', 'color: green')
            $('#msgChangePass').html("Đổi mật khẩu thành công!");
          }
          else{
            $('#msgChangePass').attr('style', 'color: red')
            $('#msgChangePass').html("Sai mật khẩu, vui lòng nhập lại!");
          }
        }
      });      
    }
  }
</script>
@stop