<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name if different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "imran360"; // Change this to your database name

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['order'])) {
    $received = trim($_GET['order']);

    $order = explode(",", $received);
    $user = $order[0];
    $idmt4 = $order[1];
    $balance = $order[2];
    $creadit = $order[3];
    $equity = $order[4]; 
    $floating = $order[5]; 
    $currency = $order[6]; 
    $leverage = $order[7];
    $name = $order[8];
    $broker = $order[9];
    $server = $order[10];
    $profitdaily = $order[11];
    $profitlastdaily = $order[12];
    $profitlastdaily3 = $order[13];
    $profitlastdaily4 = $order[14];
    $lastupdate = date('Y-m-d H:i:s', $order[15]);
    $status = $order[16];
    $actype = $order[17];
    $platform = $order[18];

    if(mysqli_connect_error()){
        echo "Failed Connected";
        echo mysqli_connect_error();
    } else {
        $result = mysqli_query($con, "SELECT * FROM report WHERE idmt4='$idmt4'");
        $row = mysqli_fetch_array($result);
        if($row > 0) {
            if(mysqli_query($con, "UPDATE `report` SET `balance`='$balance', `creadit`='$creadit', `equity`='$equity', `currency`='$currency', `floating`='$floating', `leverage`='$leverage', `name`='$name',
                            `broker`='$broker',`server`='$server', `profit`='$profitdaily', `profitlast`='$profitlastdaily' , `profitlast3`='$profitlastdaily3' , `profitlast4`='$profitlastdaily4' ,`last_update`= '$lastupdate',`status`='$status'
                            WHERE `idmt4`='$idmt4'")) {
                echo 'Update Success';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            if(mysqli_query($con, "INSERT INTO report (user,idmt4,balance,creadit,equity,floating,currency,leverage,name,broker,server,profit,profitlast,profitlast3,profitlast4,last_update,status,platform,account_type) 
                                VALUES ('$user', '$idmt4', '$balance','$creadit', '$equity', '$floating', '$currency', '$leverage', '$name', '$broker', '$server', '$profitdaily', '$profitlastdaily', '$profitlastdaily3', '$profitlastdaily4','$lastupdate','$status','$platform','$actype')")) {
                echo 'Insert Success';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }
}

// Close the database connection
mysqli_close($con);
?>
