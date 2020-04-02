<?php session_start() ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" type="image/png"
        href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
    <meta name="apple-mobile-web-app-title" content="CodePen">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" type=""
        href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg"
        color="#111">
    <link rel="stylesheet" href="css/historyuser.scss">
    <link rel="stylesheet" href="css/historyuser.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="js/historyuser.js">
    <title>History User | Face Detection Game</title>
</head>

<body translate="no">

    <!-- Navbar -->
    <?php include_once("./navbar.php")?>

    <section class="timeline">
        <ul>
            <li class="in-view">
                <div>
                    <time>21 March 2020</time>
                    <div class="discovery">
                        <img src="#" alt="">
                        <p>
                            You Are Happy
                        </p>
                    </div>
                    <div class="scientist">
                        <h1>Point</h1>
                        <span>95 Point</span>
                    </div>
                </div>
            </li>
            <li class="in-view">
                <div>
                    <time>23 March 2020</time>
                    <div class="discovery">
                        <img src="#" alt="">
                        <p>
                            You Are Sad
                        </p>
                    </div>
                    <div class="scientist">
                        <h1>Point</h1>
                        <span>50 Point</span>
                    </div>
                </div>
            </li>
            <li class="in-view">
                <div>
                    <time>30 March 2020</time>
                    <div class="discovery">
                        <img src="#" alt="">
                        <p>
                            You Are Not That Happy
                        </p>
                    </div>
                    <div class="scientist">
                        <h1>Point</h1>
                        <span>70 Point</span>
                    </div>
                </div>
            </li>

    </section>

</body>

</html>