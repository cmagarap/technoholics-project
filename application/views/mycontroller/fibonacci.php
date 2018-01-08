<?php
//Sequence Variable
$a = 0; $b = 1;

//Iteration Variable
$length = $textinput;
$ctr = 0;

while($ctr < $length){
    echo $a."&nbsp;";
    $a += $b;
    $b = $a-$b;
 $ctr++;   
}

