<!-- Sign up errors being caught -->
<?php
    if (isset($_GET['error']) && $_GET['error'] == 'email_in_use') {
        echo '<script>alert("This email is already in use. Please use a different email address.")</script>';
    } 
    if (isset($_GET['error']) && $_GET['error'] == 'password_mismatch') {
        echo '<script>alert("Passwords do not match.")</script>';
    }
    if (isset($_GET['error']) && $_GET['error'] == 'registration_failed') {
        echo '<script>alert("An error occurred during registration. Please try again.")</script>';
    }
?>  