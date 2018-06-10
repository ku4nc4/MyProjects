<?php
require_once 'vendor/autoload.php';
$conn = new mysqli('localhost','root','','bot_chat');
$queryb = "select b from trans";
$resb = $conn->query($queryb);
$texts = array();
while ($row = $resb->fetch_assoc()) {
  array_push($texts,$row['b']);
}

$queryc = "select c from trans";
$resc = $conn->query($queryc);
$resps = array();
while ($row = $resc->fetch_assoc()) {
  array_push($resps,$row['c']);
}

use Phpml\Classification\MLPClassifier;
use Phpml\Classification\KNearestNeighbors;
use Phpml\ModelManager;
use Phpml\Preprocessing\Normalizer;
$text = "hello";

function toFloat($t)
{
  $arrhasil = array();
  foreach ($t as $key => $value) {
    $sumavg = sumavg($value);
    array_push($arrhasil,array($sumavg[0],$sumavg[1],$sumavg[2],$sumavg[3]));
  }
  return $arrhasil;
}

function sumavg($text)
{
    $wordarr = explode(" ", $text);
    $letterarr = str_split($text);
    $textarr = unpack("C*", $text);
    $sumarr = array_sum($textarr);
    $avgarr = $sumarr/count($textarr);
    return array($sumarr,$avgarr,count($wordarr),count($letterarr));
}
$contd = toFloat($texts);

$sample = $contd;

$normalizer = new Normalizer(Normalizer::NORM_L1);
$normalizer->fit($sample);

$mlp = new MLPClassifier(1000, [1000], $resps);
$classifier = new KNearestNeighbors();
$classifier->train($sample,$resps);

$filepath = '/modelasdf';
$mm = new ModelManager();
$mm->saveToFile($classifier,$filepath);
 ?>
