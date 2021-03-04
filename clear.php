<?php
    echo "<h1>This page is to clear database.</h1>";
    
    $servername = "localhost";
    $username = "yourdbusername";
    $password = "yourdbpassword";
    $dbname = "dbname";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to delete a record
    $sql = "DELETE FROM MyFirstTableOnWebsite";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table cleared successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();

?>