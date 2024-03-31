<?php
require 'koneksi.php';
$id=$_POST['id'];
$user=$_POST['user'];
$pass=$_POST['password'];
$status=$_POST['status'];
$expire=$_POST['expire'];

$sql=mysqli_query($con,"update user set user='$user',password='$pass',status='$status',license='$expire' where id='$id'");
if($sql)
{
	header('location:member.php?url=user');
}
?>