<?php
session_start();
$user=$_SESSION['username'];
require 'koneksi.php';
$user=$_POST['user'];
$pass=$_POST['password'];
$status=$_POST['status'];
$expire=$_POST['expire'];
$sql=mysqli_query($con,"insert into user(user,password,status,license) values('$user','$pass','$status','$expire')");
if($sql)
{
	header('location:member.php?url=user');
}
?>