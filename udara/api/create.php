<?php
include_once(__DIR__."/../../lib/udara.php");
include_once(__DIR__."/../../lib/DataFormat.php");
header("Access-Control-Allow-Methods: POST");

$sensor = new Udara();

$humidity = isset($_GET['humidity']) ? $_GET['humidity']: null;
$temperature = isset($_GET['temperature']) ? $_GET['temperature']: null;
$resistansi_hidrogen_sulfida = isset($_GET['resistansi_hidrogen_sulfida']) ? $_GET['resistansi_hidrogen_sulfida']: null;
$nilai_hidrogen_sulfida = isset($_GET['nilai_hidrogen_sulfida']) ? $_GET['nilai_hidrogen_sulfida']: null;
$nilai_amonia_sulfida_benzena = isset($_GET['nilai_amonia_sulfida_benzena']) ? $_GET['nilai_amonia_sulfida_benzena']: null;
$resistansi_amonia_sulfida_benzena = isset($_GET['resistansi_amonia_sulfida_benzena']) ? $_GET['resistansi_amonia_sulfida_benzena']: null;
$nilai_gas_lpg = isset($_GET['nilai_gas_lpg']) ? $_GET['nilai_gas_lpg']: null;
$nilai_asap= isset($_GET['nilai_asap']) ? $_GET['nilai_asap']: null;
$nilai_karbonmonoksida = isset($_GET['nilai_karbonmonoksida']) ? $_GET['nilai_karbonmonoksida']: null;
$nilai_gas_metana = isset($_GET['nilai_gas_metana']) ? $_GET['nilai_gas_metana']: null;
$konsentrasi_debu= isset($_GET['konsentrasi_debu']) ? $_GET['konsentrasi_debu']: null;

$sensor->setValue($humidity, $temperature, $resistansi_hidrogen_sulfida, $nilai_hidrogen_sulfida, $nilai_amonia_sulfida_benzena, $resistansi_amonia_sulfida_benzena,
$nilai_gas_lpg, $nilai_asap, $nilai_karbonmonoksida, $nilai_gas_metana, $konsentrasi_debu);
$result = $sensor->create();
?>

