<?php
    include("class/function.php");
    $obj = new AdminInfo();

    if(isset($_POST['admin_login'])){
        $obj->admin_login($_POST);
    }

    session_start();
    if(isset($_SESSION['adminID'])){
        $id = $_SESSION['adminID'];
    }
    if(isset($id)){
        header("Location: dashboard.php");
        exit; // Make sure to exit after a header redirect
    }
?>


<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php"); ?>

<body>

    <?php include_once("includes/preloader.php"); ?>
    <!--**********************************
        Main wrapper start
    ***********************************-->


    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
                    <div class="login-form">
                        <div class="text-center">
                            <h3 class="title">Sign In</h3>
                            <p>Sign in to your account to start using Dompact</p>
                        </div>
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label class="mb-1 text-dark">UserName</label>
                                <input type="username" name="username" class="form-control form-control" placeholder="hello@example.com">
                            </div>
                            <div class="mb-4 position-relative">
                                <label class="mb-1 text-dark">Password</label>
                                <input type="password" name="password" id="dlab-password" class="form-control form-control" placeholder="Password">
                                <span class="show-pass eye">

                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>

                                </span>
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" name="admin_login" value="login" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="pages-left h-100">
                        <div class="login-content">
                            <img src="images/logo-full.png" class="mb-3" alt="">
                            <p>Your true value is determined by how much more you give in value than you take in payment. ...</p>
                        </div>
                        <div class="login-media text-center">
                            <img src="images/login.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include_once("includes/script.php"); ?>


</body>

</html>
