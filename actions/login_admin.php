
<?php 

session_start();
require '../settings/connection.php';

if(isset($_POST['loginSubmit'])){
    $email =  $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $query =  "SELECT * FROM `User` WHERE `Email`='$email'";
    $result = mysqli_query($conn, $query);
    
    if($data = mysqli_fetch_assoc($result)){
        if ($data['RoleID'] == 1 || $data['RoleID'] == 2) {
            if(password_verify($password, $data['Password'])) {
                $_SESSION['user'] = $data; // Store user data in session
                
                echo "Login successful";
                header("Location: ../admin/admin-manage-items.php");
                exit();
            } else {
                header("Location: ../view/signin.php?error=wrong_password");
                $_SESSION['error'] = "Password verification failed!";
                exit();
            }
        } else {
        header("Location: ../view/signin.php?error=only_admins");
        exit();
        }
    } else{ 
        header("Location: ../view/signin.php?error=wrong_email");
        exit();  
    }

        
    $stmt->close();
}

$conn->close();
?>
