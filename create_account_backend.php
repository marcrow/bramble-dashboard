<?php
include 'tools/security.php';
admin_only();
if(empty($_POST['username'])) {
    echo "Username field is empty";
} else {
    if(empty($_POST['email'])){
	echo "Email field is empty";
    } else{
    if(empty($_POST['password'])) {
        echo "Password field is empty";
    } else {
        $username = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $email =  htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1");
	$password = hash('sha256',$password);
	$is_admin = 1;
	if(empty($_POST['is_admin'])) {
		$is_admin = 0;
	}
	echo $username." : ".$password." : ".$is_admin." : ".$email;
        $mysqli = mysqli_connect("localhost", "web_agent", "password", "bramble");
    	if(!$mysqli){
        	echo "Error unable to connect to the database";
    	} else {
		$res=10;
		echo $username." ".$password;
		$Requete = mysqli_query($mysqli,'insert into auth values ("'.$username.'","'.$password.'","'.$email.'","'.$is_admin.'");');
		if($Requete === FALSE){
			echo "Something is wrong with this user. The creation failed.";
		}
	}
	}
    }

}

?>
