<?php
include_once(__DIR__."/../lib/udara.php");
include_once(__DIR__."/../lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Udara();
$format=new DataFormat();

$getAll=$sensor->getAll();
$resultAll= isset($getAll['data']) ? $getAll['data'] : [];

// $getWaktu=$sensor->getnData();
// $resultWaktu = isset($getWaktu['data']) ? $getWaktu['data']: [];
?>
<html>
	<head>
		<title>Sistem Monitoring</title>
		<link rel="stylesheet" href="./include/css/style.css">
		<link rel="stylesheet" href="./include/css/bootstrap.css">
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
			<?php
				foreach($resultAll as $result){
					$result['humidity'];
					$result['temperature'];
					$result['resistansi_hidrogen_sulfida'];
					$result['nilai_hidrogen_sulfida'];
					$result['nilai_amonia_sulfida_benzena'];
					$result['resistansi_amonia_sulfida_benzena'];
					$result['nilai_gas_lpg'];
					$result['nilai_asap'];
					$result['nilai_karbonmonoksida'];
					$result['konsentrasi_debu'];
					
				}
			?>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Suhu (&degC)</p></center></td>
					</thead>
					<tr class="success">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[temperature]";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Kelembapan Udara</p></center></td>
					</thead>
					<tr class="danger">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[humidity]";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Resistansi Hidrogen Sulfida (Ppm)</p></center></td>
					</thead>
					<tr class="info">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[resistansi_hidrogen_sulfida]";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Nilai Amonia (Ppm)</p></center></td>
					</thead>
					<tr class="info">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[nilai_amonia_sulfida_benzena]";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Nilai Hidrogen Sulfida (Ppm)</p></center></td>
					</thead>
					<tr class="info">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[nilai_hidrogen_sulfida]";?></p></center></td>
					</tr>
				</table>
			</div>
			
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Nilai Resistansi Amonia</p></center></td>
					</thead>
					<tr class="info">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[resistansi_amonia_sulfida_benzena]";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Nilai Karbonmonoksida (Ppm)</p></center></td>
					</thead>
					<tr class="info">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[nilai_karbonmonoksida]";?></p></center></td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Konsentrasi Debu (Ppm)</p></center></td>
					</thead>
					<tr class="info">
					<td><center><p class="tebel gede" style="margin-top:5px"><?php echo "$result[konsentrasi_debu]";?></p></center></td>
					</tr>
				</table>
			</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-4">
				<p class="tebel">Ringkasan Data:</p>
					<table class="table table-striped table-hover">
						<tr>
							<td>Last Update</td>
							<td>:</td>
							<td><?php echo "$result[waktu]";?></td>
						</tr>
						<tr>
							<td>Interval Update</td>
							<td>:</td>
							<td>2 Menit</td>
						</tr>
						<tr>
							<td>Jumlah Data</td>
							<td>:</td>
							<td>
							<?php echo $resultWaktu[0]['jumlah'];?>
							</td>
							
						</tr>
					</table>
			</div>
			
		</div>
    </div>
	</body>
	<!-- <?php include "master/footer.php" ?> -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/modules/data.js"></script>
	<script type="text/javascript" src="./js/modules/exporting.js"></script>
	<script type="text/javascript" src="./js/highcharts.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	
</html>