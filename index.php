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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Wavers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login/login.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login/signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="home-back"></div>
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to Wavers!</h1>
        <p class="lead">Join us and collaborate with musicians around the world.</p>
        <hr class="my-4">
    </div>
    <div class="features-section" id="features">
        <div class="container">
            <div class="row">
                <div class="col border-right">
                    <span class="head">Music Uploads</span><br><br>
                    Whether you're a solo artist, a band member, or a producer, 
                    sharing your work here opens doors to constructive criticism, potential collaborations, and invaluable insights from fellow musicians 
                    and industry professionals. Simply upload your tracks, and let the community inspire and elevate your music to new heights.
                </div>
                <div class="col border-right">
                    <span class="head">Collaboration</span><br><br>
                    Connecting with like-minded musicians has never been easier! Our platform offers a seamless way to reach out and network with other musicians who share your passion and interests. 
                    Whether you're seeking collaborators for your next project, looking to join a band, or simply want to expand your musical circle, you can easily contact other musicians on the platform. 
                    Forge new connections, exchange ideas, and embark on exciting musical journeys together!
                </div>
                <div class="col">
                    <span class="head">Follow your favourates</span><br><br>
                    Stay updated and inspired by following your favorite musicians and bands on our platform! 
                    By following users whose music resonates with you, you'll receive notifications about their latest uploads, collaborations, and activities. 
                    Keep track of their musical journey, discover new releases, and show your support by engaging with their content.
                </div>
            </div>
            <div class="get-started-div">
                <a class="btn btn-primary" href="#" role="button" id="get-started">Get Started</a>    
            </div>
        </div>
        <br><br>
        <div class="container-fluid text-center">
            <span class="text-muted">Wavers &copy; 2020</span>
        </div>
        
    </div>
    <!-- Footer -->
    <div id="footer-index"></div>
    <!-- Footer -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#get-started").click(function(event){
                event.preventDefault();
                $('html, body').animate({scrollTop: 0}, 'slow');
            });
        }); 
        $(function(){
            $("#footer-index").load("view/index-footer.php"); 
        });
    </script>
</body>
</html>