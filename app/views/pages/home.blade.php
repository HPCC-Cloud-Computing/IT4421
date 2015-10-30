@extends('layout.layout')
@section('title')
  He thong thi THPT Quoc Gia.
@stop

@section('navigator')
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="nav-search visible-xs">
        <input type="text" style="width: 200px; height: 28px; padding-right: 22px" placeholder="Nhập từ khóa..." />
        <a href="#" class="icon-search"> <i class="fa fa-search"></i>
        </a>
      </div>
    </div>

    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a href="#"> <i class="fa fa-home fa-fw fa-lg"></i>
            Trang chủ
          </a>
        </li>

        {{-- <li class="nav-item">
          <a href="user/profile">Thông tin người dùng</a>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Thông tin tuyển sinh</a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">
                <i class="fa fa-tag"></i>
                Quy chế tuyển sinh
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-tag"></i>
                Ngành tuyển sinh
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#">Tra cứu điểm thi</a>
        </li>
        {{-- <li class="nav-item">
          <a href="#">Đăng ký xét tuyển</a>
        </li> --}}
        <li class="nav-item">
          <a href="#">Liên hệ</a>
        </li>
      </ul>
    </div>

  </div>
  <!-- /.container-fluid -->
</nav>
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
          <li class="button">
            <a href="#0"></a>
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
          <li class="button">
            <a href="#0"></a>
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
  <div class="panel-body">
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.
    </p>
    <nav class="pagination">
      <ul class="cd-pagination">
        <li class="button">
          <a href="#0"></a>
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
        <li class="button">
          <a href="#0"></a>
        </li>
      </ul>
    </nav>
  </div>
</div>
@stop