<?php
  require_once 'vendor/autoload.php';

  $conn = new mysqli('localhost','root','','bot_chat');
  $querya = "select a from trans";
  $resa = $conn->query($querya);
  $textsa = array();
  while ($row = $resa->fetch_assoc()) {
    array_push($textsa,$row['a']);
  }

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


  use Phpml\Classification\KNearestNeighbors;
  use Phpml\ModelManager;
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

  $classifier = new KNearestNeighbors();
  // $classifier->train($sample,$resps);
  $mm = new ModelManager();
  $classifier = $mm->restoreFromFile('/modelasdf');
  $targettext = $_POST['inp'];
  $wordarr = explode(" ", $targettext);
  $letterarr = str_split($targettext);
  $targetarr = unpack("C*", $targettext);
  $sumtarr = array_sum($targetarr);
  $avgtarr = $sumtarr/count($targetarr);
  $hasil = $classifier->predict([$sumtarr,$avgtarr,count($wordarr),count($letterarr)]);
  echo $hasil;

  $input = $_POST['inp'];
  $prev = "";
  if(isset($_POST['prev'])){
      $prev = $_POST['prev'];
  } else {
      $prev = "";
  }

  if(isset($_POST['prevprev'])){
      $prevprev = $_POST['prevprev'];
  } else {
      $prevprev = "hi";
  }

  $ginput = mysqli_real_escape_string($conn,$input);
  $prevprev = trim($prevprev);
  $prev = trim($prev);
  $ginput = trim($ginput);

  $insquery = "insert into trans(`a`,`b`,`c`) values('$prevprev','$prev','$ginput')";

  if($conn->query($insquery)===true){
  } else {
      echo $conn->error;
  }
 ?>
