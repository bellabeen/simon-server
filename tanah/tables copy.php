<?php

include_once(__DIR__."/../lib/tanah.php");
include_once(__DIR__."/../lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$sensor = new Sensor();

// http://localhost:3000/simon-server/tanah/getAll.php?view=json
// ../tanah/tanah.json
$file = file_get_contents('../tanah/.json/tanah.json');
$array = json_decode($file, true);
$resultArray = isset($array['data']) ? $array['data'] : [];
// <?php foreach($resultArray as $result){
// 	echo '<tr>';
// 	$no;
// 	echo '<td>$no++</td>';
// 	echo '<td>'.(isset($result['suhu']) ? $result['suhu'] : '-') .'</td>';
// 	echo '<td>'.(isset($result['kelembapan_tanah']) ? $result['kelembapan_tanah'] : '-') .'</td>';
// 	echo '<td>'.(isset($result['ph']) ? $result['ph'] : '-') .'</td>';
// 	echo '<td>'.(isset($result['waktu']) ? $result['waktu'] : '-') .'</td>';
// 	echo '</tr>';
// 	}?>
<html>
	<head>
		<title>Monitoring Suhu GGP</title>
		<link rel="stylesheet" href="./include/css/style.css">
		<link rel="stylesheet" href="./include/css/bootstrap.css">
		<!-- <meta http-equiv="refresh" content="3"> -->
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
				<p class="tebel">Tabel Data Suhu:</p>
				<table class="table table-striped table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px">No</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px">Suhu (&degC)</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px">Kelembapan Tanah</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px">pH</p></center></td>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px">Waktu</p></center></td>
					</thead>
					<tbody>
					<?php
					$no=0;
					foreach($resultArray as $result){
						$no++;
						echo 
						"<tr>
						<td><center>$no</center></td>
						<td><center>$result[suhu]</center></td>
						<td><center>$result[kelembapan_tanah]</center></td>
						<td><center>$result[ph]</center></td>
						<td><center>$result[waktu]</center></td>
						</tr>";
						}
						?>
                    </tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/modules/data.js"></script>
	<script type="text/javascript" src="./js/modules/exporting.js"></script>
	<script type="text/javascript" src="./js/highcharts.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>