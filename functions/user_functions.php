<?php
include '../settings/connection.php';

function uploadCount(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM musicfiles WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();
    return $count['COUNT(*)'];
}

function collabCount(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM collaborations WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc();

    return $count['COUNT(*)'];
}
function collabingCount(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM collaborators WHERE CollaboratorID = ?");
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
    $stmt = $conn->prepare("SELECT Bio FROM user WHERE UserID = ?");
    $stmt->bind_param("i", $_SESSION['user']['UserID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $bio = $result->fetch_assoc();
    return $bio['Bio'];
}


?>