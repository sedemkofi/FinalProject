<?php 
// TODO use the session to display the user's profile
include '../settings/connection.php';
include '../actions/get_uploads.php';
include '../actions/get_recent_uploads.php';

function displayUploads($musicFiles) {
    if (!empty($musicFiles)){
        foreach ($musicFiles as $index => $musicFile) {
            
            echo "<div class='grid-item music-file'>";
            echo "<audio class='audio-player' id='audio-player-{$index}'>";
            echo "<source src='" . $musicFile['FilePath'] . "' type='" . $musicFile['FileType'] . "'>";
            echo "Your browser does not support the audio element.";
            echo "</audio>";
            echo "<div class='audio-container' id='audio-container-{$index}'>";
            echo "<div class='details-container' id='details-container-{$index}'>";
            echo "<p class='song-uploader' id='song-uploader-{$index}'>" . $musicFile['ArtistName'] . "</p>";
            echo "<p class='song-title' id='song-title-{$index}'>" . $musicFile['Title'] . "</p>";
            echo "<p class='artistes' id='artistes-{$index}'>" . $musicFile['Artiste'] . "</p>";
            echo "</div>";
            echo "<div class='audio-controls-wrapper'>";
            echo "<input class='progress-bar' id='progress-bar-{$index}' type='range' min='0' max='100' step='0.01' value='0'>";
            echo "</div>";
            echo "<div class='audio-controls' id='audioControls-{$index}'>";
            echo "<button class='play-button' id='playButton-{$index}'><i class='fas fa-play'></i></button>";
            echo "<button class='pause-button' id='pauseButton-{$index}'><i class='fas fa-pause'></i></button>";
            echo "<input class='volume-control' id='volumeControl-{$index}' type='range' min='0' max='1' step='0.01' value='0.8'>";
            echo "<p class='current-time' id='current-time-{$index}'>0:00</p>";
            echo "<p class='duration' id='duration-{$index}'>0:00</p>";
            echo "</div>";
            echo "</div>";
            echo "</div><hr>";
            
        }
    } else {
        echo "<p style='font-size: 10px'>No uploads yet</p>";
    }
}

// TODO show top 10 recent songs uploaded
function displayRecentUploads($recentMusicFiles){
    if (!empty($recentMusicFiles)){
        foreach ($recentMusicFiles as $index => $musicFile) {
            if ($musicFile['UserID'] != $_SESSION['user']['UserID']) {
                echo "<div class='grid-item music-file'>";
                echo "<audio class='audio-player' id='audio-player-{$index}'>";
                echo "<source src='" . $musicFile['FilePath'] . "' type='" . $musicFile['FileType'] . "'>";
                echo "Your browser does not support the audio element.";
                echo "</audio>";
                echo "<div class='audio-container' id='audio-container-{$index}'>";
                echo "<div class='details-container' id='details-container-{$index}'>";
                echo "<p class='song-uploader' id='song-uploader-{$index}'>" . $musicFile['ArtistName'] . "</p>";
                echo "<p class='song-title' id='song-title-{$index}'>" . $musicFile['Title'] . "</p>";
                echo "<p class='artistes' id='artistes-{$index}'>" . $musicFile['Artiste'] . "</p>";
                echo "</div>";
                echo "<div class='audio-controls-wrapper'>";
                echo "<input class='progress-bar' id='progress-bar-{$index}' type='range' min='0' max='100' step='0.01' value='0'>";
                echo "</div>";
                echo "<div class='audio-controls' id='audioControls-{$index}'>";
                echo "<button class='play-button' id='playButton-{$index}'><i class='fas fa-play'></i></button>";
                echo "<button class='pause-button' id='pauseButton-{$index}'><i class='fas fa-pause'></i></button>";
                echo "<input class='volume-control' id='volumeControl-{$index}' type='range' min='0' max='1' step='0.01' value='0.8'>";
                echo "<p class='current-time' id='current-time-{$index}'>0:00</p>";
                echo "<p class='duration' id='duration-{$index}'>0:00</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                echo "<form id='collab-form-{$index}' action='../actions/collab.php' method='post'>";
                echo "<input id='musicFileId-{$index}' type='hidden' name='musicFileId' value='" . $musicFile['MusicFileID'] . "'>";
                echo "<input id='currentUserId-{$index}' type='hidden' name='currentUserId' value='" . $_SESSION['user']['UserID'] . "'>";
                echo "<input id='uploaderUserId-{$index}' type='hidden' name='uploaderUserId' value='" . $musicFile['UserID'] . "'>";
                echo "<button id='collab-button-{$index}' class='collaboration-button' type='button'>collaborate</button>";
                echo "<textarea id='feedback-{$index}' maxlength='600' class='text-area' style='display: none;' placeholder='Send a message to the Artist' name='Feedback'></textarea>";

                echo "<input id='submit-{$index}' type='submit' value='collaborate' style='display: none'>";
                echo "</form>";
                
                echo "</form> <hr>";
            } 
        }
    } else {
        echo "<p style='font-size: 10px'>No uploads yet</p>";
    }
}

?>