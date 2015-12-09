@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="/IT4421/public">Trang chủ</a>
	<span class="divider">›</span>
	Đăng ký xét tuyển
</nav>
@stop

@section('style')
<style>
 	.row-aspiration{
 		padding: 10px 0;
 		border-bottom: 1px solid #eaeae8;
 		width: 100%;
    	float: left;
    	clear: both;
 	}
 	.row-aspiration .div-row-label{
 		font-weight: bold
 	}
</style>
@stop

@section('content')
<div class="panel">
	<div class="panel-title">Đăng ký xét tuyển</div>
	<div class="panel-body">
		<div class="col-md-12 col-sm-12">
			<div class="div-row" style="text-align: center">
				<h3 style="margin-bottom: 0; line-height: 0">Các nguyện vọng đăng ký</h3>
				<br /> <i>(Xếp theo thứ tự ưu tiên từ trên xuống dưới)</i>
			</div>
			@for ($i=1; $i<=4; $i++)
			<div class="row-aspiration" data="nv{{$i}}">
				<div class="div-row">
					<div class="div-row">Nguyen vong {{$i}}</div>
					<div class="div-row-label">Trường</div>
					<div class="div-row-control" style="margin-right: 0">
						<select name="university" style="width: 300px" onchange="university_change(this);">
								<option value="null" selected>---Chon truong---</option>
							@foreach (University::all() as $uni)
								<option value="{{$uni->id}}">{{$uni->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="div-row-label">Nhóm ngành/Ngành</div>
					<div class="div-row-control">
						<select name="major" style="width: 260px">
							<option value="null" selected>---Chon nganh---</option>
						</select>
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label" style="margin-left: 13px">Tổ hợp môn thi dùng để xét tuyển</div>
					<div class="div-row-control">
						<select name="combi" style="width: 189px">
							<option value="null" selected>---Chon khoi thi---</option>
							@foreach (DB::table('combinations')->get() as $combi)
								<option value="{{$combi->name}}">Khối {{$combi->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>					
			@endfor

			<div class="div-row" style="text-align: center; margin-top: 15px">
				<input id="btn-send" type='button' class="btn" value="Gửi đăng ký" onclick="send_data();"/>
			</div>

		</div>
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#dangkyxettuyen').attr('class', 'nav-item active');
    //Set height cho content
    var h = $('#main').css('height');
    h = parseInt(h) - 10;
    $('#content').css('height', h);
  });

  	function university_change(ddl){
		var id = $(ddl).val();
		$.ajax({
                url : "{{Asset('/majors')}}/"+id,
                type : "GET",
                success : function (result){
                	majors = JSON.parse(result).majors;
                	major_select = $(ddl).parent().parent().parent().find("select[name='major']");
                	major_select.html("<option value='null' selected>---Chon nganh---</option>");
                    for (var i = 0; i < majors.length; i++) {
                    	major_select.append("<option value='"+majors[i].id+"'>"+majors[i].name+"</option>")
                    };                  
                }
            });
	}

	function send_data(){

	    var data = {
	    	'nv':[{
	    		'student_id':"{{Auth::user()->userable_id}}",
	    		'major_id':$(".row-aspiration[data='nv1']").find("select[name='major']").val(),
	    		'number_order':"1",
	    		'combi':$(".row-aspiration[data='nv1']").find("select[name='combi']").val(),
	    	},
	    	{
	    		'student_id':"{{Auth::user()->userable_id}}",
	    		'major_id':$(".row-aspiration[data='nv2']").find("select[name='major']").val(),
	    		'number_order':"2",
	    		'combi':$(".row-aspiration[data='nv2']").find("select[name='combi']").val(),

	    	},
	    	{
	    		'student_id':"{{Auth::user()->userable_id}}",
	    		'major_id':$(".row-aspiration[data='nv3']").find("select[name='major']").val(),
	    		'number_order':"3",
	    		'combi':$(".row-aspiration[data='nv3']").find("select[name='combi']").val(),
	    	},
	    	{
	    		'student_id':"{{Auth::user()->userable_id}}",
	    		'major_id':$(".row-aspiration[data='nv4']").find("select[name='major']").val(),
	    		'number_order':"4",
	    		'combi':$(".row-aspiration[data='nv4']").find("select[name='combi']").val(),
	    	}]

	    };
	    $.ajax(
	    {
	        url : "{{Asset('/stu/aspiration_reg/add')}}",
	        type: "POST",
	        data : data,
	        success:function(data, textStatus, jqXHR) 
	        {
				var url = window.location.href;
		        location.reload(url);
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	            //if fails      
	            alert('insert fails');
	        }
	    });
	}
</script>
@stop