@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('content')
	<div class="panel">
          <div class="panel-title">Tra cứu điểm thi</div>
          <div class="panel-body">
            
          </div>
        </div>
@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#tracuudiemthi').attr('class', 'nav-item active');
  });
</script>
@stop