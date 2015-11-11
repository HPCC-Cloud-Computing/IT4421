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
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="#">Thông báo 1</a>
            </div>
            <div class="news-detail">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...
              </p>
                <i class="fa fa-calendar"></i>
                30/10/2015 08:00
            </div>
          </div>
        </li>
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="#">Thông báo 2</a>
            </div>
            <div class="news-detail">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...
              </p>
                <i class="fa fa-calendar"></i>
                30/10/2015 08:00
            </div>
          </div>
        </li>
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="#">Thông báo 3</a>
            </div>
            <div class="news-detail">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...
              </p>
                <i class="fa fa-calendar"></i>
                30/10/2015 08:00
            </div>
          </div>
        </li>
      </ul>
      <nav class="pagination">
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
      </nav>
      <!-- cd-pagination-wrapper -->
    </div>
  </div>
</div>

{{-- Panel tin tức --}}
<div class="panel">
  <div class="panel-title">
    <i class="fa fa-mortar-board"></i>
     Tin tức
  </div>
  <div class="panel-body" style="padding: 0">
    <div class="main-news">
      <ul class="news">
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="#">Tin 1</a>
            </div>
            <div class="news-detail">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...
              </p>
                <i class="fa fa-calendar"></i>
                30/10/2015 08:00
            </div>
          </div>
        </li>
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="#">Tin 2</a>
            </div>
            <div class="news-detail">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...
              </p>
                <i class="fa fa-calendar"></i>
                30/10/2015 08:00
            </div>
          </div>
        </li>
        <li class="divider">
          <div class="news-item">
            <div class="news-title">
              <a href="#">Tin 3</a>
            </div>
            <div class="news-detail">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...
              </p>
                <i class="fa fa-calendar"></i>
                30/10/2015 08:00
            </div>
          </div>
        </li>
      </ul>
      <nav class="pagination">
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
      </nav>
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