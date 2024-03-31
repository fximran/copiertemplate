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

  <title>User Configuration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- BOOTSTRAP 4-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <!-- DATATABLES BS 4-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">
	<div class="card shadow">
		<div class="card-header">
		USER Data
		</div>
		<div class="card-body">
			<a href="member.php?url=useradd" class="btn btn-success btn-md"><span class="fa fa-plus"></span> ADD</a><br><br>
			<div class="table-responsive">
				<table class="table table-bordered" id="mytable" style="margin-top: 10px">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>USER</th>
							<th>PASSWORD</th>
							<th>STATUS</th>
							<th>EXPIRE</th>
							<th style="text-align: center;">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=1;
							require 'koneksi.php';
							$sql=mysqli_query($con,"select * from user");
							while($data=mysqli_fetch_array($sql))
							{
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['id']; ?></td>
							<td><?php echo $data['user']; ?></td>
							<td><?php echo $data['password']; ?></td>
							<td><?php echo $data['status']; ?></td>
							<td><?php echo $data['license']; ?></td>
							<td style="text-align: center;">
                                <a href="member.php?url=useredit&id=<?php echo $data['id']; ?>" class="btn btn-success btn-md">
                                <span class="fa fa-edit"></span></a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="userdelete.php?id=<?php echo $data['id']; ?>" 
                                class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                            </td>
						</tr>
						<?php
                            $no++;
                            }
                        ?>
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
  <!-- jQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- DATATABLES BS 4-->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- BOOTSTRAP 4-->
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
	$('#mytable').dataTable();
  </script>

</body>

</html>