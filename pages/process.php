<?php
include '../config.tpl';
$query = "SELECT * FROM data ORDER BY id DESC";
$shouts = mysqli_query($con,$query);
$outp = "[";
while($rs = mysqli_fetch_assoc($shouts)){
     if ($outp != "[") {$outp .= ",";}
    $outp .= '{"time":"'  . $rs["time"] . '",';
    $outp .= '"user":"'   . $rs["user"]        . '",';
    $outp .= '"message":"'. $rs["message"]     . '"}'; 
}
$outp .="]";

echo $outp;
?>