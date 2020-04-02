<?php session_start ()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/user.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <title>Sign Up | Face Detection Game</title>
</head>

<body>

    <section class="wrapper sign-up">

        <!-- Navbar -->
        <?php include_once("./navbar.php")?>

        <!-- Sign up form -->
        <form action="./php/sign_up.inc.php" method="post" class="form signup-form">
            <h1>Sign Up</h1>
            <p style="opacity: 0.5;">Please fill in this form to create an account!</p>

            <!-- Input username -->
            <div class="txtb">
                <input type="text" name="username">
                <span data-placeholder="Username..."></span>
            </div>

            <!-- Input email -->
            <div class="txtb">
                <input type="text" name="e_mail">
                <span data-placeholder="E-mail..."></span>
            </div>
            
            <!-- Input password -->
            <div class="txtb">
                <input type="password" name="user_password">
                <span data-placeholder="Password..."></span>
            </div>

            <!-- Re-type inputted password -->
            <div class="txtb">
                <input type="password" name="confirm_password">
                <span data-placeholder="Confirm Your Password..."></span>
            </div>

            <!-- Submit button -->
            <button type="submit" name="signup-submit" class="submit-btn">Sign Up</button>

            <div class="bottom-text">
                Already have an account? <a href="#">Log In</a>
            </div>

        </form>

    </section>

    <script type="text/javascript">
        $(".txtb input").on("focus", function () {
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function () {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        });
    </script>

    <?php include("global_script.php")?>

</body>

</html>