<?php
include "stusession.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Home page</title>
	<link rel="stylesheet" href="homepage.css">
<style>
table {
  font-family: arial, sans-serif;
  width:100%;
}
th {
  border: 3px solid #dddddd;
  border-collapse:collapse;
 padding:10px;
 height:30px;
}
td{
	  border: 0px solid #dddddd;
 padding:10px;
  height:30px;
	  border-collapse:collapse;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h3>STUDENT HOME PAGE</h3>

<hr>
<br>
	<div class='head'>
	<a href ="stulogout.php"><button   class="logo" value="logout">LOGOUT</button></a>

</div>
<center>
<a href ="studentinsert.html"><button  value="insert">INSERT</button></a>

</center>

<br>
<hr>
<p></p>
<?php 

require "dbconfig.php";
$usn=$_SESSION['usn'];
$sql = "SELECT * FROM stucourse where usn='$usn' order by(infoid) DESC ";
$res=mysqli_query($conn,$sql);
//$result=mysqli_fetch_assoc($res);
    
	echo"<table border='4'>";
    echo "<tr>
		<th>INFO ID</th>
		<th>COURSE TITLE</th>
		<th>COURSE AUTHORITY</th>
		<th>CERTIFICATE ISSUEDATE</th>
		<th>VIEW FILE</th>
		<th>OPERATIONS</th>
		</tr>";

while ($row = mysqli_fetch_array($res)) {
	echo "<tr>
		<td><center>{$row['infoid']}</center></td>
		<td><center>{$row['title']}</center></td>
		<td><center>{$row['authority']}</center></td>
		<td ><center>{$row['issuedate']}</center></td>
		
		<td><center><a href='stuuploads/{$row['file']}' target='_blank'>
		view</a></center></td>
		<td>
		<a href='stuupdate1.php?infoid={$row['infoid']}'>update</a>
		<a href='studelete.php?infoid={$row['infoid']}'>delete</a>
		   </td>
			</tr>";
}
echo"</table>";

mysqli_close($conn);
?>
</body>
</html>