<?php
include "facsession.php";
require "dbconfig.php";

$n=$_POST['Name'];
$uname = $_POST['email'];
$pword = $_POST['pword'];
$cn = $_POST['ContactNumber'];
$id = $_POST['ID'];
$d = $_POST['Department'];


$sql= "INSERT INTO faclogin (name,email,password,contactnumber,
id,department) VALUES
('$n','$uname','$pword','$cn','$id','$d')";

$data = mysqli_query($conn ,$sql);

if($data){
	echo '<script>alert("ACCOUNT CREATED... Please Login")</script>';
	$_SESSION['id']=$id;
	header('refresh:1;url=faclogin.html');
}
	
else{
	echo '<script>alert("ERROR!!!!!")</script>';
}

mysqli_close($conn);

?>

