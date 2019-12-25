<?php
session_start();
if(empty($_POST['username'])) {
    echo "Username field is empty";
} else {
    if(empty($_POST['password'])) {
        echo "Password field is empty";
    } else {
        $username = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $password = hash('sha256',$password);
        $mysqli = mysqli_connect("localhost", "web_agent", "password", "bramble");
    if(!$mysqli){
        echo "Error unable to connect to the database";
    } else {
		$res=10;
		echo $username." ".$password;
		$Requete = mysqli_query($mysqli,'CALL check_auth("'.$username.'","'.$password.'","tmp", @res);');
		$select = mysqli_query($mysqli, 'SELECT @res');
		$result = mysqli_fetch_assoc($select);
		echo $result['@res'];
		print_r($result);
		echo "-----***";
		if($result['@res'] != 1) {
		        echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
				session_write_close();
				header("Location: /login.php?msg=afail1");
		        } else {
		            $_SESSION['username'] = $username;
		            $_SESSION['time'] = time(); 
					header('Location: index.php'); 
		        }
		    }
    }
}

?>
