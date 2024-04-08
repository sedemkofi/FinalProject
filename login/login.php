<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
    <link rel="icon" href="../images/waveform.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Wavers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="box p-5">
            <h1 class="text-center mb-4 sign-in-head">Sign in to Wavers</h1>
            <div class="line"></div>
            <form method="post" action="../actions/login_user.php" id="sign-in-form">
                <div class="form-group">
                    <label for="email" class="email-label">Email</label>
                    <input type="email" id="email" name="Email" placeholder="Enter your email address..." >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="Password" placeholder="Enter a password" >
                    <p id="error-message"></p>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="Submit" value="Submit" class="btn-sm">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <div id="footer"></div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $("#footer").load("../view/footer.php"); 
        });
        window.addEventListener('wheel', function(e) {
            if ((e.deltaY < 0 && window.scrollY <= 0) || // Scrolling up, but already at top
                (e.deltaY > 0 && window.scrollY + window.innerHeight >= document.body.offsetHeight)) { // Scrolling down, but already at bottom
                e.preventDefault();
            }
        }, { passive: false });
    </script>
</body>
</html>