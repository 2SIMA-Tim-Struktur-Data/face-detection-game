<?php session_start() ?>
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
                        <tr class="list__row"
                            data-image="https://www.formula1.com/content/fom-website/en/drivers/lewis-hamilton/_jcr_content/image.img.1920.medium.jpg/1533294345447.jpg"
                            data-nationality="British" data-dob="1985-01-07" data-country="gb">
                            <td class="list__cell"><span class="list__value">1</span></td>
                            <td class="list__cell"><span class="list__value">Lewis Hamilton</span></td>
                            <td class="list__cell"><span class="list__value"></span></td>
                            <td class="list__cell"><span class="list__value">95</span><small
                                    class="list__label">Points</small></td>
                        </tr>
                        <tr class="list__row"
                            data-image="https://www.formula1.com/content/fom-website/en/drivers/sebastian-vettel/_jcr_content/image.img.1920.medium.jpg/1533294389985.jpg"
                            data-nationality="German" data-dob="1987-07-03" data-country="de">
                            <td class="list__cell"><span class="list__value">2</span></td>
                            <td class="list__cell"><span class="list__value">Sebastian Vettel</span></td>
                            <td class="list__cell"></td>
                            <td class="list__cell"><span class="list__value">78</span><small
                                    class="list__label">Points</small></td>
                        </tr>
                        <tr class="list__row"
                            data-image="https://www.formula1.com/content/fom-website/en/drivers/valtteri-bottas/_jcr_content/image.img.1920.medium.jpg/1536135115661.jpg"
                            data-nationality="Finnish" data-dob="1989-08-28" data-country="fi">
                            <td class="list__cell"><span class="list__value">3</span></td>
                            <td class="list__cell"><span class="list__value">Valtteri Bottas</span></td>
                            <td class="list__cell"></td>
                            <td class="list__cell"><span class="list__value">58</span><small
                                    class="list__label">Points</small></td>
                        </tr>
                        <tr class="list__row"
                            data-image="https://www.formula1.com/content/fom-website/en/drivers/kimi-raikkonen/_jcr_content/image.img.1920.medium.jpg/1544714269466.jpg"
                            data-nationality="Finnish" data-dob="1979-10-17" data-country="fi">
                            <td class="list__cell"><span class="list__value">4</span></td>
                            <td class="list__cell"><span class="list__value">Kimi Räikkönen</span></td>
                            <td class="list__cell"></td>
                            <td class="list__cell"><span class="list__value">48</span><small
                                    class="list__label">Points</small></td>
                        </tr>
                        <tr class="list__row"
                            data-image="https://www.formula1.com/content/fom-website/en/drivers/daniel-ricciardo/_jcr_content/image.img.1920.medium.jpg/1544714300924.jpg"
                            data-nationality="Australian" data-dob="1989-07-01" data-country="au">
                            <td class="list__cell"><span class="list__value">5</span></td>
                            <td class="list__cell"><span class="list__value">Daniel Ricciardo</span></td>
                            <td class="list__cell"></td>
                            <td class="list__cell"><span class="list__value">47</span><small
                                    class="list__label">Points</small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>