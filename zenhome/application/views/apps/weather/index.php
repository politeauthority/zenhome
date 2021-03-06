<?php
/*
*	Weather :: GENERIC INDEX TEMPLATE
*
*/
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart_1);
  google.setOnLoadCallback(drawChart_2);
  function drawChart_1() {
    var data = google.visualization.arrayToDataTable([
      ['Day', 'Low', 'High', 'Avg'],
      <?
      foreach ($stats_overtime['data'] as $day => $stat) {
      	echo "['" . $stat['date_format'] . "', " . $stat['low'] . ", " . $stat['high'] . ", " . $stat['avg'] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Weather temps for the last <? echo $stats_overtime['count']; ?> days'
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_1'));
    chart.draw(data, options);
  }

  function drawChart_2() {
    var data = google.visualization.arrayToDataTable([
      ['Day', 'Today'],
      <?
      foreach ($stats_recent['last_24'] as $day => $stat) {
      	echo "['" . $stat['date_format'] . "', " . $stat['temp'] . " ],";
      }
      ?>
    ]);

    var options = {
     	title: 'Weather temps for the last 24 hours',
    	colors: ['#FFF700', 'red'],
	//	hAxis.gridlines.count: 4

    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div_2'));
    chart.draw(data, options);
  }  
</script>

<div id="wrap" class="container-fluid">
	<!-- Page Title -->
	<div class="row-fluid">
		<div class="span4">
			<h3>Weather</h3>
		</div>
		<? if( $userACL->hasPermission( 'edit_apps' ) ){ ?>
			<div class="span2 pull-right">
				<div class="dropdown pull-right">
		  		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
		  			<i class="icon-white icon-chevron-down"></i> Options
		  		</a>
		  		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		    		    <li><a href="<? echo base_url(); ?>apps/weather">Weather</a></li>
		    		    <li><a href="<? echo base_url(); ?>apps/weather/settings">Settings</a></li>
		  		</ul>
				</div>
			</div>
		<? } ?>
	</div>

	<div class="row-fluid">	
		<div class="offset1 span10 box shadow">
			<div class="box-header header-gradient">
				<h2>Current Weather</h2>
			</div>
			<div class="box-body">
				<div class="row-fluid">
					<div class="span4">
						<span class="app_weather_temp"><? echo $current->temp_f; ?>&deg;</span>
					</div>
					<div class="span1">@</div>
					<div class="span4">
						<span class="app_weather_humidity"><? echo $current->rel_humidity; ?></span> humidity
					</div>
				</div>
				<? echo $current->weather; ?>
				<br />
				Feels like <b><? echo $current->feelslike_f; ?></b>
				<br />
				Wind at <b><? echo $current->wind_mph; ?></b> MPH to the <? echo $current->wind_direction; ?>

				<div class="row-fluid">
					<div id="chart_div_2" class="span12" style="height:200px;"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row-fluid">
		
		<div class="offset1 span5 box shadow">
			<div class="box-header header-gradient">
				<h2>Recent Weather</h2>
			</div>
			<div class="box-body">
				<div id="chart_div_1" style=""></div>
			</div>
		</div>

		<div class="span5 box shadow">
			<div class="box-header header-gradient">
				<h2>Last 24 Hours</h2>
			</div>
			<div class="box-body">

			</div>
		</div>

	</div>

</div>