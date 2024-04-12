<?php

try {
    $SERVER="127.0.0.1";
    $USERNAME = "root"; 
    $PASSWORD= "";
    $DB_NAME ="MusicCollab";
    
    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);

} catch (\Throwable $th) {
    die();
    header("Location: ../index.php?error=connection-error");
}
?>