<div id="loader"></div>

</script>
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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/loading.css">

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
        <p>Your Tracks</p>
        <!-- Display user's tracks here -->
    </div>
    <div class="container">
        <h2>Tracks from people you follow</h2>
        <!-- Display tracks from people the user follows here -->
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
        });
    </script>

    
</body>
</html>