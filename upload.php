<?php
    $data = json_decode(file_get_contents("php://input"), true);
    print_r($data);
    $number_of_wifipass = count($data);
    
    echo "<br>";
    
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
    echo "Connected successfully";
    echo "<br>";
    
    foreach ($data as $wifipass){
        $wifipass[SSID] = "'".$wifipass[SSID]."'";
        $wifipass[password] = "'".$wifipass[password]."'";
        $sql .= "INSERT INTO MyFirstTableOnWebsite (ssid, password)
        VALUES ($wifipass[SSID],$wifipass[password]);";
    }
    
    if (mysqli_multi_query($conn, $sql)) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    $conn->close();
?>