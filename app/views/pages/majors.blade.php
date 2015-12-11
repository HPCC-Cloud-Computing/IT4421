@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
	<a href="/IT4421/public">Trang chủ</a>
	<span class="divider">›</span>
	Ngành học - chỉ tiêu
</nav>
@stop

@section('content')
<div class="panel">
	<div class="panel-title">Ngành học - chỉ tiêu</div>
	<div class="panel-body">
		<div class="div-row">
			<div class="div-row-label" style="width: 5%">Trường</div>
			<div class="div-row-control">
				<select id="ddlUniversity" name="ddlUniversity" onchange="University_change(this);" style="width: 400px">
					<option value="">-- Chọn trường --</option>
					@foreach ($universities as $uni)
						<option value="{{$uni->id}}">{{$uni->name}}</option>
					@endforeach
					
				</select>
			</div>
		</div>
		{{-- <div class="title-page">
			Trường đại học Bách khoa Hà Nội
		</div> --}}
		<table id="majors_table" class="datatable">
			<thead>
				<tr>
					<th style="width: 10%">Mã ngành</th>
					<th style="width: 30%">Tên ngành</th>
					<th style="width: 15%">Chỉ tiêu dự kiến</th>
					<th style="width: 10%">Khối thi</th>
					<th style="width: 35%">Điều kiện</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="5">
						Chọn trường
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
	function University_change(ddl){
		var id = $(ddl).val();
		$.ajax({
                url : "{{Asset('/majors')}}/"+id,
                type : "GET",
                success : function (result){
                    // console.log(result);
                    majors = JSON.parse(result).majors;
                    if(majors.length > 0){
                    	$("#majors_table > tbody").html("");
                    	for (var i = 0; i < majors.length; i++) {
                    		$("#majors_table > tbody").append("<tr><td>"+ majors[i].code +"</td><td>"+ majors[i].name +"</td><td>"+ majors[i].target +"</td><td>"+ majors[i].combination +"</td><td>"+ majors[i].condition +"</td></tr>");
                    	}
                	}
                	else
                		$("#majors_table > tbody").html("<tr><td colspan='5'>Không có bản ghi nào.</td></tr>");
                }
            });
	}
</script>
@stop