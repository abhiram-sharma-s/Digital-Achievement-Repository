<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>SORT RESULTS</title>
	<link rel="stylesheet" href="update.css">
		<style>
table {
  font-family: arial, sans-serif;
  width:100%;
}
 
button {
	background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
	color: white;
	padding: 12px 30px;
	margin: 8px 10px;
	border: none;
	border-radius: 8px;
	cursor: pointer;
	font-size: 14px;
	font-weight: 600;
	transition: all 0.3s ease;
	box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
	float:right;
}
button:hover {
	transform: translateY(-2px);
	box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}

th {
  border: 3px solid #dddddd;
  border-collapse:collapse;
 padding:10px;
 height:30px;
}
p{

font-size:20px;
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
select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  font-family:"TimesNewRoman";
  border: none;
  background: #f1f1f1;
}
.logo{
 background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
	color: white;
	padding: 12px 30px;
	margin: 8px 10px;
	border: none;
	border-radius: 8px;
	cursor: pointer;
	font-size: 14px;
	font-weight: 600;
	transition: all 0.3s ease;
	box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
	float:right;
}
.logo:hover {
 transform: translateY(-2px);
 box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}

	
</style>
</head>

<body>
<a href="adminhomepage1.php"><button class="logo"><b> BACK </b></button></a>
<a href="sortexport.php"><button ><b>EXPORT</b></button></a>
<form action="" method="POST">
	<h1>SEARCH BY:</h1><hr>
	
	<label><b>Select field:</b></label>
	<select name="field" id="field" >SELECT CATAGORY
	<div class="dropdown-content">
		<option value="title">Course Title</option>
		<option value="authority">Course authority</option>
		<option value="semester">Semester(*numbers only)</option>
		<option value="issuedate">Issue date(yyyy-mm-dd)</option>
		<option value="name">Student name</option>

	</div>
	</select><br><br>
	
	<label><b>Enter data to be searched:</b></label>
	<input type = "text" name="catagory" required><br><br>
	
	<button type="submit" id="submit" class="center" name="submit" value="SEARCH">SEARCH</button>
<br><br><br>
</form>

</body>

<?php
include "facsession.php";
require "dbconfig.php";
if(isset($_POST['submit'])) {
$f =$_POST['field'];
$input = $_POST['catagory'];

	$sql= "SELECT a.name,a.usn,a.department,a.semester,a.section,e.title,e.authority,e.issuedate
	  FROM stulogin as a,stucourse as e 
		WHERE  a.usn = e.usn and $f like '%$input%' ";
	 
	 $_SESSION['sql']=$sql;
	 
	 $res=mysqli_query($conn,$sql);
	 
	 $number=mysqli_num_rows($res);
	
	echo " <p><b>NUMER OF REULTS : $number </b></p>";
	 echo "<table border='3'> ";
echo "<tr>
		<th>SL NO</th>
		<th>NAME</th>
		<th>USN</th>
		<th>DEPARTMENT</th>
		<th>SEMESTER</th>
		<th>SECTION</th>
		<th>COURSE TITLE</th>
		<th>COURSE AUTHORITY</th>
		<th>ISSUE DATE</th>

		</tr>";
$i=1;
while ($row = mysqli_fetch_array($res)) {
	echo "<tr>
		<td><center>{$i}</center></td>
		<td><center>{$row['name']}</center></td>
		<td><center>{$row['usn']}</center></td>
		<td><center>{$row['department']}</center></td>
		<td><center>{$row['semester']}</center></td>	
		<td><center>{$row['section']}</center></td>	
		<td><center>{$row['title']}</center></td>	
		<td><center>{$row['authority']}</center></td>	
		<td><center>{$row['issuedate']}</center></td>	

		</tr>";
		$i++;
}
echo"</table>";

mysqli_close($conn);
}
?>


</html>