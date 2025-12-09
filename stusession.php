<?php


session_start();
if( !isset($_SESSION['usn'])) {
	header('location=stulogin.html');
}



?>