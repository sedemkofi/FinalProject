<?php 
include '../settings/core.php';
include '../functions/getCollabs.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="icon" href="images/waveform.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Wavers - Collaborations</title>
    <style>
        .home-back {
            background: url('../images/wavers2.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 70vh;
        }
        .features-section {
            background-color: #fff;
            padding: 20px;
        }
        .head {
            font-weight: bold;
        }
        .get-started-div {
            margin-top: 50px;    
            display: flex;
            justify-content: center;        
        }
        #footer-index * {
            color: #333;
        }
        .nav-link{
            font-size: 15px;
        }
        #collaborations-div {
            padding-left: 20px;
            height: 80vh;
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
                <li>
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/signout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav><br><br><br>
    <p style="text-align: center; font-size: 50px; font-weight: normal;">feedback from other artistes</p>
    <br><br>
    <div id="collaborations-div">
        <h5 id="heading">Feedback</h5>
        <?php displayCollaborations($collaborations);?>
    </div>
   
    <div id="footer-index"></div>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loader_bg').style.display = 'none';
            }, 1500);  
        });
        $(function(){
            $("#footer-index").load("homepage-footer.php"); 
        });
    </script>
</body>
</html>