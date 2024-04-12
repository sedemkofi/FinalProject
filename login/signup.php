<?php 
    include '../feedback/signup_error.php';
    include '../settings/core.php';
    checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title>Wavers - SignUp</title>
        
        <link rel="icon" href="../images/waveform.svg">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <link rel="stylesheet" href="../css/loading.css">
        <link rel="stylesheet" href="../css/signup.css">
        <link rel="stylesheet" href="../js/signup.js">
    </head>
<body>
    
    <div class="loader_bg">
        <div class="loader"><img src="../images/loading.gif" alt="#" /><br><p>Loading</p></div>
    </div>
    
    <!-- <video autoplay muted loop id="myVideo">
        <source src="../images/centralcee.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video> -->
    <!-- <div id="videoOverlay"></div> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-none" style="position: fixed; background-color: rgba(0, 0, 0, 0.1); backdrop-filter: blur(5px); width: 100%;">
        <a class="navbar-brand" href="../index.php" style="color: white;">Wavers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" style="color: white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" style="color: white;">Sign In</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Rest of your body code -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 90vh; ">
        <div class="box p-5">
            <h1 class="text-center mb-4 sign-in-head">Sign up for Wavers</h1>
            <div class="line"></div>
            <form method="post" action="../actions/register_user.php" id="sign-up-form">
                <div class="form-group">
                    <div>
                        <label for="first-name" class="fname-label">First Name</label>
                        <input type="text" id="first-name" name="first-name" placeholder="Enter your first name..." >
                    </div>
                    <div>
                        <label for="last-name" class="lname-label">Last Name</label>
                        <input type="text" id="last-name" name="last-name" placeholder="Enter your last name..." >
                    </div>
                    <div>
                        <label for="artist-name" class="artist-name" style="margin-left: 5px">Artist Name</label>
                        <input type="text" id="artist-name" name="artistname" placeholder="Enter your artist name..." >
                    </div>
                    <div>
                        <label for="email" class="email-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address..." >
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter a password" >
                    </div>
                    <div>
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" >
                    </div>
                </div>
                <p id="error-message"></p>
                <div class="form-group text-center">
                    <button type="submit" value="Submit" name="Submit" class="btn-sm">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loader_bg').style.display = 'none';
            }, 1500);  
        });
    </script>
</body>
 
</html>