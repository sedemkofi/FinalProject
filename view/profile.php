<?php
include '../settings/core.php';
include '../functions/user_functions.php';
include '../functions/showUploads.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wavers - Music Collaboration</title>
    <link rel="icon" href="../images/waveform.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/loading.css">
</head>
<body>
    <div class="loader_bg">
        <div class="loader"><img src="../images/loading.gif" alt="#" /><br><p>Loading</p></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Wavers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/signout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav> <br><br><br>
    
    <div class="profile-header">
        <img src="../images/default-header.png" class="header-picture" alt="">
    </div>
    <div class="text-center">
        <img src="../avatars/1.png" class="profile-pic" alt="Profile Picture">
        <p>@<?php echo $_SESSION['user']['ArtistName']?></p>
        <h1 class="display-4">
            <?php echo $_SESSION['user']['FirstName'] . " " .   $_SESSION['user']['LastName']; ?>
        </h1>
        <p class="lead">Uploads: <?php echo uploadCount() ?> | Collaborations: <?php echo addCollabs()?></p>
        <p> <?php displayBio() ?></p>
        <a class="btn btn-primary btn-sm" id="edit-button" href="edit-account.php">Edit Account</a>
        <a class="btn btn-primary btn-sm" href="upload-song.php" id="upload-button">Upload Music</a>


    </div>
    
    <div class="container">
        <p>Uploads</p>
        <!-- Showing user music -->
        <?php 
            displayUploads($musicFiles);
        ?>
    </div>
    <br><br>
    <div class="container-fluid text-center">
        <span class="text-muted">Wavers &copy; 2020</span>
    </div>

    <div id="footer-index"></div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
    
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loader_bg').style.display = 'none';
            }, 1500);  
        });

    var audioPlayer = document.getElementById('audio-player');
    var playButton = document.getElementById('playButton');
    var pauseButton = document.getElementById('pauseButton');
    var volumeControl = document.getElementById('volumeControl');
    var progressBar = document.getElementById('progressBar');


    playButton.addEventListener('click', function() {
        audioPlayer.play();
        playButton.style.display = 'none';
        pauseButton.style.display = 'block';
    });

    pauseButton.addEventListener('click', function() {
        audioPlayer.pause();
        playButton.style.display = 'block';
        pauseButton.style.display = 'none';
    });

    volumeControl.addEventListener('change', function() {
        audioPlayer.volume = volumeControl.value;
    });


    window.onload = function() {

        var audioPlayer = document.getElementById('audio-player');
        var progressBar = document.getElementById('progress-bar');
        

        audioPlayer.addEventListener('timeupdate', function() {
            var progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
            progressBar.value = progress;
        });

        progressBar.addEventListener('input', function() {
            audioPlayer.currentTime = (progressBar.value / 100) * audioPlayer.duration;
        });
        // Updating the duration
        var duration = document.getElementById('duration');
        duration.textContent = formatTime(audioPlayer.duration);

        progressBar.addEventListener('mousedown', function() {
            audioPlayer.muted = true;
        });

        progressBar.addEventListener('mouseup', function() {
            audioPlayer.muted = false;
        });
        

        audioPlayer.addEventListener('ended', function() {
            // allowing the user to hit the end of the progress bar if dragging the button
            if (audioPlayer.muted == true) {
                
            } else{
                audioPlayer.currentTime = 0;
            }
            
            playButton.style.display = 'block'; 
            pauseButton.style.display = 'none'; 
        });

    };
    // Function to format time from seconds to minutes:seconds
    function formatTime(seconds) {
        var minutes = Math.floor(seconds / 60);
        seconds = Math.floor(seconds % 60) + 1;
        return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    }

    audioPlayer.addEventListener('timeupdate', function() {
        var audioPlayer = document.getElementById('audio-player');
        var progressBar = document.getElementById('progress-bar');
        var progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progressBar.value = progress;

        // Update the current time
        var currentTime = document.getElementById('current-time');
        currentTime.textContent = formatTime(audioPlayer.currentTime);

        

    });




    $(function(){
        $("#footer-index").load("homepage-footer.php"); 
    });
        
    </script>
</body>
</html>