<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://kit.fontawesome.com/e5272abace.js" crossorigin="anonymous"></script>

        <link href="src/css/style.css?<?= time() ?>" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header class="header-leaderboard">
            <div class="header-leaderboard-header">
                <div class="header-arrow-back center" onclick="location.href = 'index.php';"><</div>
                <div class="header-leaderboard-text center">RANGLIJST</div>
            </div>
            <div class="leaderboard-background">
                <div class="leaderboard">
                    <ul class="center">
                        <li style="right: 70px;">Richard Post</li>
                        <li style="right: -39px;">Adwin Zijderveld</li>
                        <li style="right: 70px;">Richard Post</li>
                        <li style="right: -39px;">Adwin Zijderveld</li>
                        <li style="right: 70px;">Richard Post</li>
                        <li style="right: -39px;">Adwin Zijderveld</li>
                        <li style="right: 50px;">Richard Post</li>
                        <li style="right: -90px;">Adwin Zijderveld</li>
                        <li style="right: 20px;">Richard Post</li>
                        <li style="right: -80px;">Adwin Zijderveld</li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="main leaderboard-main">
        </div>

        <script src="src/js/leaderboard.js?time=<?= time(); ?>"></script>
    </body>
</html>