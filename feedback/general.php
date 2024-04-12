
<?php
    // TODO general error handling
    if(isset($_GET['error'])){
        if($_GET['error'] == "connection-error"){
            echo "<script>alert('Connection error. Please try again.')</script>";
        }
    }
    if (isset($_GET['message'])) {
        if ($_GET['message'] == "collaboration-successful") {
            echo "<script>alert('Collaboration successful.')</script>";
        }
    }
    if (isset($_GET['message'])) {
        if ($_GET['message'] == "file-upload-successful") {
            echo "<script>alert('File uploaded successfully.')</script>";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "upload-failed") {
            echo "<script>alert('File upload failed.')</script>";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "invalid-request") {
            echo "<script>alert('Invalid request.')</script>";
        }
    }
?>