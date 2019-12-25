<?php

function secure_page(){
	session_start();
	if(!isset($_SESSION['username']) || !isset($_SESSION['time']))
	{
    		header("Location: /login.php?msg=afail2");
                exit();
	}
	$last_activity = time() - $_SESSION['time'];
	if($last_activity > 1200) //disconnect the user after 20min of inactivity
	{
		header("Location: /login.php?msg=afail3");
		exit();
	}
	$_SESSION['time'] = time(); 
}

function disconnect(){
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: /login.php?msg=disconnected");
}

function display_error(){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

?>
