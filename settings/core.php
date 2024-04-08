<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user'])) {
    header('Location: ../login/signin.php');
    die();
}
else{
    return;
}

?>
