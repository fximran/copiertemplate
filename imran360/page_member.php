<?php
if(isset($_GET['url'])){
	$url=$_GET['url'];
	
	switch($url)
	{
		case 'profile':
		include 'profile.php';
		break;
		
		case 'profileedit':
		include 'profileedit.php';
		break;
		
		case 'user':
		include 'user.php';
		break;
		
		case 'useredit':
		include 'useredit.php';
		break;
		
		case 'useradd':
		include 'useradd.php';
		break;
		
		case 'report':
		include 'report.php';
		break;
		
		case 'ClientConfig':
		include 'ClientConfig.php';
		break;
		
		case 'runningtrade':
		include 'runningtrade.php';
		break;
		
		case 'logout':
		include 'logout.php';
		break;
		
		default:
		echo "Welcome ";
		break;
	}
}

?>