<?php
require 'koneksi.php';
$sql=mysqli_query($con,"delete from user where id='$_GET[id]'");
if($sql)
{
	header('location:member.php?url=user');
}
?>