
<?php 

session_start();
require '../settings/connection.php';

if(isset($_POST['Submit'])){
    $email =  $_POST['Email'];
    $password = $_POST['Password'];

    $query =  "SELECT * FROM `User` WHERE `Email`='$email'";
    $result = mysqli_query($conn, $query);
    
    if($data = mysqli_fetch_assoc($result)){
        if(password_verify($password, $data['Password'])) {
            $_SESSION['user'] = $data; 
            
            echo "Login successful";
            header("Location: ../view/homepage.php");
            exit();
        } else {
            header("Location: ../login/login.php?error=wrong_password");
            $_SESSION['error'] = "Password verification failed!";
            exit();
        }
    }else{ 
        header("Location: ../login/login.php?error=wrong_email");
        exit();
    }
    $stmt->close();
}

$conn->close();
?>
