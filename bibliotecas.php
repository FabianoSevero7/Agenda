<?php

function databr($data){

$d=explode("-",$data);

$br=$d[2]."/".$d[1]."/".$d[0];

return $br;
}




?>