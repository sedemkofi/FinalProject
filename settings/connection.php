<?php
    $SERVER="localhost";
    $USERNAME = "root"; 
    $PASSWORD= "";
    $DB_NAME ="musiccollab";
    
    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>