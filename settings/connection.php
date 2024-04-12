<?php

try {
    $SERVER="127.0.0.1";
    $USERNAME = "root"; 
    $PASSWORD= "E!x8Uc16t!mf";
    $DB_NAME ="musiccollab";
    
    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);
} catch (\Throwable $th) {
    
    header("Location: ../index.php?error=connection-error");
}
    
    


?>