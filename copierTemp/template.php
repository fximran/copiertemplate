<?php
    include("class/function.php");
    $obj = new AdminInfo();
    session_start();
    $id = $_SESSION['adminID'];
    if($id==null){
        header("location: index.php");
    }

    if(isset($_GET['adminlogout'])){
        if($_GET['adminlogout']=='logout'){
            $obj->adminLogout();
        }
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
    <div id="main-wrapper">


        <?php include_once("includes/topnav.php"); ?>
        <?php include_once("includes/header.php"); ?>
        <?php include_once("includes/sidenav.php"); ?>



        <!--**********************************
            Content body start
        ***********************************-->
        <?php
            if(isset($view)){
                if($view=="dashboard"){
                    include("view/dashboard_view.php");
                }elseif($view=="admin"){
                    include("view/admin_view.php");
                }elseif($view=="client_config"){
                    include("view/client_config_view.php");
                }elseif($view=="client"){
                    include("view/client_view.php");
                }elseif($view=="genaral_setting"){
                    include("view/general_setting_view.php");
                }elseif($view=="master_config"){
                    include("view/master_config_view.php");
                }elseif($view=="master"){
                    include("view/master_view.php");
                }elseif($view=="profile"){
                    include("view/profile_view.php");
                }elseif($view=="running_trade"){
                    include("view/running_trade_view.php");
                }elseif($view=="system_config"){
                    include("view/system_config_view.php");
                }elseif($view=="user"){
                    include("view/user_view.php");
                }elseif($view=="createadmin"){
                    include("view/create_admin_view.php");
                }elseif($view=="createuser"){
                    include("view/create_user_view.php");
                }
            }
        ?>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include_once("includes/footer.php"); ?>
    </div>
    <?php include_once("includes/script.php"); ?>

</body>

</html>
