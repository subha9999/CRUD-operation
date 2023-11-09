<?php  
require "display.php"; 
$sql = "SELECT * FROM users";  
$result = mysqli_query($link, $sql);   
$columnHeader = "User Id" . "\t" . "Email" . "\t" ." Password" . "\t" . "Name" . "\t". "Address" . "\t". "City" . "\t". "Image_file" . "\t";  
$setData = '';  
  while ($row = mysqli_fetch_row($result)) {  
    $rowData = '';  
    foreach ($row as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= $rowData . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 