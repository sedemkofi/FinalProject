<?php
include '../settings/connection.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../login/login.php');
    exit();
}

$userID = $_SESSION['user']['UserID']; 
$stmt = $conn->prepare("SELECT MusicFiles.*, User.ArtistName FROM MusicFiles JOIN User ON MusicFiles.UserID = User.UserID WHERE MusicFiles.UserID = ?");    
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
if ($result) {    
    $musicFiles = $result->fetch_all(MYSQLI_ASSOC);
    echo "<script>alert('Fetched user files')</script>";
    return $musicFiles;

} else {  
    echo "<script>alert('Failed to fetch user files')</script>";
}
$stmt->close();
$conn->close();

echo $musicFiles;
    
  
?>

