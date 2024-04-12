<?php
    $SERVER="127.0.0.1";
    $USERNAME = "root"; 
    $PASSWORD= "E!x8Uc16t!mf";
    $DB_NAME ="MusicCollab";
    
    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>