<?php
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
    
   
    $sql = "INSERT INTO admin_users (username, password) VALUES ('$entered_username', '$entered_password')";

    if ($connection->query($sql) === TRUE) {
        
        header("Location: login.php");
        exit();
    } else {
        
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

     
    $connection->close();
} else {
    
    echo "Please enter both username and password.";
}


?>



