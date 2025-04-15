<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nocturne | Log in</title>

    <?php
    require 'favicon.php'
    ?>

    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">
    <div class="login-container">
        <h2>Welcome Back</h2>
        <img src="assets/logos/logo_dark-removebg.png" alt="Nocturne Logo" id="login-logo">
        <form method="post" action="login.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
            <p class="signup-link">Don't have an account? <a href="create_account.php">Sign up</a></p>
        </form>
    </div>
</div>

</body>
</html>