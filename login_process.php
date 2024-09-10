
<?php
session_start();
$host = "localhost";
$username = "smm";
$password = "2233445566";
$database = "messages_db";


if (isset($_POST['username']) && isset($_POST['password'])) {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    $connection = new mysqli($host, $username, $password, $database);

    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    $sql = "SELECT password FROM admin_users WHERE username = '$entered_username'";


    $result = $connection->query($sql);

    if ($result = $entered_password) {
      

      
            
            $_SESSION['admin_logged_in'] = true;
            
            header("Location: admin.php");
            exit();
        } else {
            
            echo "Invalid username or password.";
            
        }

    $connection->close();
} else {
   
    echo "Please enter both username and password.";


}




?>
