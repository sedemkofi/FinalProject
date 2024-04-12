<?php
include '../settings/connection.php';

$stmt = $conn->prepare("SELECT 
                            m.Title AS SongName,
                            m.Artiste AS Artist,
                            c.Feedback AS Feedback,
                            u.FirstName AS FeedbackSenderFirstName,
                            u.LastName AS FeedbackSenderLastName
                        FROM 
                            collaborations AS c
                        JOIN 
                            musicfiles AS m ON c.MusicFileID = m.MusicFileID
                        JOIN 
                            user AS u ON c.UserID = u.UserID
                        WHERE 
                            m.UserID = ?");
$stmt->bind_param("i", $_SESSION['user']['UserID']);
$stmt->execute();
$result = $stmt->get_result();
$collaborations = $result->fetch_all(MYSQLI_ASSOC);

return $collaborations;

?>