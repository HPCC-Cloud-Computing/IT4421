<!-- make pin navbar in here -->

<nav class="navbar navbar-default navbar-fixed-topa  ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!--Brand -->
      <a class="navbar-brand" href="#">BGDDT</a>
      
      <!--user manager -->
      <div class="dropdown navbar-toggle collapsed">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
              <span class="caret"></span>
            </a>
          <ul class="dropdown-menu">
            <li><a href="#">Thong tin tai khoan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Dang xuat </a></li> 
          </ul>
       </div> 

       <!--home icon -->
      <a href="#"><span class="glyphicon glyphicon-home navbar-toggle collapsed" aria-hidden="true"></span></a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="">
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang Chu<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>Trang Quan Li</a></li> 
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user " aria-hidden="true"></span> 
              <span class="caret"></span>
            </a>
          <ul class="dropdown-menu">
            <li><a href="#">Thong tin tai khoan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Dang xuat </a></li> 
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>