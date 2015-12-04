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
			<div class="div-row-label">Trường</div>
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
					<th>Nhóm ngành</th>
					<th>Các ngành đào tạo</th>
					<th>Mã ngành</th>
					<th>Chỉ tiêu dự kiến</th>
					<th>Tổ hợp môn thi xét tuyển</th>
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
                    var data = result.substr(1, result.length);
                    if(data === "")
                    	$("#majors_table > tbody").html("<tr><td colspan='5'>Không có bản ghi nào.</td></tr>");
                   	else
                    	$("#majors_table > tbody").html(data);
                }
            });
	}
</script>
@stop