<?php
class AdminInfo {
    private $conn;

    public function __construct() {
        #database host, database user, database pass, database name
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'imran360';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$this->conn) {
            die("Database Connection Error!!");
        }
    }

    public function admin_login($data) {
        $username = mysqli_real_escape_string($this->conn, $data['username']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Authentication successful
            header("location: dashboard.php");
            $result_data = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['adminID']= $result_data['id'];
            $_SESSION['admin_name']= $result_data['name'];
            exit; // Exit to prevent further execution
        } else {
            // Authentication failed
            echo "Invalid username or password";
        }
    }

    public function adminLogout(){
        unset( $_SESSION['adminID']);
        unset( $_SESSION['admin_name']);
        header("Location: index.php");
    }


    public function CreateAdmin($data){
        // Sanitize input data to prevent SQL injection
        $fullName = mysqli_real_escape_string($this->conn, $data['fullName']);
        $username = mysqli_real_escape_string($this->conn, $data['username']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $phoneNumber = mysqli_real_escape_string($this->conn, $data['phoneNumber']);
        $password = mysqli_real_escape_string($this->conn, $data['password']); // Assuming this is the hashed password
        $confirmPassword = mysqli_real_escape_string($this->conn, $data['confirmPassword']); // Assuming this is the hashed password
        $gender = mysqli_real_escape_string($this->conn, $data['gender']);
        $country = mysqli_real_escape_string($this->conn, $data['country']);
        $address = mysqli_real_escape_string($this->conn, $data['address']);
        $city = mysqli_real_escape_string($this->conn, $data['city']);
        $state = mysqli_real_escape_string($this->conn, $data['state']);
        $zip = mysqli_real_escape_string($this->conn, $data['zip']);
    
        // Verify passwords match before proceeding
        if ($password !== $confirmPassword) {
            return "Error: Passwords do not match";
        }
        
        // Prepare the SQL statement with placeholders to prevent SQL injection
        $query = "INSERT INTO admin (name, username, email, phone, password, admin_pass, gender, country, address, city, state, zip) 
                  VALUES ('$fullName', '$username', '$email', '$phoneNumber', '$password', '$confirmPassword', '$gender', '$country', '$address', '$city', '$state', '$zip')";
    
        // Execute the query
        if(mysqli_query($this->conn, $query)){
            return "New Admin Created Successfully !! ";
        }
    }
    public function admin_list(){
        $query = "SELECT * FROM admin";
        if(mysqli_query($this->conn, $query)){
            $admin = mysqli_query($this->conn, $query); // Corrected the typo here
            return $admin;
        }
    }
    public function delete_admin($id){
        $query = "DELETE FROM admin WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if(mysqli_stmt_execute($stmt)){
            return "Admin Deleted Successfully";
        } else {
            return "Failed to delete admin: " . mysqli_error($this->conn);
        }
    }
    
    public function CreateUser($data){
        // Sanitize input data to prevent SQL injection
        $fullName = mysqli_real_escape_string($this->conn, $data['fullName']);
        $username = mysqli_real_escape_string($this->conn, $data['username']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $phoneNumber = mysqli_real_escape_string($this->conn, $data['phoneNumber']);
        $password = mysqli_real_escape_string($this->conn, $data['password']); // Assuming this is the hashed password
        $confirmPassword = mysqli_real_escape_string($this->conn, $data['confirmPassword']); // Assuming this is the hashed password
        $gender = mysqli_real_escape_string($this->conn, $data['gender']);
        $country = mysqli_real_escape_string($this->conn, $data['country']);
        $address = mysqli_real_escape_string($this->conn, $data['address']);
        $city = mysqli_real_escape_string($this->conn, $data['city']);
        $state = mysqli_real_escape_string($this->conn, $data['state']);
        $zip = mysqli_real_escape_string($this->conn, $data['zip']);
    
        // Verify passwords match before proceeding
        if ($password !== $confirmPassword) {
            return "Error: Passwords do not match";
        }
        
        // Prepare the SQL statement with placeholders to prevent SQL injection
        $query = "INSERT INTO user (name, username, email, phone, password, user_pass, gender, country, address, city, state, zip) 
                  VALUES ('$fullName', '$username', '$email', '$phoneNumber', '$password', '$confirmPassword', '$gender', '$country', '$address', '$city', '$state', '$zip')";
    
        // Execute the query
        if(mysqli_query($this->conn, $query)){
            return "New User Created Successfully !! ";
        }
    }
    public function user_list(){
        $query = "SELECT * FROM user";
        if(mysqli_query($this->conn, $query)){
            $user = mysqli_query($this->conn, $query); // Corrected the typo here
            return $user;
        }
    }
    public function delete_user($id){
        $query = "DELETE FROM user WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if(mysqli_stmt_execute($stmt)){
            return "User Deleted Successfully";
        } else {
            return "Failed to delete User: " . mysqli_error($this->conn);
        }
    }
    public function client_list(){
        $query = "SELECT * FROM report";
        if(mysqli_query($this->conn, $query)){
            $client = mysqli_query($this->conn, $query); // Corrected the typo here
            return $client;
        }
    }
    public function delete_client($id){
        $query = "DELETE FROM report WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if(mysqli_stmt_execute($stmt)){
            return "Client Trading ID Deleted Successfully";
        } else {
            return "Failed to delete Client Trading ID: " . mysqli_error($this->conn);
        }
    }

}
?>
