<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nocturne | Homepage</title>
    <link rel="stylesheet" href="main.css">

    <?php
    require 'favicon.php'
    ?>

</head>
<body>

<div class="homepage">
    <img src="assets/logos/logo_dark-removebg.png" alt="logo">

    <div class="home_container">

        <button class="create-post-btn" onclick="togglePostMaker()">Create Post</button>

        <div class="post-container">
            <div class="post-card">
                <div class="post-header">
                    <div class="username">John Doe</div>
                    <div class="user-id">@johndoe123</div>
                </div>
                <div class="post-text">
                    This is a sample post text. It can be up to 255 characters long.
                </div>
                <div class="post-footer">
                    <div class="timestamp">2025-04-17 14:30</div>
                    <div class="post-id">#12345</div>
                </div>
            </div>
        </div>

        <div class="post_maker" style="display: none;">
            <h2 class="create-title">Create a New Post</h2>
            <textarea class="create-textarea" placeholder="What's on your mind, detective?"></textarea>
            <div class="button-group">
                <button class="submit-btn">Submit</button>
                <button class="cancel-btn" onclick="cancelPostMaker()">Cancel</button>
            </div>
        </div>
    </div>

</div>
<script src="post_hide.js"></script>
</body>
</html>