<?php
	sleep(1);
	if(empty($_POST['username'])) {
		header("Location: /forgot-password.php?msg=error_user");
		exit();
	} 
	if(empty($_POST['code'])){
		header("Location: /forgot-password.php?msg=error_code1");
		exit();
	}
	if(empty($_POST['pass1'])) {
		header("Location: /forgot-password.php?msg=error_pass1");
		exit();
	}
	if(empty($_POST['pass2'])) {
		header("Location: /forgot-password.php?msg=error_pass2");
		exit();
	} 
	$username = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1");
	$password = htmlentities($_POST['pass1'], ENT_QUOTES, "ISO-8859-1");
	$verif_password = htmlentities($_POST['pass2'], ENT_QUOTES, "ISO-8859-1");
	if($password != $verif_password){
		header("Location: /forgot-password.php?msg=error_pass3");
		exit();
	}
	$code =  htmlentities($_POST['code'], ENT_QUOTES, "ISO-8859-1");
//	if(preg_match('/^[0-9A-Fa-f]{10}_.*/', $code)==FALSE){
//		header("Location: /forgot-password.php?msg=error_code2");
//		echo $code;
//		echo preg_match('/^[0-9A-Fa-f]{10}_.*/', $code);
//		exit();
//	}
	$code=strtolower($code);
	$password = hash('sha256',$password);
	
	
	
	$mysqli = mysqli_connect("localhost", "web_agent", "password", "bramble");
	if(!$mysqli){
		header("Location: /forgot-password.php?msg=error_sql1");
		exit();
	} 
	$res=10;
	$Requete = mysqli_query($mysqli,'CALL reset_password("'.$username.'","'.$code.'","'.$password.'",@status);');
	if($Requete === FALSE){
		header("Location: /forgot-password.php?msg=error_sql2");
		exit();
	}
	$select = mysqli_query($mysqli, 'SELECT @status');
	$result = mysqli_fetch_assoc($select);
	
	//if success
	if($result['@status']==0){
		header("Location: /login.php?msg=reset");
		exit();
	}
	
	//invalid password format
	if($result['@status']==-1){
		header("Location: /forgot-password.php?msg=error_pass4");
		exit();
	}
	
	//invalid code format
	if($result['@status']==-2){
		header("Location: /forgot-password.php?msg=error_code2");
		exit();
	}
	
	//invalid code
	if($result['@status']==-3){
		header("Location: /forgot-password.php?msg=error_code3");
		exit();
	}

?>

