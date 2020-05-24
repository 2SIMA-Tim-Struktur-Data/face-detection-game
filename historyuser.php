<?php
session_start();
include_once('php/db_handler.php');

if( isset( $_SESSION['username'])){
    $thisUser = $_SESSION['username'];
}   
$sql_history = "SELECT `created_at`, `score`, `emotion` ,`image_path` FROM `snapshots` WHERE `user_no` = '".$thisUser."' ";
$result = mysqli_query($conn,$sql_history);
$resultCheck = mysqli_num_rows($result);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/historyuser.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>History User | Face Detection Game</title>
</head>

<body translate="no">

    <!-- Navbar -->
    <?php include_once("./navbar.php")?>

    <section class="timeline">
        <ul>
            <?php 
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "  <li class='in-view'>
                                    <div>
                                        <time>".$row['created_at']."</time>
                                        <div class='discovery'>
                                            <img width='70px' onclick='openModal();' class='myImage' src='img/snapshots/".$row['image_path']."' />
                                            <p>You Are ".$row['emotion']."</p>
                                        </div>
                                        <div class='scientist'>
                                            <h1>".$row['score']."</h1>
                                            <span>Point</span>
                                        </div>
                                    </div>
                                </li>";
                        echo "  <div id='myModal' class='modal'>
                                    <span class='close cursor' onclick='closeModal()'>&times;</span>
                                    <div class='modal-content'>
                                        <img src='img/snapshots/".$row['image_path']."'>
                                    </div>
                                </div>
                        ";
                        }
                    }
                    else {
                        echo "<div class='box'><h1>No History!</h1> <p>You haven't played a game...</p></div>";
                    }
                ?>
        </ul>

        <?php 
        
        ?>
        
    </section>
    <script src="./js/historyuser.js"></script>
</body>

</html>