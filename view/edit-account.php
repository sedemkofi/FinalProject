<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="editBox" id="editBox">
        <form action="../actions/edit_profile.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                <input type="text" name="user_id" value="1" hidden>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password">
                <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                <input type="text" class="form-control" id="bio" name="bio" placeholder="Enter your bio">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Confrim</button>
        </form>
    </div>
</body>
</html>
