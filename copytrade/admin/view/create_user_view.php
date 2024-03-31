<?php
    if(isset($_POST['CreateUser'])){
        $return_CreateUser= $obj->CreateUser($_POST);
    }
?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
<?php if(isset($return_CreateUser)): ?>
    <div class="alert alert-primary solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        <strong>Success!</strong> <?php echo $return_CreateUser; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
<?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New User</h4>
                    </div>
                    <div class="card-body tab-content p-5">
                    <div class="settings-form">
                        <form action="" method="POST" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" id="username" placeholder="Input Username" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Input Email" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Input Phone Number" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password" id="password" placeholder="Input New Password" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Input Confirm Password" class="form-control" required>
                                    <small id="passwordMismatch" class="text-danger d-none">Passwords do not match.</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control default-select wide" name="gender" id="gender" required>
                                        <option selected disabled hidden>Select Gender...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country" id="country" placeholder="Country Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" id="address" placeholder="1234 Main St" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-5">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" id="city" placeholder="City Name" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" id="state" placeholder="State Name" class="form-control" required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Zip</label>
                                    <input type="text" name="zip" id="zip" placeholder="Zip Code" class="form-control" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" name="CreateUser" value="CreateUser">Submit Now</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {
            document.getElementById("passwordMismatch").classList.remove("d-none");
            return false;
        }

        return true;
    }
</script>
