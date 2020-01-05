<?php
include 'tools/security.php';
admin_only();
if(empty($_POST['username'])) {
    header("Location: /login.php?msg=afail1");
    exit();
} 
if(empty($_POST['email'])){
	header("Location: /login.php?msg=afail2");
	exit();
    }
    if(empty($_POST['password'])) {
	header("Location: /login.php?msg=afail3");
	exit();
    } 
        $username = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $email =  htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1");
	$password = hash('sha256',$password);
	$is_admin = 1;
	if(empty($_POST['is_admin'])) {
		$is_admin = 0;
	}
        $mysqli = mysqli_connect("localhost", "web_agent", "password", "bramble");
    	if(!$mysqli){
		header("Location: /login.php?msg=afail4");
		exit();
    	} 
		$res=10;
		echo $username." ".$password;
		$Requete = mysqli_query($mysqli,'insert into auth values ("'.$username.'","'.$password.'","'.$email.'","'.$is_admin.'");');
		if($Requete === FALSE){
			header("Location: /login.php?msg=afail5");
			exit();
		}
	header("Location: /index.php");



?>
