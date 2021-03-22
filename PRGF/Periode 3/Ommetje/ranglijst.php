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
            <div class="leaderboard-main-header">
                <span class="pink medium">T4I1AA C20</span>
                <div class="leaderboard-main-header-right">
                    <span class="little"><a href="#">Uitleg</a></span>
                </div><br>
                <span class="little grey">Team gestart op: <b>15-02-2021</b></span><br>
                <span class="little pink">Wissel of Start een team</span>
            </div>
            <div class="leaderboard-main-main">
            </div>
        </div>

        <script src="src/js/progress.js?time=<?= time(); ?>"></script>
        <script src="src/js/leaderboard.js?time=<?= time(); ?>"></script>
    </body>
</html>