<?php
$host = "localhost"; 
$username = "smm"; 
$password = "2233445566";
$database = "messages_db"; 

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
var_dump($_POST['message']);
$message = $_POST['message'];

$sql = "INSERT INTO messages_table (message) VALUES ('$message')";

if ($connection->query($sql) === TRUE) {
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();






?>
