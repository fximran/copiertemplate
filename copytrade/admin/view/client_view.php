<?php
$clientdata = $obj->client_list();
if(isset($_GET['status']) && $_GET['status'] == 'delete'){
    if(isset($_GET['id'])){
        $delid = $_GET['id'];
        $delete_msg = $obj->delete_client($delid);
    } else {
        $delete_msg = "Client Trading ID not provided.";
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
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
            <strong>Success!</strong> <?php echo $delete_msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Client Trading Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>SL NO.</th>
                                        <th>Account</th>
                                        <th>Platform</th>
                                        <th>Acc Type</th>
                                        <th>Broker</th>
                                        <th>Name</th>
                                        <th>Levarage</th>
                                        <th>Server</th>
                                        <th>Currency</th>
                                        <th>Balance</th>
                                        <th>Creadit</th>
                                        <th>Equity</th>
                                        <th>Floating</th>
                                        <th>Today Profit</th>
                                        <th>Yesterday Profit</th>
                                        <th>3rd Day Profit</th>
                                        <th>4th Day Profit</th>
                                        <th>Terminal Status</th>
                                        <th>Last Update</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $serial = 1;
                                    while ($clientlist = mysqli_fetch_assoc($clientdata)) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox ms-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                    <label class="form-check-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td><?php echo $serial; ?></td>
                                            <td><?php echo $clientlist['idmt4']; ?></td>
                                            <td><?php echo $clientlist['platform']; ?></td>
                                            <td><?php echo $clientlist['account_type']; ?></td>
                                            <td><?php echo $clientlist['broker']; ?></td>
                                            <td><?php echo $clientlist['name']; ?></td>
                                            <td><?php echo $clientlist['leverage']; ?></td>
                                            <td><?php echo $clientlist['server']; ?></td>
                                            <td><?php echo $clientlist['currency']; ?></td>
                                            <td><?php echo $clientlist['balance']; ?></td>
                                            <td><?php echo $clientlist['creadit']; ?></td>
                                            <td><?php echo $clientlist['equity']; ?></td>
                                            <td>
                                                <span class="badge light badge-success">
                                                    <?php echo $clientlist['floating']; ?>
                                                </span>
                                            </td>
                                            <td><?php echo $clientlist['profit']; ?></td>
                                            <td><?php echo $clientlist['profitlast']; ?></td>
                                            <td><?php echo $clientlist['profitlast3']; ?></td>
                                            <td><?php echo $clientlist['profitlast4']; ?></td>
                                            <td><?php echo $clientlist['last_update']; ?></td>
                                            <td><?php echo $clientlist['status']; ?></td>
                                            <td>
                                                <div style="width: max-content">
                                                    <a href="?status=delete&id=<?php echo $clientlist['id']; ?>" type="button" class="mx-1 btn btn-rounded btn-danger btn-xxs"><span class="btn-icon-start text-white bg-warning"><i class="fa fa-trash"></i></span>Delete</a>
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
