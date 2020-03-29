<?php session_start ()?>
<?php require './php/db_handler.php'?>
<!DOCTYPE html>
<html lang="en">

    <?php include_once ("./head.php")?>

<body>
    <?php include_once("./navbar.php")?>
    <main>

    
        <?php 
            if (isset($_SESSION['username'])) {
                echo '<h1>You are logged in!</h1>';
                echo"<h1>Welcome". " ". "<b>". ucfirst(($_SESSION["user_id"]))."</b>!</h1>";
            }
            else {
                echo '<h1>You are logged out!</h1>';
            }
            
        ?>
        
        
    </main>   
    
    <?php require "./global_script.php"?>
</body>
</html>

