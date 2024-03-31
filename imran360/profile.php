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

  <title>Profile</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
	<div class="card shadow">
		<div class="card-header">
		Profile Data
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>USER</th>
							<th>PASSWORD</th>
							<th style="text-align: center;">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require 'koneksi.php';
							$sql=mysqli_query($con,"select * from admin where username='$user'");
							while($data=mysqli_fetch_array($sql))
							{
						?>
						<tr>
							<td><?php echo $data['id']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td>*****</td>
							<td style="text-align: center;">
                                <a href="member.php?url=profileedit&id=<?php echo $data['id']; ?>" class="btn btn-success btn-md">
                                <span class="fa fa-edit"></span></a>
                            </td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>