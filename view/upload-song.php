<?php
    include '../settings/core.php';
    include '../feedback/general.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loading.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/upload-song.css">
    <title>Wavers - Upload a Song</title>
    <style>
        
    </style>
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
    </nav>

    <div class="content">
        
        <div class="form-container">
        <h3>Add Your Music</h3>
        <p>Upload your audio and start collaborating with others!</p>
        <br><br>
            <form action="../actions/upload_audio.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-texts">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" >
                    </div>
                    <div class="form-group">
                        <label for="artiste">Artiste </label>
                        <input type="text" id="artiste" name="artiste" value="<?php echo $_SESSION['user']['ArtistName']?>">
                    </div>
                </div>
            <div class="form-texts">
                <div class="form-group" id="image-upload">
                    <label for="image" >Artwork (optional)</label>
                    <p class="upload-message">Upload an image</p>
                    <img id="image-preview" style="display: none;" /> 
                    <label for="imageFile" class="upload-button">Choose File</label>
                    <input type="file" id="imageFile" name="image" onchange="updateImageButtonLabel()" accept="image/*">
                </div>
                <div class="form-group" id="audio-upload">
                    <label>Audio</label><br>
                    <p class="upload-message">Upload an audio file (.mp3 or .wav)</p>
                    <label for="audioFile" class="upload-button">Choose file</label>
                    <input type="file" id="audioFile" name="audioFile" onchange="updateButtonLabel()" accept=".mp3,.wav">
                </div>
            </div>
                
                <div class="form-group">
                    <input type="text" id="userID" name="ID" value="<?php echo $_SESSION['user']['UserID']?>" hidden>
                </div>
                <div class="form-upload">
                    <input type="submit" id="form-upload-button" value="Upload" name="Upload">
                </div>
            </form>
        </div>
    </div>
<script>
    var currentUser = document.getElementById('userID');
    function updateButtonLabel() {
        var audioFile = document.getElementById('audioFile');
        var label = document.querySelector('label[for="audioFile"]');
        var fileName = audioFile.value.split('\\').pop();
        label.textContent = fileName ? `${fileName}` : '';
    }

    function updateImageButtonLabel() {
        var image = document.getElementById('imageFile');
        var label = document.querySelector('label[for="imageFile"]');
        var fileName = image.value.split('\\').pop();
        var imagePreview = document.getElementById('image-preview'); // Get the image preview element

        if (fileName) {
            label.textContent = `Artwork: ${fileName}`;

            imagePreview.src = URL.createObjectURL(image.files[0]); 
            imagePreview.style.display = 'block'; 
        } else {
            label.textContent = 'Upload Artwork';
            image.style.display = 'block'; 
            imagePreview.style.display = 'none'; 
        }
    }
    function validateForm() {
        var title = document.getElementById('title').value;
        var artiste = document.getElementById('artiste').value;
        var audioFile = document.getElementById('audioFile').value;

        if (title == "" || audioFile == "") {
            alert("All fields are required.");
            return false;
        }

        var allowedExtensions = /(\.mp3|\.wav)$/i;
        if (!allowedExtensions.exec(audioFile)) {
            alert('Invalid file type. Only MP3 and WAV files are allowed.');
            return false;
        }
        artiste.value = artiste ? artiste : "<?php echo $_SESSION['user']['ArtistName']?>";

        uploadButton.value = "Uploading...";
        uploadButton.disabled = true;
    
        return true;
    }
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.querySelector('.loader_bg').style.display = 'none';
        }, 1500);  
    });
</script>
</body>
</html>


