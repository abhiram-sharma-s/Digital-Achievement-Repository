<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>STUDENT UPDATE FORM</title>
	<link rel="stylesheet" href="update.css">
	<style>
	select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  font-family:"TimesNewRoman";
  border: none;
  background: #f1f1f1;
}
	</style>
</head>

<?php 

require "dbconfig.php";

$infoid = $_GET['infoid'];
?>
<body>
<div style="float: right; margin: 10px;">
	<a href="stuhomepage.php" class="back-button" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 30px; margin: 8px 0; border: none; border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4); text-decoration: none; display: inline-block; text-align: center;">BACK</a>
</div>

	<form  method="POST">
	<div class="container">
		<h1><center>UPDATE FORM</center></h1><hr>

		<!--<label><b>Info ID</b></label><br>
		<input type="number" name="inid" ><br><br>-->
		
		 <label><b>*Select field </b></label><br>
		 <select type="dropdown" name="field" required>
			<option >---SELECT---<br>
			<option  value="title">CourseTitle<br>
			<option value="authority">CourseAuthority<br>
			<option value="issuedate">CertificateDate<br></select>
			<br><br>
				
		<label><b>Updated info</b></label><br>
		<input type="text" name="updateinfo" required> <br><br>
		
		<button type="submit" id="submit" class="center" name="submit" value="UPDATE">UPDATE</button>
	</div>
	</form>
	</body>


<?php
if(isset($_POST['submit'])){
$f = $_POST['field'];
$info = $_POST['updateinfo'];

$sql = "UPDATE stucourse SET $f='$info' WHERE infoid='$infoid' ";

$result =mysqli_query($conn ,$sql);

if($result){
	
	echo '<script>alert("UPDATED SUCCESSFULLY!!!")</script>' ;
    
	header('refresh:0;url=stuhomepage.php');
}
else{
	echo '<script>alert("ERROR !!!")</script>';
	//header('refresh:1;url=stuupdate1.php');	
}

mysqli_close($conn);

}
?>
</html>