<?php
include "stusession.php";
require "dbconfig.php";
	
$user=$_POST['username'];
$pass=$_POST['password'];
$_SESSION['usn']=$user;
//$today = date("Y-m-d" , time());
$sql="SELECT * FROM stulogin where usn = '$user' AND password = '$pass' ";
	
$result =mysqli_query($conn ,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
	echo '<script>alert("LOGIN SUCCESSFULL!!!")</script>';
	
	$sql1= "INSERT INTO logtable(usn_id,logintime,role)
	VALUES ('$user',CURRENT_TIMESTAMP,'student')";
	$result1 =mysqli_query($conn ,$sql1);	
	if($result1){
		
    header('refresh:1;url=stuhomepage.php');
	}
	else{
		echo "error";
}
}
else{
	echo '<script>alert("INVALID LOGIN !!!")</script>';
		
	header('refresh:1;url=stulogin.html');
}


mysqli_close($conn);
?>