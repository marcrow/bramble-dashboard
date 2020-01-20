<?php
session_start();
if(empty($_POST['username'])) {
    echo "Username field is empty";
} else {
    if(empty($_POST['password'])) {
        echo "Password field is empty";
    } else {
        $username = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1");
        $password = $_POST['password'];
	$password = hash('sha256',$password);
	$mysqli = mysqli_connect("localhost", "web_agent", "password", "bramble");
    if(!$mysqli){
        echo "Error unable to connect to the database";
    } else {
		//Protection against brutforce
		$current_date = date("o-m-d");
		$query_fails = "SELECT nfail FROM fail WHERE day='".$current_date."';";
		$fails = mysqli_query($mysqli,$query_fails);
		$nb_fails = mysqli_fetch_assoc($fails);
		sleep((int)$nb_fails['nfail']);
		//end bruteforce protection
		$res=10;
		

				
		$user_agent = get_browser(null, true);

		$browser = htmlentities($user_agent['browser'], ENT_QUOTES, "ISO-8859-1");
		$version = htmlentities($user_agent['version'], ENT_QUOTES, "ISO-8859-1");
		$platform = htmlentities($user_agent['platform'], ENT_QUOTES, "ISO-8859-1");
		$device = htmlentities($user_agent['device_type'], ENT_QUOTES, "ISO-8859-1");
		
		
		$Requete = mysqli_query($mysqli,'CALL check_auth("'.$username.'","'.$password.'","'.$browser.'","'.$version.'","'.$platform.'","'.$device.'", @res, @isAdmin);');		
		$select = mysqli_query($mysqli, 'SELECT @res');
		$result = mysqli_fetch_assoc($select);
		if($result['@res'] != 1) {
				session_write_close();
				header("Location: /login.php?msg=afail1");
		        } else {
				//Set Bramble Path environment var
			    $bpath=getenv('BRAMBLE_PATH');
	                    $cmd="export BRAMBLE_PATH=$bpath";
            	 	    shell_exec($cmd);

			    $select = mysqli_query($mysqli, 'SELECT @isAdmin');
                	    $result = mysqli_fetch_assoc($select);
			    $_SESSION['is_admin'] = $result['@isAdmin'];
		            $_SESSION['username'] = $username;
		            $_SESSION['time'] = time();
			    $_SESSION['bramble_path'] = shell_exec("tools/bramble_path.sh"); 
					header('Location: index.php'); 
		        }
		    }
    }
}

?>
