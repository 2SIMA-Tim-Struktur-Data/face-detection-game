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
    <title>Home | Face Expression Game</title>
    <?php include_once("./head.php") ?>
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
                            echo"<h2>Welcome to Face Expression Game,". " ". "<b>". ucfirst(($_SESSION["user_id"]))."</b>!</h2>";
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
    <footer style="position:relative; bottom:0em; width:100vw; padding: 1.5rem 2rem 1rem; background: #000000">
        <div class="row">
            <div class="team col-md-7 col-sm-12 text-md-left text-center mb-md-0 mb-2">
                <p style="color: #ffffff; margin:0; ">
                    <b><em>Arraysome Team - 2SIMA</em></b> &copy; 2020
                </p>
                <p style="color: #ffffff; margin:0; font-size:.8rem;"> Arif Budiman (1931002) | Tri Susanti 1931019 | Jose
                    Manuel Budiman (1931039) | Kisusyenni Venessa (1931150) | Kendy Junianto (1931175)</p>
            </div>
            <div class="project col-md-4 col-sm-12 text-md-right text-center align-self-center mb-md-0 mb-2">
                <p style="color: #ffffff; margin:0; display:inline-block;font-size:.8rem; ">
                    <em>Projek UAS Mata Kuliah Struktur Data | Universitas Internasional Batam </em>
                    <br>
                    Dosen Pembimbing: Dr. Hendi Sama
                </p>
            </div>
            <div class="logo-uib col-md-1 text-md-right text-center">
                <img style="display: inline-block;" src="img/logo-uib.png" width="50" alt="">
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>