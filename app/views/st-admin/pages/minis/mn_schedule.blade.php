<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[1].classList.add("active");
	</script>

@stop



@section('content')
<!-- <div id="main"> -->

	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<button class="hideSidebar">
					<span class="glyphicon glyphicon-arrow-left"></span>
				</button>
				<button class="showSidebar">
					<span class="glyphicon glyphicon-arrow-right"></span>     
			    </button>
				
				<br>
				<br>

				<!-- Hien thi cac giai doan tuyen sinh -->
				<table class="table table-hover table-bordered table-striped table-responsive">
					<thead>
						<td>ID</td>
						<td>Mã giai đoạn</td>
						<td>Nội dung</td>
						<td>Trạng thái</td>
						<td>Bắt đầu</td>
						<td>Kết thúc</td>
						<td>Thiết lập</td>
					</thead>
				<tbody>
					@foreach ($phrases as $phrase)
					<tr>
						<td>{{$phrase->id}}</td>
						<td>{{$phrase->code}}</td>
						<td>{{$phrase->name}}</td>
						<td>{{$phrase->state}}</td>
						<td>{{$phrase->starttime}}</td>
						<td>{{$phrase->endtime}}</td>
						<td><button class="btn btn-success" data-toggle="modal" data-target="#editPhraseModal" onclick="editPhraseForm({{$phrase->id}})">Edit</button></td>
					</tr>
					@endforeach
				</tbody>		
				</table>
				{{	EditForm::Phrase("editPhraseModal");	}}
			</div>
		</div>
	</div>
		<script type="text/javascript">
		function editPhraseForm(id){
			console.log(id);
			$.ajax({
                url : "{{Asset('/st-admin/minis/mn_schedule/edit')}}/"+id,
                type : "GET",
                data : {
                     // number : $('#number').val()
                },
                success : function (result){
                    
                    var obj = jQuery.parseJSON(result);
                    console.log(obj.phase);
                    $modal = $('#editPhraseModal').find('input');
                    // console.log(obj);
                    $($modal[0]).val(obj.phase.id);
                    $($modal[1]).val(obj.phase.code); // cần add thêm
                    $($modal[2]).val(obj.phase.name);
                    $($modal[3]).val(obj.phase.state);
                    $($modal[4]).val(obj.phase.starttime);
                    $($modal[5]).val(obj.phase.endtime);
                }
            });
		}

		$('#editPhraseModal').submit(function(e)
		{
			// console.log('ok');
		    var data = $(this).serializeArray();
		    // var formURL = $(this).attr("action");
		    $.ajax(
		    {
		        url : "{{Asset('/st-admin/minis/mn_schedule/update')}}",
		        type: "POST",
		        data : data,
		        success:function(data, textStatus, jqXHR) 
		        {
		        	// console.log(data);
					var url = window.location.href;
		            location.reload(url);
		            //data: return data from server
		            // console.log(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            //if fails      
		        }
		    });
		    e.preventDefault(); //STOP default action
		    // e.unbind(); //unbind. to stop multiple form submit.
		    $('#editPhraseModalclosebtn').click();
		});
		 
			// $('#editDepartForm').submit(); //Submit  the FORM
			
	</script>
 
@stop