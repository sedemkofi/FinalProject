<?php
    if (isset($_GET['error']) && $_GET['error'] == 'upload-failed') {
        echo '<script>alert("An error occurred during file upload. Please try again.")</script>';
    }
    if (isset($_GET['message']) && $_GET['message'] == 'file-upload-successful') {
        echo '<script>alert("File uploaded successfully.")</script>';
    }
    if (isset($_GET['error']) && $_GET['error'] == 'session-error-upload-failed') {
        echo '<script>alert("An error occurred during file upload. Please try again.")</script>';
    } 
?>