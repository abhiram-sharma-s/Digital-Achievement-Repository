<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>HOME</title>
	<link rel="stylesheet" href="homepage.css">
	
	<style>
table {
  font-family: arial, sans-serif;
 width:100%;
}

th ,td{
  border: 3px solid #dddddd;
 border-collapse:collapse;
 padding:3px;
 height:40px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
	
</style>
</head>
<body>
<h3>Faculty Home page:</h3>
<hr>
<br>
	<div class='head'>
		<a href="faclogout.php"><button>LOG OUT</button></a>
	</div>
		
	<center>
	<a href="facultyinsert.html"><button>INSERT</button></a>
	
	
	</center>
<br>
<hr>
<p></p>

<?php 
include "facsession.php";
require "dbconfig.php";

$id=$_SESSION['id'];
$sql = "SELECT * FROM faccourse where id = '$id' ORDER BY infoid DESC ";
$res=mysqli_query($conn,$sql);
//$result=mysqli_fetch_assoc($res);
	
echo "<table border='3'> ";
echo "<tr>
		<th>INFO ID</th>
		
		<th>COURSE TITLE</th>
		<th>COURSE AUTHORITY</th>
		<th>CERTIFICATE ISSUEDATE</th>
		<th>FILE</th>
		<th>OPERATIONS</th>
		</tr>";

while ($row = mysqli_fetch_array($res)) {
	echo "<tr>
		<td><center>{$row['infoid']}</center></td>	
		<td><center>{$row['title']}</center></td>
		<td><center>{$row['authority']}</center></td>
		<td><center>{$row['issuedate']}</center></td>
		
		<td><a href='facuploads/{$row['file']}' target='_blank'>view</a></td>
		
		<td><a href='facupdate1.php?infoid={$row['infoid']}'>update</a> &nbsp
		<a href='facdelete.php?infoid={$row['infoid']}'>delete</a></td>
			</tr>";
}
echo"</table>";

mysqli_close($conn);
?>

</body>
</html>


