<?php
    echo "<h1>My first PHP page</h1>";
    echo "I want to display the wifi passwords I salvaged here.<br>";
    
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
    
    $sql = "SELECT ssid, password FROM MyFirstTableOnWebsite";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>". $row["ssid"]. ":". $row["password"];
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();

?>