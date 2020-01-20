<?php

include 'tools/security.php';
secure_page();

$mode = $_POST['menuConf'];
if($mode=="Classic"){
	$menu = "0";
}
else if ($mode=="Light"){
	$menu = "1";
}
else{
	header("Location: /index.php?msg=afail1");
	exit();
}

$bPath = getenv('BRAMBLE_PATH');
$cmd = "$bPath/option/src/changeLvl.sh --changeLvl $menu";
$mode = shell_exec($cmd);
echo $mode;
//header("Location: /index.php");








?>
