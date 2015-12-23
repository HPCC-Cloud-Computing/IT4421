@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="{{Asset('')}}">Trang chủ</a>
	<span class="divider">›</span>
	Tra cứu điểm thi
</nav>
@stop

@section('content')
<div class="panel" style='height: 100%'>
	<div class="panel-title">Tra cứu điểm thi</div>
	<div class="panel-body">
		<div class="col-md-3 col-sm-3"></div>
		<div class="col-md-6 col-sm-6" style="margin-top: 15px;">
			<!-- <form action="{{url('/result/search')}}" method="POST"> -->
				<div class="div-row">
					<div class="div-row-label" style="line-height: 1.5; width: 100%; text-align: left"> <b>Số báo danh hoặc số CMTND</b>
					</div>
					<div class="div-row-control" style="width: 100%">
						<input name="input" type="text" placeholder="Nhập số báo danh và số CMTND"/>
						<!-- <input type="text" placeholder="6LfnJxETAAAAAP66nDUy9-A_PcwuTYbS5GM2Oj8z" /> -->
					</div>
				</div>
				<div class="div-row">
					<div class="div-row-label" style="width: 100%; text-align: left"> <b>Cụm thi</b>
					</div>
					<div class="div-row-control" style="width: 100%">
						<select name="cluster" style="width: 100%">
							<option value="0" selected>-- Chọn cụm thi --</option>
							@foreach($clusters as $cluster)
							<option value='{{$cluster->id}}'>{{$cluster->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
<!-- 				<div class="div-row">
					<div class="div-row-control">
						<div class=  "g-recaptcha" data-sitekey="6LfnJxETAAAAAFM7r2_mCqMndRiIEsfJ2dhrZjKZ"></div>
					</div>
				</div> -->
				<div class="div-row">
					<button id = "btn-search" class="btn" style="width: 100%;padding: 8px;text-transform: uppercase;font-size: 14px;font-weight: 400; margin-top:30px">
					TRA CỨU</button>
				</div>	
			<!-- </form> -->
		</div>
		<div class="col-md-3 col-sm-3"></div>

		<div class="div-row" style="margin-top: 15px">
			<table class="datatable" id = "table_score" style="display:none">
				<thead>
					<tr>
						<th rowspan="2">Họ và tên</th>
						<th rowspan="2">SBD</th>
						<th colspan="6">Môn thi</th>
						<th rowspan="2">Tổng điểm</th>
					</tr>
					<tr>
						<th>Toán</th>
						<th>Văn</th>
						<th>Lý</th>
						<th>Hóa</th>
						<th>Sinh</th>
						<th>Tiếng Anh</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#btn-search').on('click',function(){
		var cluster = $('select option:selected').val(),
			input = $('input[name="input"]').val();
		if(cluster == 0){
			alert('Bạn cần chọn cụm thi trước khi tìm kiếm!');
		}
		else{
			$.ajax({
				type: "POST",
				url: "{{url('/result/search')}}",
				cache: false,
				data: {cluster: cluster, input: input},
				success: function(data){
					if(JSON.parse(data).result == 'true'){
					student = JSON.parse(data).student;
						$("#table_score").show();
						$("#table_score tbody").html('');
						$("#table_score tbody").append("<tr><td>"+student.name+"</td><td style='text-align: center'>"+student.sbd+"</td><td style='text-align: center'>"+student.toan+"</td><td style='text-align: center'>"+student.van+"</td><td style='text-align: center'>"+student.ly+"</td><td style='text-align: center'>"+student.hoa+"</td><td style='text-align: center'>"+student.sinh+"</td><td style='text-align: center'>"+student.ta+"</td><td style='text-align: center'>"+student.tong+"</td></tr>");
					}else{

					}
				}
			});
		}
	  });
</script>
@stop

@section('javascript')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#tracuudiemthi').attr('class', 'nav-item active');
    //Set height cho content
    var h = $('#main').css('height');
    h = parseInt(h) + 66;
    $('#content').css('height', h);
  });
</script>
@stop