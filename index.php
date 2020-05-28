<?php session_start ()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
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

                    <p class="card-text">How to play : Try to make an expression based on the question. You only have 5 seconds! The closest expression will get the highest score. Good Luck</p>
                    
                    <?php 
                        if (isset($_SESSION['username'])) {
                            echo'<a href="./main.php" class="btn btn-outline-warning">Start</a>';
                        } 
                    ?>
            
                   
                </div>
            </div>
        </div>




    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>