<?php
require 'koneksi.php';
$users=trim($_GET['user']);
	$send="";
	if(mysqli_connect_error()){
		echo "Failed Connected";
		echo mysqli_connect_error();
	}else
	{
		$result=mysqli_query($con,"SELECT * FROM user WHERE user='$users'");
		while($row=mysqli_fetch_array($result)){
			$id=$row['id'];
			$user=$row['user'];
			$pass=$row['password'];
			$status=$row['status'];
			$expire=$row['license'];
			$send=$send."$id,$user,$pass,$status,$expire";
		}
	}
	mysqli_close($con);
	echo $send;
?>