<?php 
session_start(); 
include_once('php/db_handler.php');

$sql_rank = "SELECT `username`, (MAX(`score`)) AS `high_score`, (rank() OVER(ORDER BY `high_score` DESC)) AS `all_ranks`
FROM `snapshots` LEFT JOIN `users` ON `user_no` = `user_id` GROUP BY `user_no` ORDER BY `all_ranks` ";
$result = mysqli_query($conn,$sql_rank);
$resultCheck = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/leaderboard.css">
    <link rel="stylesheet" href="js/leaderboard.js">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter-ui.css?v=3.2">
    <title>Leaderboard | Face Detection Game</title>
           
</head>

<body translate="no">

    <!-- Navbar -->
    <?php include_once("./navbar.php")?>

    <div class="wrapper">
        <div class="list">
            <div class="list__header">
                <h5>Result</h5>
                <h1>Face Recognition</h1>
            </div>
            <div class="list__body">
                <table class="list__table">
                    <tbody>
                        <?php 
                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "
                                <tr class='list__row'>
                                    <td class='list__cell'><span class='list__value'>".$row['all_ranks']."</span></td>
                                    <td class='list__cell'><span class='list__value'>".$row['username']."</span></td>
                                    <td class='list__cell'><span class='list__value'></span></td>
                                    <td class='list__cell'><span class='list__value'>".$row['high_score']."</span><small class='list__label'>Points</small></td>
                                </tr>";
                            };
                        };
                        
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>