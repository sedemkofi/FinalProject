<?php
include '../settings/core.php';
include '../functions/user_functions.php';
include '../functions/showUploads.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wavers - Music Collaboration</title>
    <link rel="icon" href="images/waveform.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script src="js/index.js"></script>
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
    </nav>
    <!-- TODO : Add profile picture  by random selection when a user logs in. use current user to fetch  from database -->
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
        <!-- TODO : put them in a grid -->
        <?php displayUploads($musicFiles);?>
    </div>
    <br><br>
    <div class="container-fluid text-center">
        <span class="text-muted">Wavers &copy; 2020</span>
    </div>
    <!-- Footer -->
    <div id="footer-index"></div>
    <!-- Footer -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../js/profile.js"></script>
</body>
</html>