<?php session_start ()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Home | Face Detection Game</title>
</head>

<body>
    <?php include_once("./navbar.php")?>
    <main>


        <div class="container">
            <div class="card text-center" >
                <div class="card-body">
                    <?php 
                        if (isset($_SESSION['username'])) {
                            echo '<h2>You are logged in!</h2>';
                            echo"<h2>Welcome to Face Detection Game,". " ". "<b>". ucfirst(($_SESSION["user_id"]))."</b>!</h2>";
                        }
                        else {
                        echo '<h2>You are logged out!</h2>';
                        }
            
                    ?>
                    
                    <br>

                    <p class="card-text">How to play: You need to make a expression based on the question. You only have 5 seconds to make that expression. The closest expression will get the highest expression. Good Luck</p>
                    
                    <?php 
                        if (isset($_SESSION['username'])) {
                            echo'<a href="./main.php" class="btn btn-outline-warning">Start</a>';
                        } 
                    ?>
            
                   
                </div>
            </div>
        </div>




    </main>

    <?php require "./global_script.php"?>
</body>

</html>