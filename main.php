<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/face-api.min.js"></script>
    <script defer src="js/script.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Play the Game | Face Detection Game</title>
</head>

<body>

    <!-- Webcam screen-->
    <section>
        <video id="video" width="720" height="560" autoplay muted>
        </video>
    </section>

    <!-- Capture button to start the game -->
    <div class="controller">
        <button onclick="showText()" id="game_start" class="game_start_btn">Take a Photo</button>
        <a href="./index.php"><button class="home-btn">Back to Home</button></a>
    </div>
    
    <!-- Snapshot result -->
    <p id="result_text"></p>
    <canvas id="snapshot_result" width="720" height="560"></canvas>
    
    <script>
        // Add text
    function showText() {
        document.getElementById("result_text").innerHTML = "This is your face according to the expression meter above.";
    }
    </script>
</body>

</html>