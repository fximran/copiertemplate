<?php
$user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User List</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<div class="card-shadow">
	<div class="card-header">
		Edit User
	</div>
	<div class="card-body">
		<form action="userupdate.php" method="post" class="form-horizontal">
				<?php
					require 'koneksi.php';
					$sql=mysqli_query($con,"select * from user where id='$_GET[id]'");
					while($data=mysqli_fetch_array($sql))
					{
				?>
			<div class="form-group col-sm-4">
				<label>ID</label>
				<input type="text" name="id" class="form-control" value="<?php echo $data['id'];?>" readonly>
			</div>
			<div class="form-group col-sm-4">
				<label>USER</label>
				<input type="text" name="user" class="form-control" value="<?php echo $data['user'];?>">
			</div>
			<div class="form-group col-sm-4">
				<label>PASSWORD</label>
				<input type="text" name="password" class="form-control" value="<?php echo $data['password'];?>">
			</div>
			<div class="form-group col-sm-4">
				<label>STATUS</label>
				<select name="status">
						<option value="" disabled selected><?php echo $data['status'];?></option>
						<option value="Active">Active</option>
						<option value="Expired">Expired</option>
						<option value="Banned">Banned</option>
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label>EXPIRE</label>
				<input type="date" name="expire" class="form-control" value="<?php echo $data['license'];?>">
			</div>
			<div class="form-group col-sm-4">
				<input type="submit" class="btn-primary" value="Update">
			</div>
				<?php } ?>
		</form>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>