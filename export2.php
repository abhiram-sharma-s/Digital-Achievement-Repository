<?php


require "dbconfig.php";

$filename ="Export"."-".date("d-m-y").".xls";// File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.xls");
$user_query = 'select * from faccourse';
$data = mysqli_query($conn,$user_query);
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($data)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>