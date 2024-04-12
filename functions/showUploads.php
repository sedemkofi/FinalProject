<?php 
// TODO use the session to display the user's profile
include '../settings/connection.php';
include '../actions/get_uploads.php';


function displayUploads($musicFiles) {
    foreach ($musicFiles as $musicFile) {
        echo "<div class='grid-item'>";
        echo "<audio type='audio' id='audio-player'>";
        echo "<source src='" . $musicFile['FileName'] . "' type='audio/" . $musicFile['FileType'] . "'>";
        echo "Your browser does not support the audio element.";
        echo "</audio>";
        echo "<div id='audio-container'>";
        echo "<div id='details-container'>";
        echo "<p id='song-uploader'>" . $musicFile['ArtistName'] . "</p>"; // Changed 'Uploader' to 'Name'
        echo "<p id='song-title'>" . $musicFile['Title'] . "</p>";
        echo "<p id='artistes'>" . $musicFile['Artiste'] . "</p>"; // Changed 'Artistes' to 'Artiste'
        echo "</div>";
        echo "<input id='progress-bar' type='range' min='0' max='100' step='0.01' value='0'>";
        echo "</div>";
        echo "<div id='audioControls'>";
        echo "<button id='playButton'><i class='fas fa-play'></i></button>";
        echo "<button id='pauseButton'><i class='fas fa-pause'></i></button>";
        echo "<input id='volumeControl' type='range' min='0' max='1' step='0.01' value='0.8'>";
        echo "<p id='current-time'>0:00</p>";
        echo "<p id='duration'>0:00</p>";
        echo "</div>";
        echo "</div>";
        
    }
}

?>