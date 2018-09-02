<?php 
	session_start();
	// unset($_SESSION['prendas']);
	unset($_SESSION['prendas'][$_POST['id']]);
?>