<?php
include_once(__DIR__."/../lib/udara.php");
include_once(__DIR__."/../lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Sensor();
$format=new DataFormat();
$getAll=$sensor->getAll();
$resultAll= isset($getAll['data']) ? $getAll['data'] : [];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMUDA - Charts</title>
	<link rel="stylesheet" href="include/assets/css/styles.css">
	<link rel="stylesheet" href="include/assets/css/bootstrap.css">
	
	<link href="include/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="include/assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="include/assets/css/datepicker3.css" rel="stylesheet">
	<link href="include/assets/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="include/assets/js/bootstrap.js">
	
	<Custom Fon>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
	<?php include "master/header.php"?>
	<?php include "master/side-menu.php"?>
		

	<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo"<p align=center>Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i");
echo"| Pukul : <b>". $jam." "."</b>";
$a = date ("H");
if (($a>=6) && ($a<=10)){
echo "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo "Selamat Siang, Semangat Menjalankan Aktifitas !";}
else if (($a>15) && ($a<=18)){
echo "Selamat Sore";}
else { echo ", <b> Selamat Malam </b> </p>";}
?> 

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Humidity
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container1"></div>
					</div>
				</div>
			</div>


			<div class="col-md-6">
			<div class="panel-body" style="padding:1px;">
				<div class="panel panel-default">
					<div class="panel-heading">
						Temperature
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container2"></div>
						</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Gas dan Asap
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container3"></div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						CO
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container4"></div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Amonia
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container5"></div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Hidrogen Sulfida
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container6"></div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Konsentrasi Debu
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body">
						<div id="container7"></div>
					</div>
				</div>
			</div>
		
		</div>
		</div>
		</div>
			<?php include "master/footer.php"?>
	  



			<script src="include/assets/js/jquery-1.11.1.min.js"></script>
	<script src="include/assets/js/bootstrap.min.js"></script>
	<script src="include/assets/js/chart.min.js"></script>
	<script src="include/assets/js/chart-data.js"></script>
	<script src="include/assets/js/easypiechart.js"></script>
	<script src="include/assets/js/easypiechart-data.js"></script>
	<script src="include/assets/js/bootstrap-datepicker.js"></script>
	<script src="include/assets/js/custom.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="include/assets/js/modules/data.js"></script>
	<script src="include/assets/js/modules/exporting.js"></script>
	<script src="include/assets/js/highcharts.js"></script>
	<script src="include/assets/js/bootstrap.js"></script>
	<script src="include/assets/js/Chart.js"></script>
	<script src="include/assets/js/Chart.bundle.js"></script>

	<?php
		$data_humidity = array();
		$data_temperature = array();
		$data_gas_dan_asap = array();
		$data_co = array();
		$data_amonia = array();
		$data_hidrogen_sulfida = array();
		$data_konsentrasi_debu = array();
		foreach($resultAll as $result){

			array_push($data_humidity, array(strtotime($result['waktu']) * 1000,(float) $result['humidity']));
			array_push($data_temperature, array(strtotime($result['waktu']) * 1000,(float) $result['temperature']));
			array_push($data_gas_dan_asap, array(strtotime($result['waktu']) * 1000,(float) $result['gas_dan_asap']));
			array_push($data_co, array(strtotime($result['waktu']) * 1000,(float) $result['co']));
			array_push($data_amonia, array(strtotime($result['waktu']) * 1000,(float) $result['amonia']));
			array_push($data_hidrogen_sulfida, array(strtotime($result['waktu']) * 1000,(float) $result['hidrogen_sulfida']));
			array_push($data_konsentrasi_debu, array(strtotime($result['waktu']) * 1000,(float) $result['konsentrasi_debu']));

		}
		// die (json_encode($data_suhu));
		?>

<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container1'
						},
						title: {
								text: 'Grafik Data Humidity'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_humidity);?>
						}]
				});
				</script>


<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container2'
						},
						title: {
								text: 'Grafik Data Temperature'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_temperature);?>
						}]
				});
				</script>

<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container3'
						},
						title: {
								text: 'Grafik Data Gas Dan Asap'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_gas_dan_asap);?>
						}]
				});
				</script>

<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container4'
						},
						title: {
								text: 'Grafik Data CO'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_co);?>
						}]
				});
				</script>

<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container5'
						},
						title: {
								text: 'Grafik Data Amonia'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_amonia);?>
						}]
				});
				</script>


<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container6'
						},
						title: {
								text: 'Grafik Data Hidrogen Sulfida'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_hidrogen_sulfida);?>
						}]
				});
				</script>

<script>
					var chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container7'
						},
						title: {
								text: 'Grafik Data Konsentrasi Debu'
							},
		
						xAxis: {
							title: {
							enabled: true,
							// text: 'Hours of the Day'
							},
							type: 'datetime',
							showFirstLabel:true,
							showLastLabel:true,
							// min:Date.UTC(2020,1,25),
							// pointInterval: 900 * 1000,
							pointStart:Date.UTC(2020,1,25,),
							dateTimeLabelFormats : {
								hour: '%I %p',
								minute: '%I:%M %p'
								}
						},
						series: [{
							
							
						 	// pointStart:Date.UTC(2020,1,25,), 
							data: 
								<?php echo json_encode($data_konsentrasi_debu);?>
						}]
				});
				</script>

</body>
</html>