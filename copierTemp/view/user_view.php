<?php
$userdata = $obj->user_list();
if(isset($_GET['status']) && $_GET['status'] == 'delete'){
    if(isset($_GET['id'])){
        $delid = $_GET['id'];
        $delete_msg = $obj->delete_user($delid);
    } else {
        $delete_msg = "Admin ID not provided.";
    }
}
?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
    <div class="container-fluid">
    <?php if(isset($delete_msg)): ?>
    <div class="alert alert-primary solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        <strong>Success!</strong> <?php echo $delete_msg; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
<?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User List</h4>
                        <h4 class="card-title"><a type="button" href="create_user.php" class="btn btn-primary btn-sm">Add New User</a></h4>
                    </div>
                    <div class="card-body tab-content p-0">
                        <div class="table-responsive">
                            <table class="table table-responsive-md card-table transactions-table">
                                <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Admin Name</th>
                                        <th>Email</th>
                                        <th>UserName</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>Create</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serial = 1;
                                    while ($userlist = mysqli_fetch_assoc($userdata)) { ?>
                                    <tr>
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $userlist['name']; ?></td>
                                        <td><?php echo $userlist['email']; ?></td>
                                        <td><?php echo $userlist['username']; ?></td>
                                        <td><?php echo $userlist['phone']; ?></td>
                                        <td><?php echo $userlist['gender']; ?></td>
                                        <td><?php echo $userlist['country']; ?></td>
                                        <td>
                                            <div style="width: max-content">26/02/2020, 12:42 AM <br> 1day Ago</div>
                                        </td>
                                        <td>
                                            <span class="badge light badge-success">
                                                Active
                                            </span>
                                        </td>
                                        <td>
                                            <div style="width: max-content">
                                                <a href="javascript:void(0);" type="button" class="btn btn-rounded btn-primary btn-xxs" data-bs-toggle="modal" data-bs-target="#editAdmin"><span class="btn-icon-start text-white bg-success"><i class="fa-solid fa-check"></i></span>Edit</a>
                                                <a href="?status=delete&id=<?php echo $userlist['id']; ?>" type="button" class="mx-1 btn btn-rounded btn-danger btn-xxs"><span class="btn-icon-start text-white bg-warning"><i class="fa fa-trash"></i></span>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                    $serial++;
                                      } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
