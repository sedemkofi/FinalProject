<?php
include '../settings/core.php';
include '../functions/showUploads.php';

checkLogout();
?>
<div id="loader"></div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wavers - Music Collaboration</title>
    <link rel="icon" href="images/waveform.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/loading.css">

    <style>
        .music-file {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            color: black;
        }

        .audio-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .details-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            width: 100%;
            background-color: white;
            color: black;
        }

        .audio-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 20%;
        }
        .audio-controls button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .volume-control {
            width: 50%;
            margin-top: 10px;
        }

        .play-button, .pause-button {
            flex-grow: 0;
        }

        .current-time, .duration {
            display: none;
        }
        .volumeControl {
            width: 50px;
        }

        .progress-bar {
            width: 70%; 
            height: 10px;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
            appearance: none;
            margin: auto;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .progress-bar::-webkit-slider-runnable-track {
            background-color: #f3f3f3;
            border-radius: 5px;
        }
        .audio-controls-wrapper{
            width: 1200px;
        }

        .progress-bar::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 10px; 
            height: 10px;
            background-color: gray;
            border-radius: 50%;
            cursor: pointer;
        }

        .progress-bar::-moz-range-track {
            background-color: white;
            border-radius: 5px;
        }

        .progress-bar::-moz-range-thumb {
            width: 10px;
            height: 10px;
            background-color: #ffffff;
            border-radius: 50%;
            cursor: pointer;
        }

        .progress-bar::-ms-track {
            background-color: white;
            border-radius: 5px;
        }

        .progress-bar::-ms-thumb {
            width: 10px;
            height: 10px;
            background-color: gray;
            border-radius: 50%;
            cursor: pointer;
        }

        .details-container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align items to the start */
            align-items: flex-start; /* Align items to the top */
            background-color: white; /* White background */
            color: black; /* Black text */
            padding: 10px; /* Some padding */
            font-family: 'Arial', sans-serif; /* Clean, modern font */
            border-radius: 5px; /* Rounded corners */
        }

        .details-container p {
            margin: 0; /* Remove default paragraph margins */
        }

        .song-title {
            font-size: 1.2em; /* Make the song title larger */
            font-weight: bold; /* Make the song title bold */
        }

        .song-uploader, .artistes {
            font-size: 0.9em; /* Make the uploader and artistes text smaller */
            color: #b3b3b3; /* Light gray text */
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align items to the start */
            align-items: flex-start; /* Align items to the top */
        }

        .current-time, .duration {
            padding: 5px;
            margin-top: 7.5px;
            background-color: transparent;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 7px; 
        }
        input[type="submit"], .collaboration-button {
            background-color: #4CAF50; 
            border: none; 
            border-radius: 5px;
            color: white; 
            padding: 5px 10px; 
            text-align: center; 
            text-decoration: none; 
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer; 
            transition-duration: 0.4s; /* Add a transition effect (when you mouse over the button, it changes to a lighter shade of green) */
        }

        input[type="submit"]:hover, .collaboration-button:hover {
            background-color: #45a049; /* Lighter green */
        }
        .text-area{
            width: 100%;
            height: 100px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            resize: none;
        }
    </style>

</head>
<body>
    <div class="loader_bg">
        <div class="loader"><img src="../images/loading.gif" alt="#" /><br><p>Loading</p></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Wavers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">My Studio</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="../login/signout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome back to Wavers!</h1>
        <p class="lead">Discover new music, collaborate and share your tracks.</p>
        <hr class="my-4">
    </div>
    
    <div class="container">
        <h3>Recently Uploaded (Worldwide)</h3>
        <br><br>
        <?php displayRecentUploads($recentMusicFiles) ?>
    </div>
    <br><br>
    <div class="container-fluid text-center">
        <span class="text-muted">Wavers &copy; 2020</span>
    </div>
    <!-- Footer -->
    <div id="footer-index"></div>
    <!-- Footer -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $("#footer-index").load("homepage-footer.php"); 
        });
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loader_bg').style.display = 'none';
            }, 1500);  

            var collabButtons = document.getElementsByClassName('collaboration-button');
            for (var i = 0; i < collabButtons.length; i++) {
                collabButtons[i].addEventListener('click', function() {
                    var index = this.id.split('-')[2]; // get the index from the id
                    document.getElementById('feedback-' + index).style.display = 'block';
                    document.getElementById('submit-' + index).style.display = 'block';
                    document.getElementById('collab-button-' + index).style.display = 'none';
                });
            }

            var musicFiles = document.querySelectorAll('.music-file');
            musicFiles.forEach(function(musicFile, index) {
                var audioPlayer = musicFile.querySelector('.audio-player');
                var playButton = musicFile.querySelector('.play-button');
                var pauseButton = musicFile.querySelector('.pause-button');
                var volumeControl = musicFile.querySelector('.volume-control');
                var progressBar = musicFile.querySelector('.progress-bar');
                var currentTime = musicFile.querySelector('.current-time');
                var duration = musicFile.querySelector('.duration');

                playButton.addEventListener('click', function() {
                    // Pause all other audio players
                    musicFiles.forEach(function(otherMusicFile) {
                    var otherAudioPlayer = otherMusicFile.querySelector('.audio-player');
                    var otherPlayButton = otherMusicFile.querySelector('.play-button');
                    var otherPauseButton = otherMusicFile.querySelector('.pause-button');
                    if (otherAudioPlayer !== audioPlayer) {
                        otherAudioPlayer.pause();
                        otherPlayButton.style.display = 'block';
                        otherPauseButton.style.display = 'none';
                    }
                });

                    // Play the current audio player
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

                audioPlayer.addEventListener('timeupdate', function() {
                    var progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
                    progressBar.value = progress;
                    currentTime.textContent = formatTime(audioPlayer.currentTime);
                });

                progressBar.addEventListener('input', function() {
                    audioPlayer.currentTime = (progressBar.value / 100) * audioPlayer.duration;
                });

                audioPlayer.addEventListener('ended', function() {
                    if (!audioPlayer.muted) {
                        audioPlayer.currentTime = 0;
                    }
                    playButton.style.display = 'block'; 
                    pauseButton.style.display = 'none'; 
                });

                audioPlayer.addEventListener('loadedmetadata', function() {
                    duration.textContent = formatTime(audioPlayer.duration);
                });
            });
        });

        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            seconds = Math.floor(seconds % 60) + 1;
            return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        }

    </script>

    
</body>
</html>