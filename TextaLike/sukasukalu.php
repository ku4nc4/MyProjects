<?php
header('Content-Type: application/json');
$host = 'localhost';
$user = 'oebsnuuc_eventad';
$pass = 'l0GyAN.?aPb!';
$db = 'oebsnuuc_event';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
  die("connection failed ".$conn->connect_error);
}
$year = $_GET['year'];
$month = $_GET['month'];
$res = $conn->query('select * from event');
$arrjson = array("id" => array(),"datetime" => array(),"name" => array(),"time" => array());
while ($r = $res->fetch_assoc()) {
  array_push($arrjson['id'],$r['id']);
  array_push($arrjson['datetime'],$r['tanggal']);
  array_push($arrjson['name'],$r['nama']);
  array_push($arrjson['time'],$r['jam']);
}
echo json_encode($arrjson);
?>
