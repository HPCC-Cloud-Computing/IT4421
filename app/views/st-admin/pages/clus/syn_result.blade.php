<!--deparment So giao duc-->
@extends('st-admin.layout.layout')

@section('title')
	Trang quan li cua Cum Thi
@stop

@section('sidebar')

	@include('st-admin.includes.clus_sidebar')

	<script type="text/javascript">
		var element = document.getElementById("clus-menu").getElementsByTagName("li");
		element[2].classList.add("active");
		// console.log(element[0]);
	</script>

@stop

@section('content')
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChartColumn);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function drawChartColumn() {
          // Some raw data (not necessarily accurate)
          var data = google.visualization.arrayToDataTable([
           ['Diem', 'Khoi A', 'Khoi B', 'Khoi C', 'Khoi D'],
           <?php for ($i = 1; $i <=30; $i++) {
                  echo '['.strval($i).','.$result[1][$i].','.$result[2][$i].','.$result[3][$i].','.$result[4][$i].'],';
            }
           ?>
        ]);
        var options = {
          title : 'Thong ke pho diem',
          vAxis: {title: 'So hoc sinh'},
          hAxis: {title: 'Pho diem'},
          seriesType: 'bars',
          width : 2000,
          series: {4: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <!-- <div id="piechart"></div> -->
      <div id="chart_div" style="margin-left: 300px;width: 900px; height: 500px;overflow-x: scroll;
    overflow-y: hidden;"></div>

@stop