<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../settings/connection.php';

if (isset($_POST['Submit'])) {
    $firstname = trim($_POST['first-name']);
    $lastname = trim($_POST['last-name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        header('Location: ../view/signup.php?error=password_mismatch');
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM `User` WHERE `Email` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User already exists, redirect back to signup page
        header('Location: ../login/signup.php?error=email_in_use');
        echo '<script>alert("This email is already in use. Please use a different email address.")</script>';
        exit();
    }

    $query = "INSERT INTO `User` (`FirstName`, `LastName`, `Email`, `Password`, `RoleID`, `HeaderPath`) VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '3','../images/default-header.png')";
    $stmt = mysqli_prepare($conn, $query);

    if(!$stmt){
        die("Query preparation failed: " . mysqli_error($conn));
    }
    
    $success = mysqli_stmt_execute($stmt);
    if ($success) {
        // User successfully registered, redirect to login page
        header('Location: ../view/signin.php?registration=success');
        exit();
    } else {
        // Error occurred during registration, redirect back to signup page
        header('Location: ../view/signup.php?error=registration_failed');
        exit();
    }
    $stmt->close();
}else {
    // Error occurred during registration, redirect back to signup page
    header('Location: ../view/signup.php?error=registration_failed');
    exit();
}



?>