<?PHP
require "facsession.php";
require "dbconfig.php";

$id=$_SESSION['id'];
if (isset($_POST["submit"])) {
	//$usn = $_POST['ID'];
	$t = $_POST['CourseTitle'];
	$a = $_POST['CourseAuthority'];
	$d = $_POST['CertificateIssueDate'];
	
	#file name with a random number so that similar dont get replaced
     $pname = $id."-".$_FILES["file"]["name"];
  
	#temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];

	$uploads_dir = 'facuploads';
	$dest = $uploads_dir.'/'.$pname;

	move_uploaded_file($tname ,$dest);
	#sql query to insert into database
	$sql = "INSERT INTO faccourse(id,title,authority,issuedate,file)
	VALUES ('$id','$t','$a','$d','$pname')";
	
	if(mysqli_query($conn,$sql)){
 
    echo '<script>alert("Info Sucessfully uploaded")</script>';
	header('refresh:1;url=fachomepage.php');
	
    }
    else{
        echo '<script>alert("Error")</script>';
		header('refresh:1;url=facultyinsert.html');
    }
}

mysqli_close($conn);
?>