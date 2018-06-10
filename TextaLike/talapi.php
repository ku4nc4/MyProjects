<?php
  header('Content-Type: application/json');
  $api = $_GET['apikey'];
  $t1 = $_POST['t1'];
  $t2 = $_POST['t2'];
  require 'connection.php';
  $res = $conn->query("select * from user where apikey = '$api'");
  $objres = array('status'=>array(),'apiresult'=>array());
  $error = "100";
  $percentage = 0;
  $message = "OK";
  $creditleft = 0;
  if ($res->num_rows == null) {
    while ($row = $res->fetch_assoc()) {
      if ($row['credit']>0) {
        $creditleft = $row['credit']-1;
        $conn->query("update user set credit = credit-1 where user = ".$row['userid']);
        $percentage = talmain($t1,$t2);
      } else {
        $error = "200";
        $message = "no credit left";
      }
    }
  } else {
    $error = "110";
    $message = "invalid api key";
  }
  array_push($objres['status'],array('error'=>$error,'message'=>$message));
  array_push($objres['apiresult'],array('percentage'=>$percentage,'creditleft'=>$creditleft));

  echo json_encode($objres['status']);

function talmain($t1,$t2)
{
  $a = checks($t1, $t2);
  $b = 0;
  $c = 0;
  $b = check($t1, $t2, ".");
  $c = check($t1, $t2, " ");

  // return printf("%.2f %.2f %.2f", $a, $b, $c);
  // return printf("%.2f %.2f %.2f", $a*0.2, $b*0.6, $c*0.2);
  return $a*0.5+$b*0.3+$c*0.2;
}


  function check($t1, $t2, $del)
  {
      $score = 0;
      $tscore = 0;
      if (checkSim($t1, $t2)) {
          $score = 99;
          $tscore = 1;
      } else {
          $words1 = explode($del, $t1);
          $words2 = explode($del, $t2);
          // echo count($words1);
          foreach (array_keys($words1, '') as $key) {
              unset($words1[$key]);
          }
          foreach (array_keys($words2, '') as $key) {
              unset($words2[$key]);
          }
          $count = 0;
          $i = 0;
          $j = 0;
          $simword1 = array();
          $simword2 = array();
          while ($i<count($words1)) {
              while ($j<count($words2)) {
                  if (abs($i-$j)<=(count($words1)+count($words2))*0.1) {
                      if (levenshtein($words1[$i], $words2[$j])==0) {
                          $score += 100;
                          $tscore += 1;
                      } elseif (checkTypo($words1[$i], $words2[$j])) {
                          array_push($simword1, $words1[$i]);
                          array_push($simword2, $words2[$j]);
                          $score += 95;
                          $tscore += 1;
                      } elseif (checkTypo2($words1[$i], $words2[$j])) {
                          # code...
                          $score += 90;
                          $tscore += 1;
                      } elseif (checkTypo3($words1[$i], $words2[$j])) {
                          # code...
                          $score += 80;
                          $tscore += 1;
                      } else {
                      }
                  } else {
                      if (levenshtein($words1[$i], $words2[$j])==0) {
                          $score += 50;
                          $tscore += 1;
                      } elseif (checkTypo($words1[$i], $words2[$j])) {
                          array_push($simword1, $words1[$i]);
                          array_push($simword2, $words2[$j]);
                          $score += 40;
                          $tscore += 1;
                      } elseif (checkTypo2($words1[$i], $words2[$j])) {
                          # code...
                          $score += 30;
                          $tscore += 1;
                      } elseif (checkTypo3($words1[$i], $words2[$j])) {
                          # code...
                          $score += 20;
                          $tscore += 1;
                      } else {
                      }
                  }
                  $j++;
              }
              $j=0;
              $i++;
          }
      }
      if ($tscore==0) {
          return 0;
      } else {
          return $score/$tscore;
      }
  }

      function checks($t1, $t2)
      {
          $score = 0;
          $tscore = 0;
          if (checkSim($t1, $t2)) {
              $score = 99;
              $tscore = 1;
          } else {
              $words1 = preg_split("/\\r\\n|\\r|\\n/", $t1);

              $words2 = preg_split("/\\r\\n|\\r|\\n/", $t2);
              foreach (array_keys($words1, '') as $key) {
                  unset($words1[$key]);
              }
              foreach (array_keys($words2, '') as $key) {
                  unset($words2[$key]);
              }
              // echo count($words1);
              // echo count($words2);
              $count = 0;
              $i = 0;
              $j = 0;
              $simword1 = array();
              $simword2 = array();
              while ($i<count($words1)) {
                  while ($j<count($words2)) {
                      if (similar_text($words1[$i], $words2[$j])==0) {
                          $score += 99;
                          $tscore += 1;
                      } elseif (checkTypos($words1[$i], $words2[$j])) {
                          array_push($simword1, $words1[$i]);
                          array_push($simword2, $words2[$j]);
                          $score += 60;
                          $tscore += 1;
                      } elseif (checkTypos2($words1[$i], $words2[$j])) {
                          # code...
                          $score += 50;
                          $tscore += 1;
                      } elseif (checkTypos3($words1[$i], $words2[$j])) {
                          # code...
                          $score += 40;
                          $tscore += 1;
                      } else {
                          $score += 10;
                          $tscore += 1;
                      }
                      $j++;
                  }
                  $j=0;
                  $i++;
              }
          }


          if ($tscore==0) {
              return 0;
          } else {
              return $score/$tscore;
          }
      }


  // echo $score." ".$tscore;


  // for ($i=0; $i < count($simword1); $i++) {
  //     echo $simword1[$i]." ".$simword2[$i]."<br>";
  // }
  function checkSim($w1, $w2)
  {
      similar_text($w1, $w2, $p);
      if ($p>99.9) {
          return 1;
      } else {
          return 0;
      }
  }

  function checkTypo($w1, $w2)
  {
      if (levenshtein($w1, $w2)<(strlen($w1)+strlen($w2))*0.25) {
          return 1;
      } else {
          return 0;
      }
  }

  function checkTypo2($w1, $w2)
  {
      if (levenshtein($w1, $w2)<(strlen($w1)+strlen($w2))*0.3) {
          return 1;
      } else {
          return 0;
      }
  }

  function checkTypo3($w1, $w2)
  {
      if (levenshtein($w1, $w2)<(strlen($w1)+strlen($w2))*0.35) {
          return 1;
      } else {
          return 0;
      }
  }

  function checkTypos($w1, $w2)
  {
      similar_text($w1, $w2, $p);
      if ($p>20) {
          return 1;
      } else {
          return 0;
      }
  }

  function checkTypos2($w1, $w2)
  {
      similar_text($w1, $w2, $p);
      if ($p>10) {
          return 1;
      } else {
          return 0;
      }
  }

  function checkTypos3($w1, $w2)
  {
      similar_text($w1, $w2, $p);
      if ($p>5) {
          return 1;
      } else {
          return 0;
      }
  }
 ?>
