<?php


session_start();
if( !isset($_SESSION['id']) && !isset($_SESSION['sql'])) {
	header('location=faclogin.html');
}

?>