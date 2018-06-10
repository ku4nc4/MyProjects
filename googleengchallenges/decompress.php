<?php
$inp = "2[asdf]";

$arrinp = arraying($inp);

foreach ($arrinp as $key => $value) {
  main($value);
}

function arraying($inp)
{
  $inp = preg_replace('/](\d+)/','] $1',$inp);
  return $arrinp = explode(' ',$inp);
}

function main($inp)
{
  $poss = strpos($inp,'[');
  $pose = strpos($inp,']');
  $num = substr($inp,0,$poss);
  $string = substr($inp,$poss+1,$pose-2);
  for ($i=0; $i < $num; $i++) {
    echo $string;
  }
}


 ?>
