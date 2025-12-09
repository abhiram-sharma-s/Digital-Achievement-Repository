<?php
include "facsession.php";
require "dbconfig.php";
	
$user=$_POST['username'];
$pass=$_POST['password'];
$_SESSION['id']=$user;


$sql="SELECT * FROM faclogin where id = '$user' AND
password = '$pass' and role ='admin' ";
$result =mysqli_query($conn ,$sql);
	
	$row =mysqli_num_rows($result);
	
	if($row >= 1) {
		
$check = mysqli_fetch_array($result);
if(isset($check)){
	
	echo '<script>alert("ADMIN LOGIN SUCCESSFULL !!!")</script>';
	$sql3= "INSERT INTO logtable(usn_id,logintime,role)
	VALUES ('$user',CURRENT_TIMESTAMP,'admin')";
	$result3 =mysqli_query($conn ,$sql3);	
	if($result3){
		
    header('refresh:1;url=adminselect.html');
	}
	else{
		echo "error";
}
	//exit();
}
else{
	echo '<script>alert("INVALID ADMIN LOGIN !!!")</script>';
		
	header('refresh:1;url=faclogin.html');
}
	}
	else {
		$sql1="SELECT * FROM faclogin where id = '$user' AND
password = '$pass' and role ='user' ";
$result1 =mysqli_query($conn ,$sql1);
	
	
$check1 = mysqli_fetch_array($result1);
if(isset($check1)){
	
	echo '<script>alert("LOGIN SUCCESSFULL !!!")</script>';
	
    $sql2= "INSERT INTO logtable(usn_id,logintime,role)
	VALUES ('$user',CURRENT_TIMESTAMP,'faculty')";
	$result2 =mysqli_query($conn ,$sql2);	
	
	if($result2){
		
    header('refresh:1;url=fachomepage.php');
	}
	else{
		echo "error";
}
}


else{
	echo '<script>alert("INVALID LOGIN !!!")</script>';
		
	header('refresh:1;url=faclogin.html');
}
	}
mysqli_close($conn);
?>