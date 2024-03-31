<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name if different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "imran360"; // Change this to your database name

// Check if 'username' parameter is set in the GET request
if (isset($_GET['username'])) {
    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the 'user' parameter from the GET request
    $users = trim($_GET['username']);
    $send = "";

    // Check if there is a database connection error
    if (mysqli_connect_error()) {
        echo "Failed Connected";
        echo mysqli_connect_error();
    } else {
        // If the connection is successful, query the database
        $result = mysqli_query($con, "SELECT * FROM user WHERE username='$users'");

        // Loop through the results and build the response string
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $user = $row['username'];
            $pass = $row['password'];
            $status = $row['status'];
            $expire = $row['license'];

            // Concatenate the user information into the response string
            $send = $send . "$id,$user,$pass,$status,$expire";
        }
    }

    // Close the database connection
    mysqli_close($con);

    // Output the response string
    echo $send;
} else {
    echo "Username parameter is not set.";
}
?>

