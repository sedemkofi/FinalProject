<?php
    $SERVER="172.166.208.199";
    $USERNAME = "root"; 
    $PASSWORD= "E!x8Uc16t!mf";
    $DB_NAME ="musiccollab";
    
    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>