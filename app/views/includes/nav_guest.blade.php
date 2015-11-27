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
        <li id="trangchu" class="nav-item">
          <a href="{{Asset('')}}"> <i class="fa fa-home fa-fw fa-lg"></i>
            Trang chủ
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Thông tin tuyển sinh</a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{Asset('/regulation')}}">
                <i class="fa fa-tag"></i>
                Quy chế tuyển sinh
              </a>
            </li>
            <li>
              <a href="{{Asset('/majors')}}">
                <i class="fa fa-tag"></i>
                Ngành học - chỉ tiêu
              </a>
            </li>
          </ul>
        </li>
        <li id="tracuudiemthi" class="nav-item">
          <a href="{{Asset('/result_info')}}">Tra cứu điểm thi</a>
        </li>
        
        <li id="lienhe" class="nav-item">
          <a href="{{Asset('/contact')}}">Liên hệ</a>
        </li>
      </ul>
    </div>

  </div>
  <!-- /.container-fluid -->
</nav>