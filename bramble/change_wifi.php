<?php


	echo htmlspecialchars($_POST['radio-inline']);
	echo htmlspecialchars($_POST['essid']);
	echo htmlspecialchars($_POST['bssid']);

	$interface=htmlspecialchars($_POST['radio-inline']);

	$bssid = htmlspecialchars($_POST['bssid']);
        $octet = explode( ":", $bssid );
        foreach($octet as $value){
                if(!ctype_xdigit($value)){
			echo "Error : Invalid Mac format";
		//	return -1;
		}
        }

	$password =  htmlspecialchars($_POST['password']);
	//$password = str_replace("\\","\\\\",$password);
	//$password = str_replace("&quot;","\&quot;",$password);
	//$password=escapeshellcmd($password);
	echo $password."\n--";

	$essid = htmlspecialchars($_POST['essid']);
	//$essid = str_replace("\\","\\\\",$essid);
        //$essid = str_replace("&quot;","\&quot;",$essid);

	echo $essid."****";

	
	$str = '/usr/bin/wifi "'.escapeshellcmd($interface).'"  "'.escapeshellcmd($essid).'"  "'.escapeshellcmd($bssid).'"  "'.escapeshellcmd($password).'"';
	echo $str;
	exit();
	$str = shell_exec('/usr/bin/wifi "'.escapeshellcmd($interface).'"  "'.escapeshellcmd($essid).'"  "'.escapeshellcmd($bssid).'"  "'.escapeshellcmd($password).'"');
	echo "--".$str."--";
	
?>
