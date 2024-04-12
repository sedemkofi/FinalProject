<?php 
    include '../actions/get_collaborations.php';

    function displayCollaborations($collaborations) {
        foreach ($collaborations as $collaboration) {
            echo "Song: " . $collaboration['SongName'] . " by " . $collaboration['Artist'] . "<br>";
            echo "Feedback: " . $collaboration['Feedback'] . "<br>";
            echo "Artist: " . $collaboration['FeedbackSenderFirstName'] . " " . $collaboration['FeedbackSenderLastName'] . "<br><hr>";
        }
    }
?>