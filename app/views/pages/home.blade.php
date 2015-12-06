@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('content')
{{-- Panel thông báo --}}
<div class="panel">
  <div class="panel-title">
    <i class="fa fa-bullhorn"></i>
    Thông báo
  </div>
  <div class="panel-body" style="padding: 0">
    <div class="main-news">
      <ul class="news">
      @foreach ($notices as $notice)
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="{{Asset('/notice/').$notice->id}}">{{$notice->title}}</a>
            </div>
            <div class="news-detail">
              <p>
                {{substr($notice->title, 0, 100)}}
              </p>
                <i class="fa fa-calendar"></i>
                {{$notice->created_at}}
            </div>
          </div>
        </li>
      @endforeach
      </ul>
      {{-- <div class="pagination">
        <ul class="cd-pagination">
          <li class="btn-prev">
            <a href="#0"><i class="fa fa-chevron-left"></i></a>
          </li>
          <li>
            <a class="current" href="#0">1</a>
          </li>
          <li>
            <a href="#0">2</a>
          </li>
          <li>
            <a href="#0">3</a>
          </li>
          <li class="btn-next">
            <a href="#0"><i class="fa fa-chevron-right"></i></a>
          </li>
        </ul>
      </div> --}}
      <!-- cd-pagination-wrapper -->
    </div>
  </div>
</div>

@stop

@section('javascript')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#trangchu').attr('class', 'nav-item active');
  });
</script>
@stop