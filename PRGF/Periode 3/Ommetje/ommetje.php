<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://kit.fontawesome.com/e5272abace.js" crossorigin="anonymous"></script>

        <link href="src/css/style.css?<?= time() ?>" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header>
            <div class="header-text center">
                <p><b>Je bent aan het lopen</b><br>Lock je telefoon en geniet van de omgeving</p>
            </div>

            <div class="hoofd center" style="bottom: 45px;">
                <img src="src/pictures/hoofd2.png" width="288px" style="transform: rotateZ(-10deg);"/>
            </div>
            <div class="curve-top">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-5.98,26.94 C136.79,89.10 365.91,92.06 522.23,25.95 L576.97,210.49 L0.00,150.00 Z" style="stroke: none; fill: white;"></path></svg>
            </div>
        </header>

        <div class="main" style="top: -80px; min-height: calc(100% - 400px + 80px);">
            <div class="time">
                <span id="time-counter" class="big">00:00 </span><span class="medium">/20</span>
            </div>

            <div class="stop-btn-wrapper center">
                <button class="stop-btn" onclick="StopOmmetje()">
                    <i class="fas fa-stop"></i>
                </button>
            </div>
        </div>

        <script src="src/js/counter.js?time=<?= time(); ?>"></script>
    </body>
</html>