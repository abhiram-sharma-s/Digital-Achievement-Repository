<?php

include "stusession.php";
require "dbconfig.php";

$n=$_POST['Name'];
$uname = $_POST['uname'];
$pword = $_POST['pword'];
$cn = $_POST['ContactNumber'];
$usn = $_POST['USN'];
$d = $_POST['Department'];
$sem = $_POST['Semester'];
$sec = $_POST['Section'];


$sql= "INSERT INTO stulogin (name,email,password,contactnumber,
usn,department,semester,section) VALUES
('$n','$uname','$pword','$cn','$usn','$d','$sem','$sec')";




$data = mysqli_query($conn ,$sql);

if($data){
	echo '<script>alert("ACCOUNT CREATED... Please Login")<script>';
	$_SESSION['usn']= $usn;
	header('refresh:1;url=stulogin.html');
}
	
else{
	echo '<script>alert("ERROR!!!!!")</script>';
}

mysqli_close($conn);

?>

