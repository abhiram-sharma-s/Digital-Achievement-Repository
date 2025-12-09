<?PHP
require "stusession.php";
require "dbconfig.php";

$usn=$_SESSION['usn'];
if (isset($_POST["submit"])) {
	//$usn = $_POST['USN'];
	$t = $_POST['CourseTitle'];
	$a = $_POST['CourseAuthority'];
	$d = $_POST['CertificateIssueDate'];
	
	#file name with a random number so that similar dont get replaced
     $pname = $usn."-".$_FILES["file"]["name"];
  
	#temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];  

	$uploads_dir = 'stuuploads';
	$dest = $uploads_dir.'/'.$pname;

	move_uploaded_file($tname ,$dest);
	#sql query to insert into database
	$sql = "INSERT INTO stucourse(usn,title,authority,issuedate,file)
	VALUES ('$usn','$t','$a','$d','$pname')";
	
	if(mysqli_query($conn,$sql)){
 
    echo '<script>alert("Info Sucessfully inserted")</script>';
	header('refresh:1;url=stuhomepage.php');
	
    }
    else{
        echo '<script>alert("Error")</script>';
		header('refresh:1;url=studentinsert.html');
    }
}

mysqli_close($conn);
?>