<?php
function connect_db($servername,$database,$username,$password) {
    $conn = mysqli_connect($servername, $username, $password, $database);
    // echo $conn;
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        // echo "Connected successfully";
        return $conn;
    }
}
?>