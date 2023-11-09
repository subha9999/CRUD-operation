<?php
require "display.php";
$sql="SELECT * FROM users";
$result=mysqli_query($link,$sql);
$file=fopen("userDetails.csv","w");
$list=array();
while($row=mysqli_fetch_row($result)){
$list[]=$row;
}
foreach($list as $line){
    fputcsv($file,$line);
}
fclose($file);

//echo file_get_contents("userDetails.csv");
header('Content-Description:File Transfer');
header('Content-Type: text/csv ; charset=utf-8');
header('Content-Disposition:attachment;filename=userDetails.csv');
header("Pragma: no-cache");  
header("Expires: 0");
readfile('userDetails.csv');
?>
