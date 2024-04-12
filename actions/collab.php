<?php
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $musicFileId = $_POST['musicFileId'];
    $currentUserId = $_POST['currentUserId'];
    $uploaderUserId = $_POST['uploaderUserId'];
    $feedback = $_POST['Feedback'];

    // Insert into collaborations table
    $stmt = $conn->prepare("INSERT INTO collaborations (UserID, MusicFileID, CollaborationDate, Feedback) VALUES (?, ?, NOW(), ?)");
    $stmt->bind_param("iis", $currentUserId, $musicFileId, $feedback);
    $stmt->execute();
    $collaborationId = $stmt->insert_id;

    // Insert into collaborators table
    $stmt = $conn->prepare("INSERT INTO collaborators (CollaborationID, CollaboratorID) VALUES (?, ?)");
    $stmt->bind_param("ii", $collaborationId, $uploaderUserId);
    $stmt->execute();

    header("Location: ../view/homepage.php?message=collaboration-successful");
} else {
    header("Location: ../view/homepage.php?error=invalid-request");
}
?>