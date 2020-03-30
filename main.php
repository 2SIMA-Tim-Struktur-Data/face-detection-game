<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Face Detection JavaScript</title>
    <script defer src="js/face-api.min.js"></script>
    <script defer src="js/script.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <!-- Webcam screen-->
    <section>
        <video id="video" width="720" height="560" autoplay muted>
        </video>
    </section>

    <!-- Capture button to start the game -->
    <div class="controller">
        <button id="game_start" class="game_start_btn">Start the Game</button>
    </div>
    
    <!-- Snapshot result -->
    <canvas id="snapshot_result" width="720" height="560"></canvas>
</body>

</html>