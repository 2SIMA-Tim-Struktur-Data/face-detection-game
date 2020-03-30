<nav class="navbar navbar-light">
    <a class="navbar-brand">Face Recognition</a>
    <div class="form-inline">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><a href="./index.php">Home</a></button>
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><a href="./historyuser.html">History User</a></button>
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><a href="./leaderboard.html">Leaderboard</a></button>
        

        <?php 
            if (isset($_SESSION['username'])) {
                echo '
                <form action="./php/logout.inc.php" method="post">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="logout-submit"><a href="">Log Out</a></button>
                </form>';
            }
            else {
                echo '
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><a href="./login.php">Log In</a></button>

                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><a href="./sign_up.php">Sign Up</a></button>';
            }
        ?>

        
    </div>
</nav>