<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua BGDDT
@stop

@section('sidebar')

	@include('st-admin.includes.minis_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("minis-menu").getElementsByTagName("li");
		element[0].classList.add("active");
		console.log(element[0]);
	</script>

@stop

@section('content')
<!-- <div id="main"> -->

	<div class="content">
		<div class="row">
			<div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Lập lịch</div>
                                    <div>Cho hệ thống</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{Asset('/st-admin/minis/mn_schedule')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem trang</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Thiết lập</div>
                                    <div>Điểm sàn</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{Asset('/st-admin/minis/score_floor_setup')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem trang</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Quản lý</div>
                                    <div>Tài Khoản các Sở</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{Asset('/st-admin/minis/mn_depart_acc')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem trang</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>                
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Quản lý</div>
                                    <div>Tài Khoản các Cụm</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{Asset('/st-admin/minis/mn_clus_acc')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem trang</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Quản lý</div>
                                    <div>Tài Khoản các Trường</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{Asset('/st-admin/minis/mn_uni_acc')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem trang</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullseye fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">TH</div>
                                    <div>Két quả thi</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{Asset('/st-admin/minis/syn_result')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem trang</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 
            </div>           
		</div>
	</div>
	
<script>
//simple table


</script>
@stop
