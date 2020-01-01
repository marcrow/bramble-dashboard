<?php
include 'tools/security.php';
secure_page();
?>
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
	echo $password."--";

	$essid = htmlspecialchars($_POST['essid']);
	$essid = substr($essid, 0, -2);
	//$essid = str_replace("\\","\\\\",$essid);
        //$essid = str_replace("&quot;","\&quot;",$essid);
	echo $essid."****";

	
	$str = "sudo /usr/bin/wifi ".escapeshellarg($interface)."  ".escapeshellarg($essid)."  ".escapeshellarg($bssid)."  ".escapeshellarg($password).' test';
	//echo $str;
	//exit();
	$str = shell_exec($str);
	//$str = shell_exec('/usr/bin/wifi "'.escapeshellcmd($interface).'"  "'.escapeshellcmd($essid).'"  "'.escapeshellcmd($bssid).'"  "'.escapeshellcmd($password).'"');
	echo "--".$str."--";

	$str = shell_exec("sudo /var/www/bramble-dashboard/bramble/tools/restartInterface.sh ".escapeshellarg($interface));
	echo $str;
	
?>
