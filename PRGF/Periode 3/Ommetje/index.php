<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="src/css/style.css?<?= time() ?>" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header>
            <div class="naam">RichardPost</div>
            <div class="xp"><span class="pink"><b>0</b></span> XP</div>
            <div class="hoofd center">
                <img src="src/pictures/hoofd2.png" width="288px"/>
            </div>
            <div class="curve-top"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-8.80,31.88 C132.28,11.15 455.08,55.55 547.62,189.76 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: white;"></path></svg></div>        </header>

        <div class="main">
            <div class="minutes">
                <span class="pink big"><b>0</b></span> /20 <span class="little">min</span>
            </div>

            <div class="center main-child">
                <button class="start">Start Ommetje</button>

                <div id="team" class="block">
                    <div class="block-header">
                        <div>
                            <span class="pink medium"><b>T4I1AA C20</b></span>
                        </div>
                        <div class="block-header-right">
                            <span class="little"><a href="#">XP Uitleg</a></span>
                        </div>
                    </div>

                    <div class="block-main">
                        <div class="list-item">
                            <div class="li-left center">#11</div>
                            <div class="li-left center">Mark_Lok..<br>0 XP</div>
                        </div>
                        <div class="list-item you">
                            <div class="li-left center">#12</div>
                            <div class="li-left center">RichardP..<br>0 XP</div>
                        </div>
                        <div class="list-item">
                            <div class="li-left center">#13</div>
                            <div class="li-left center">AdwinZ123<br>0 XP</div>
                        </div>
                    </div>

                    <div class="center block-buttons">
                        <button class="leaderboard">Bekijk ranglijst</button>
                        <button class="team">Team beheer</button>
                    </div>
                </div>

                <div id="medailles" class="block">
                    <div class="blok-header">
                        <span class="pink medium"><b>Medailles</b></span>
                    </div>

                    <div class="block-main">
                        <div class="medaille">
                            <div class="icon"></div>
                            <div class="medaille-text"><b>Hiker</b><br>Loop 20 minuten per dag</div>
                        </div>
                        <div class="medaille">
                            <div class="icon"></div>
                            <div class="medaille-text"><b>Reeks</b><br>Aaneengesloten dagen lopen</div>
                        </div>
                        <div class="medaille">
                            <div class="icon"></div>
                            <div class="medaille-text"><b>Hart</b><br>Deel de campagne</div>
                        </div>
                        <div class="medaille">
                            <div class="icon"></div>
                            <div class="medaille-text"><b>Vroege vogel</b><br>Loop voor 9:00 uur</div>
                        </div>
                        <div class="medaille">
                            <div class="icon"></div>
                            <div class="medaille-text"><b>Blijf actief</b><br>Blijf voldoende in beweging</div>
                        </div>
                        <div class="medaille">
                            <div class="icon"></div>
                            <div class="medaille-text"><b>Weetjes</b><br>Spaar alle Hersenweetjes</div>
                        </div>
                    </div>

                    <div class="block-footer little">
                        Klik op een Medaille voor meer info.
                    </div>
                </div>

                <div id="doneren" class="block">
                    <div class="block-header">
                        <span class="pink medium"><b>Doneren</b></span>
                    </div>

                    <div class="block-main">
                        De hersenstichting is afhankelijk van particuliere giften. Dankzij jouw bijdrage kunnen we meer hersenonderzoek doen.
                    </div>

                    <div class="center block-buttons">
                        <button class="doneren">Doneren</button>
                    </div>
                </div>

                <div id="stats" class="block">
                    <div class="block-header">
                        <span class="pink medium"><b>Stats</b></span>
                    </div>

                    <div class="center block-buttons">
                        <button class="stats">Bekijk Statistieken</button>
                        <button class="ommetjes">Bekijk je Ommetjes</button>
                    </div>
                </div>
            </div>
        </div>

        <footer>
        <div class="curve-bottom"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-8.80,31.88 C132.28,11.15 164.44,87.14 546.50,134.50 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(228, 101, 175);"></path></svg></div>
            <div class="footer-text">
                Account instellingen<br>
                Over Ommetje<br>
                Veelgestelde vragen<br>
                Uitloggen<br><br>
                <span class="very-little">
                    Privacy statement<br>
                    Terms & Conditions
                </span>
            </div>
        </footer>
    </body>

</html>