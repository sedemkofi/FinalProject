<?php
include '../settings/connection.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../login/login.php');
    exit();
}

$stmt = $conn->prepare("SELECT musicfiles.*, user.ArtistName FROM musicfiles JOIN user ON musicfiles.UserID = user.UserID ORDER BY musicfiles.UploadDate DESC LIMIT 10");    
$stmt->execute();
$result = $stmt->get_result();
if ($result) {    
    $recentMusicFiles = $result->fetch_all(MYSQLI_ASSOC);
    return $recentMusicFiles;
} 
$stmt->close();
$conn->close();

echo $musicFiles;
?>