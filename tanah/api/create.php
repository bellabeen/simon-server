<?php
include_once(__DIR__."/../../lib/tanah.php");
include_once(__DIR__."/../../lib/DataFormat.php");
header("Access-Control-Allow-Methods: POST");
$sensor = new Sensor();

$suhu = isset($_GET['suhu']) ? $_GET['suhu']: null;
$kelembapan_udara = isset($_GET['kelembapan_udara']) ? $_GET['kelembapan_udara']: null;
$kelembapan_tanah = isset($_GET['kelembapan_tanah']) ? $_GET['kelembapan_tanah']: null;
$ph = isset($_GET['ph']) ? $_GET['ph']: null;
$sensor->setValue($suhu, $kelembapan_udara, $kelembapan_tanah, $ph);
$result = $sensor->create();

?>