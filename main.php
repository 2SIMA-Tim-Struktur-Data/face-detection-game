<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Play the Game | Face Detection Game</title>
</head>

<body>
    <!-- If not logged in, return to login page -->
    <?php
    if (!isset($_SESSION['username'])) {
        header("Location: ./login.php");
    }
    ?>

    <!-- Title -->
    <h1>Face Expression Game</h1>
    <!-- Webcam screen-->
    <div class="container">
        <video id="video" width="630" height="490" autoplay muted>
        </video>
    </div>
    <canvas id="snapshot_result" width="630" height="490"></canvas>

    <!-- Capture button to start the game -->
    <div class="controller">
        <button id="startbutton" class="game_start_btn">Take a Photo</button>
        <button onclick="playAgain()" id="playagain" class="again">Play Again</button>
        <button id="savebutton" class="save">Save Result</button>
        <a href="./index.php"><button id="homebutton" class="home-btn">Back to Home</button></a>
    </div>
    <!-- <form action="./php/ajaxUpload.php" method="POST">
    </form> -->

    <!-- Snapshot result -->
    <div id="progressBar">
        <div class="bar"></div>
    </div>
    <div class="box">
        <div class="text">
            <h1 id="question"></h1>
            <p id="myEmotion"></p>
            <p id="myScore"></p>
            <p id="undetect"></p>
            <p id="seeresult"></p>
        </div>
    </div>


    <script defer src="js/face-api.min.js"></script>

    <script defer src="js/script.js"></script>
</body>

</html>