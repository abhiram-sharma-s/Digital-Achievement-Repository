<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title> ADMIN HOME</title>
	<link rel="stylesheet" href="homepage.css">
	
	<style>
table {
  font-family: arial, sans-serif;
  width:100%;
}

th {
  border: 3px solid #dddddd;
  border-collapse:collapse;
 padding:3px;
 height:30px;
}
td{
	  border: 0px solid #dddddd;
 padding:3px;
  height:40px;
	  border-collapse:collapse;
}

tr:nth-child(even) {
	
  background-color: #dddddd;
}
	
</style>
</head>
<body>
<h3>ADMIN home page (student) :</h3>
<hr>
<br>
	<div class='head'>
		<a href="faclogout.php"><button>LOG OUT</button></a>
	</div>
		
	<center>
	<a href="export.php"><button>EXPORT</button></a>
	
	<!--<a href="facupdate.html"><button>UPDATE</button></a>
	
	<a href="facdelete.html"><button>DELETE</button></a>-->
	
	<a href="barchart.php"><button>GRAPH VIEW</button></a>

	<a href="resultsort.php"><button>SEARCH</button></a>
		<a href="adminselect.html"><button>BACK</button></a>

	</center>
<br>
<hr>
<p></p>

<?php 
include "facsession.php";
require "dbconfig.php";

$id=$_SESSION['id'];
$sql = "SELECT * FROM stucourse  ";
$res=mysqli_query($conn,$sql);
//$result=mysqli_fetch_assoc($res);
	
echo "<table border='3'> ";
echo "<tr>
		<th>INFO ID</th>
		<th>USN</th>
		<th>COURSE TITLE</th>
		<th>COURSE AUTHORITY</th>
		<th>CERTIFICATE ISSUEDATE</th>
		<th>FILE</th>
		
		</tr>";

while ($row = mysqli_fetch_array($res)) {
	echo "<tr>
		<td><center>{$row['infoid']}</center></td>
		<td><center>{$row['usn']}</center></td>
		<td><center>{$row['title']}</center></td>
		<td><center>{$row['authority']}</center></td>
		<td><center>{$row['issuedate']}</center></td>
		
		<td><a href='stuuploads/{$row['file']}' target='_blank'>view</a></td>		
		</tr>";
}
echo"</table>";

mysqli_close($conn);
?>

</body>
</html>


