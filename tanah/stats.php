<?php
include_once(__DIR__."/../lib/tanah.php");
include_once(__DIR__."/../lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Sensor();
$format=new DataFormat();
$getAll=$sensor->getAll();
$resultAll= isset($getAll['data']) ? $getAll['data'] : [];
?>
<html>
	<head>
		<title>Monitoring Suhu GGP</title>
		<link rel="stylesheet" href="./include/css/style.css">
		<link rel="stylesheet" href="./include/css/bootstrap.css">
		<link rel="stylesheet" href="./include/js/bootstrap.js">
		<link rel="stylesheet" href="./include/js/highchart.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="./include/js/modules/data.js"></script>
		<script type="text/javascript" src="./include/js/modules/exporting.js"></script>
		<script type="text/javascript" src="./include/js/highcharts.js"></script>
		<script type="text/javascript" src="./include/js/bootstrap.js"></script>
	</head>
	<body>
	<?php include "master/header.php" ?>
	<br>
			<div class="row">
				<div class="col-md-2 col-md-offset-2">
					<div class="panel panel-primary">
  						<div class="panel-heading">
    					<h3 class="panel-title tengah">Log</h3>
  						</div>
  						<div class="panel-body" style="padding:0px;">
						  <?php include "master/side-menu.php" ?>
  					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div id="container"></div>
				<div id="container1"></div>
				<div id="container2"></div>
				<div id="container3"></div>
				<div id="container4"></div>
			</div>
		</div>
	</body>
</html>

	<?php
		$data_suhu = array();
		foreach($resultAll as $result){
			// echo($result['suhu']);'<br>';

			// array_push($data_suhu, array($result['suhu']));
			array_push($data_suhu,array(strtotime($result['waktu']),$result['suhu']));
		}
		// die (json_encode($data_suhu));
		?>

		<!-- <script>
			Highcharts.chart('container', {

title: {
	text: 'Solar Employment Growth by Sector, 2010-2016'
},

subtitle: {
	text: 'Source: thesolarfoundation.com'
},

yAxis: {
	title: {
		text: 'Number of Employees'
	}
},

xAxis: {
	accessibility: {
		rangeDescription: 'Range: 2010 to 2017'
	}
},

legend: {
	layout: 'vertical',
	align: 'right',
	verticalAlign: 'middle'
},

plotOptions: {
	series: {
		label: {
			connectorAllowed: false
		},
		pointStart: 2010
	}
},

series: [{
	name: 'Installation',
	data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
	name: 'Manufacturing',
	data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
	name: 'Sales & Distribution',
	data: [11744, 110000, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
	name: 'Project Development',
	data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
	name: 'Other',
	data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
}],

responsive: {
	rules: [{
		condition: {
			maxWidth: 500
		},
		chartOptions: {
			legend: {
				layout: 'horizontal',
				align: 'center',
				verticalAlign: 'bottom'
			}
		}
	}]
}

});
		</script> -->

			<script>
				var chart = new Highcharts.Chart({
					  chart: {
						 renderTo: 'container1'
					  },
					  title: {
							text: 'Grafik Data Suhu'
						},
	   
					xAxis: {
						title: {
						   enabled: true,
						   text: 'Hours of the Day'
						   },
						   type: 'datetime',
						   showFirstLabel:true,
						   showLastLabel:true,
						//    min:Date.UTC(2020,1,25),
						//    minRange: 24 * 360 * 100,
						   dateTimeLabelFormats : {
							   hour: '%I %p',
							   minute: '%I:%M %p',
							   month: '%e. %b',
            					year: '%b'
							   }
					},
					series: [{
							name: "Suhu",
							data: [
								[Date.UTC(1970, 10, 25), 0],
								// [Date.UTC(<?php echo json_encode($data_suhu);?>)],
								[Date.UTC(1970, 11,  6), 0.25],
								[Date.UTC(1970, 11, 20), 1.41],
								[Date.UTC(1970, 11, 25), 1.64],
								[Date.UTC(1971, 0,  4), 1.6],
								[Date.UTC(1971, 0, 17), 2.55],
								[Date.UTC(1971, 0, 24), 2.62],
								[Date.UTC(1971, 1,  4), 2.5],
								[Date.UTC(1971, 1, 14), 2.42],
								[Date.UTC(1971, 2,  6), 2.74],
								[Date.UTC(1971, 2, 14), 2.62],
								[Date.UTC(1971, 2, 24), 2.6],
								[Date.UTC(1971, 3,  1), 2.81],
								[Date.UTC(1971, 3, 11), 2.63],
								[Date.UTC(1971, 3, 27), 2.77],
								[Date.UTC(1971, 4,  4), 2.68],
								[Date.UTC(1971, 4,  9), 2.56],
								[Date.UTC(1971, 4, 14), 2.39],
								[Date.UTC(1971, 4, 19), 2.3],
								[Date.UTC(1971, 5,  4), 2],
								[Date.UTC(1971, 5,  9), 1.85],
								[Date.UTC(1971, 5, 14), 1.49],
								[Date.UTC(1971, 5, 19), 1.27],
								[Date.UTC(1971, 5, 24), 0.99],
								[Date.UTC(1971, 5, 29), 0.67],
								[Date.UTC(1971, 6,  3), 0.18],
								[Date.UTC(1971, 6,  4), 0]
							]
						}],

						responsive: {
									rules: [{
										condition: {
											maxWidth: 500
										},
										chartOptions: {
											legend: {
												layout: 'horizontal',
												align: 'center',
												verticalAlign: 'bottom'
											}
										}
									}]
							}


					//   series: [{
					// 	name : "SUHU",
					// 	data: [
					// 		<?php echo json_encode($data_suhu);?>
					// 		]
					//   }],
			   });
			 </script>



			<!-- <script>
				var chart = new Highcharts.Chart({
					  chart: {
						 renderTo: 'container1'
					  },
					  title: {
							text: 'Grafik Data Suhu'
						},
	   
					xAxis: {
						title: {
						   enabled: true,
						   text: 'Hours of the Day'
						   },
						   type: 'datetime',
						   showFirstLabel:true,
						   showLastLabel:true,
						   
						   dateTimeLabelFormats : {
							   hour: '%I %p',
							   minute: '%I:%M %p'
							   }
					},
					  series: [{	
						data: [<?php echo json_encode($data_suhu);?>]
					  }]
			   });
			 </script>