<?php


$dbhost = 'localhost'; //Dont Change
$dbuser = 'root';    // Dont change
$dbpass = '';        // your mysql password 
$dbname='moocmanagement';    // Your database
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//echo " Connection Succesful";
?>