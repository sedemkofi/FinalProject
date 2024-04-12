<?php

try {
    $SERVER="127.0.0.1";
    $USERNAME = "root"; 
    $PASSWORD= "E!x8Uc16t!mf";
    // E!x8Uc16t!mf
    // $PASSWORD= "";
    $DB_NAME ="MusicCollab";
    
    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);

} catch (\Throwable $th) {
    header("Location: ../index.php?error=connection-error");
    die();
}
?>