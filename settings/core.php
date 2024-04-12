<?php
session_start();
// send the user back to login page if signed out
function checkLogout(){
    if (!isset($_SESSION['user'])) {
        header('Location: ../login/login.php');
        die();
    }
}

function checkLogin(){
    if (isset($_SESSION['user'])) {
       session_destroy(); 
    }
}
?>
