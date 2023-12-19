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
function select_data($db,$table)
{
    $query="SELECT * FROM mongonv2.".$table;
    $stmt = mysqli_stmt_init($db->conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Query preparation failed");
    }
    else
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    return $result;
}
?>