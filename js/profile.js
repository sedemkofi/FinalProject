

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
