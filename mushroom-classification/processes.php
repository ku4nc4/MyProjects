<?php
    // include "connection.php";
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

//     $mysqli = mysqli_init();
//
//     $querya = "select * from trans order by rand()";
//     $queryb = "select * from trans order by rand()";
//
//     $resulta = $conn->query($querya);
//     $resultb = $conn->query($queryb);
//     $tempa = 0;
//     $tempb = 0;
//     $aword = "";
//     $bword = "";
//     $cword = "";
//     function percent($percentage)
//     {
//         $r = rand(0,100);
//         return ($r < $percentage);
//     };
//     $stat = 0;
//     $rownum = $resulta->num_rows;
//     while ($rowa = $resulta->fetch_assoc()){
//         $r = rand(1,10);
//         similar_text($input,$rowa['b'],$temppa);
//         similar_text($prev,$rowa['a'],$temppb);
//         if($temppa>80 && $temppb>80){
//             if($rowa['b']!=$prevprev){
//                 $cword = $rowa['c'];
//                 $bword = $rowa['b'];
//                 $aword = $rowa['a'];
//                 $stat = 1;
//             }
//         }
//     }
//     if($stat==0){
//         while($rowb = $resultb->fetch_assoc()){
//             similar_text($input,$rowb['b'],$temppa);
//             similar_text($prev,$rowb['a'],$temppb);
//             if($temppa*1.2+$temppb>$tempa*1.2+$tempb){
//                 if($rowb['b']!=$prevprev && $temppa+$temppb>=120){
//                     $tempa = $temppa;
//                     $tempb = $temppb;
// //                    echo $rowb['a']." ".$rowb['b'];
// //                    echo $tempa+$tempb."<br>";
//                     //echo $temp;
//                     $cword = $rowb['c'];
//                     $bword = $rowb['b'];
//                     $aword = $rowb['a'];
//                     $stat = 1;
//                 }
//             }
//         }
//     }
//
//     if($stat==0){
//         echo "$input";
//     }
//
//
//     $insquery = "";
//     echo $cword;<?php
  require_once 'vendor/autoload.php';

  $conn = new mysqli('localhost','root','','bot_chat');

  $querya = "select a from trans";
  $resa = $conn->query($querya);
  $texts = array();
  while ($row = $resa->fetch_assoc()) {
    array_push($texts,$row['a']);
  }

  $queryb = "select b from trans";
  $resb = $conn->query($queryb);
  $resps = array();
  while ($row = $resb->fetch_assoc()) {
    array_push($resps,$row['b']);
  }


  use Phpml\Classification\KNearestNeighbors;

  $text = "hello";

  function toFloat($t)
  {
    $arrhasil = array();
    foreach ($t as $key => $value) {
      $sumavg = sumavg($value);
      array_push($arrhasil,array($sumavg[0],$sumavg[1]));
    }
    return $arrhasil;
  }

  function sumavg($text)
  {
      $textarr = unpack("C*", $text);
      $sumarr = array_sum($textarr);
      $avgarr = $sumarr/count($textarr);
      return array($sumarr,$avgarr);
  }

  $contd = toFloat($texts);

  $sample = $contd;
  print_r($sample);
  echo "<br>";
  print_r($resps);

  $classifier = new KNearestNeighbors();
  $classifier->train($sample,$resps);

  $targettext = "how are you?";
  $targetarr = unpack("C*", $targettext);
  $sumtarr = array_sum($targetarr);
  $avgtarr = $sumtarr/count($targetarr);
  echo $sumtarr." ".$avgtarr;
  $hasil = $classifier->predict([$sumtarr,$avgtarr]);
  echo "<br>";
  echo $hasil;

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
