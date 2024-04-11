<?php
include '../settings/connection.php';

function uploadCount(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM MusicFiles WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();
    return $count['COUNT(*)'];
}

function collabCount(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM Collaborations WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();

    return $count['COUNT(*)'];
}
function collabingCount(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM Collaborators WHERE CollaboratorID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();

    return $count['COUNT(*)'];
}
function addCollabs(){
    $count = collabCount() + collabingCount();
    return $count;
}
function displayBio(){
    global $conn;
    $stmt = $conn->prepare("SELECT Bio FROM User WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $bio = $result->fetch_assoc();
    return $bio['Bio'];
}


?>