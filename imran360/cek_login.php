<?php
require "koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];

$sql=mysqli_query($con,"select * from admin where username='$user' AND password='$pass'");
$cek=mysqli_num_rows($sql);

if($cek>0)
{
	$data=mysqli_fetch_array($sql);
	session_start();
	$_SESSION['username']=$user;
	header("location:member.php?url=profile");
}
else
{
	echo "<center><h2>Username or Password WRONG</h2></center>";
	header('location:index.php');
}
?>