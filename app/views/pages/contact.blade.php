<?php 
// $action=$_REQUEST['action']; 
// if ($action!="")    /* display the contact form */ 
//     { 
//     $name=$_REQUEST['name']; 
//     $email=$_REQUEST['email']; 
//     $message=$_REQUEST['message']; 
//     if (($name=="")||($email=="")||($message=="")) 
//         { 
//         echo "All fields are required, please fill <a href=\"\">the form</a>
// again."; 
//         } 
//     else{         
//         $from="From: $name
// <$email>
// \r\nReturn-path: $email"; 
//         $subject="Message sent using your contact form"; 
//         mail("youremail@yoursite.com", $subject, $message, $from); 
//         echo "Email sent!"; 
//         } 
//     }   
?>
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
			<form id="contact_form" action="" method="POST" enctype="multipart/form-data">
				<div class="div-row">
					<div class="div-row-label"> <b>Họ tên <span style="color: red">*</span></b>
					</div>
					<div class="div-row-control">
						<input type="text" id="name" name="name" />
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label"> <b>Email <span style="color: red">*</span></b>
					</div>
					<div class="div-row-control">
						<input type="text" id="email" name="email" />
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label">
						<b>Số điện thoại</b>
					</div>
					<div class="div-row-control">
						<input type="text" id="phone" name="phone" />
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label">
						<b>Chủ đề <span style="color: red">*</span></b>
					</div>
					<div class="div-row-control">
						<input type="text" id="subject" name="subject" />
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label">
						<b>Nội dung <span style="color: red">*</span></b>
					</div>
					<div class="div-row-control">
						<textarea id="message" name="message" rows="3"></textarea>
					</div>
				</div>
				<div class="div-row">
					<span id="notify_msg" style="color: red"></span>
				</div>
				<div class="div-row" style="text-align: center; margin-top: 10px">
					<input type="button" class="btn" onclick='send(this);' value="Gửi tin nhắn" />
				</div>
			</form>
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

  function send(btn){
  	var name = $("#name").val();
  	var email = $("#email").val();
  	var phone = $("#phone").val();
  	var subject = $("#subject").val();
  	var message = $("#message").val();
  	if(name == "" || email == "" || subject == "" || message == ""){
  		if(name == ""){
  			$("#name").css('border-color', 'red');
  		}
  		else
  			$("#name").css('border-color', '#e0e0e0');
  		if(email == ""){
  			$("#email").css('border-color', 'red');
  		}
  		else
  			$("#email").css('border-color', '#e0e0e0');
  		if(subject == ""){
  			$("#subject").css('border-color', 'red');
  		}
  		else
  			$("#subject").css('border-color', '#e0e0e0');
  		if(message == ""){
  			$("#message").css('border-color', 'red');
  		}
  		else
  			$("#message").css('border-color', '#e0e0e0');
  		$("#notify_msg").html("Nhập đầy đủ thông tin vào những trường bắt buộc");
  		return;
  	}
  	var postData = $("#contact_form").serializeArray();
  	console.log(postData);
  	$.ajax(
		    {
		        url : "{{Asset('/send_mail')}}",
		        type: "POST",
		        data : postData,
		        success:function(data) 
		        {
		        	
		        }
		    });
  }
</script>
@stop