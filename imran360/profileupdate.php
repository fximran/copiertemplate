<?php
require 'koneksi.php';
$id=$_POST['id'];
$user=$_POST['user'];
$password=$_POST['password'];

$sql=mysqli_query($con,"update admin set username='$user',password='$password' where id='$id'");
if($sql)
{
	header('location:member.php?url=profile');
}
?>