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
    <title>Wavers Upload</title>
    <style>
        html, body {
            
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .content {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.15);
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }
        #audioFile{
            display: none;
        }
        #imageFile{
            display: none;
        }
        .upload-button {
            font-size: 12px;
            display: inline-block;
            padding: 5px 10px;
            background-color: #333333; /* Dark Grey */
            color: white;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload-button:hover {
            background-color: #4d4d4d; /* Lighter Grey */
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
        }

        .form-group input[type="submit"] {
            background-color: green;
            color: white;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: darkgreen;
        }
        .upload-message{
            font-size: 12px;
           
        }
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
        <h1>Add Your Music</h1>
        <p>Upload your audio and start collborating with others!</p>
        <form action="../actions/upload_audio.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" >
            </div>
            <div class="form-group">
                <label for="artiste">Artiste </label>
                <input type="text" id="artiste" name="artiste" placeholder="<?php echo $_SESSION['user']['ArtistName']?>">
            </div>
            <div class="form-group">
                <label for="image" >Artwork</label><br>
                <p class="upload-message">Upload an image</p>
                <label for="imageFile" class="upload-button">Choose File</label>
                <img id="image-preview" style="display: none;" /> 
                <input type="file" id="imageFile" name="image" onchange="updateImageButtonLabel()" accept="image/*">

            </div>
            <div class="form-group">
                <label for="audioFile">Audio</label><br>
                <p class="upload-message">Upload an audio file (.mp3 or .wav)</p>
                <label for="audioFile" class="upload-button">Choose file</label>
                <input type="file" id="audioFile" name="audioFile" onchange="updateButtonLabel()" accept=".mp3,.wav">

            </div>
            <div class="form-group">
                <input type="text" id="userID" name="ID" value="<?php echo $_SESSION['user']['UserID']?>" hidden>
            </div>

            <div class="form-group">
                <input type="submit" value="Upload" name="Upload">
            </div>
        </form>
    </div>
<script>
    var currentUser = document.getElementById('userID');
    function updateButtonLabel() {
        var audioFile = document.getElementById('audioFile');
        var label = document.querySelector('label[for="audioFile"]');
        var fileName = audioFile.value.split('\\').pop();
        label.textContent = fileName ? `Audio: ${fileName}` : 'Upload Audio File';
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


