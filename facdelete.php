<?php
include "facsession.php";

require "dbconfig.php";

$rowid =$_GET['infoid'];

$sql = "DELETE FROM faccourse WHERE infoid='$rowid' " ;

if(mysqli_query($conn,$sql)){
 
    echo '<script>alert("Info Sucessfully deleted")</script>';
	header('refresh:1;url=fachomepage.php');
	
    }
    else{
        echo '<script>alert("Error")</script>';
		header('refresh:1;url=fachomepage.php');
    }




?>