@extends('layout.layout')
@section('title')
	He thong thi THPT Quoc Gia.
@stop

@section('navigator')
	
<nav class="navbar navbar-default navbar-static-top custom-navbar" role="navigation">
  <div class="container">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-items">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="navbar-header">
      <a class="navbar-brand" rel="home" href="#" title="Help">
        BGDDT
      </a>
    </div>

    <!-- Non-collapsing right-side icons -->
    <ul class="nav navbar-nav navbar-right">

      <li>
        <a href="#" class="fa fa-home"></a>
      </li>
    </ul>
    
    <!-- the collapsing menu -->
    <div class="collapse navbar-collapse navbar-left" id="nav-items">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Trang chủ</a></li>
        <li><a href="#">Tra cứu điểm thi</a></li>
        <li><a href="#">Liên hệ</a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
  <!--/.container -->
</nav>


@stop

@section('content')
	<h2>this is content of home</h2>
@stop