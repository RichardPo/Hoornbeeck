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
        </header>

        <div class="main">
            <div class="minutes">
                <span class="pink big"><b>0</b></span> /20 <span class="little">min</span>
            </div>

            <div class="center main-child">
                <button class="start" onclick="StartOmmetje();">Start Ommetje</button>

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
                        <div class="medaille" id="Hiker">
                            <div class="medal">
                                <div class="icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                                <svg class="progress-ring" width="100%" height="100%">
                                    <circle class="progress-ring__circle" stroke="#3c9966" stroke-width="6" fill="transparent" r="calc(50% - 3px)" cx="50%" cy="50%"/>
                                </svg>
                            </div>
                            <div class="medaille-text"><b>Hiker</b><br>Loop 20 minuten per dag</div>
                        </div>
                        <div class="medaille" id="Reeks">
                            <div class="medal">
                                <div class="icon" style="background-image: url(https://cdn1.iconfinder.com/data/icons/unigrid-phantom-culture/60/009_021_foot_walk_allowed_shoe-512.png);"></div>
                                <svg class="progress-ring" width="100%" height="100%">
                                    <circle class="progress-ring__circle" stroke="#3c9966" stroke-width="6" fill="transparent" r="calc(50% - 3px)" cx="50%" cy="50%"/>
                                </svg>
                            </div>
                            <div class="medaille-text"><b>Reeks</b><br>Aaneengesloten dagen lopen</div>
                        </div>
                        <div class="medaille" id="Hart">
                            <div class="medal">
                                <div class="icon" style="background-image: url(https://purepng.com/public/uploads/large/heart-icon-y1k.png);"></div>
                                <svg class="progress-ring" width="100%" height="100%">
                                    <circle class="progress-ring__circle" stroke="#3c9966" stroke-width="6" fill="transparent" r="calc(50% - 3px)" cx="50%" cy="50%"/>
                                </svg>
                            </div>
                            <div class="medaille-text"><b>Hart</b><br>Deel de campagne</div>
                        </div>
                        <div class="medaille" id="VroegeVogel">
                            <div class="medal">
                                <div class="icon" style="background-image: url(https://www.pngkey.com/png/full/251-2518897_clip-art-flying-bird-transparent-background-dove-clipart.png);"></div>
                                <svg class="progress-ring" width="100%" height="100%">
                                    <circle class="progress-ring__circle" stroke="#3c9966" stroke-width="6" fill="transparent" r="calc(50% - 3px)" cx="50%" cy="50%"/>
                                </svg>
                            </div>
                            <div class="medaille-text"><b>Vroege vogel</b><br>Loop voor 9:00 uur</div>
                        </div>
                        <div class="medaille" id="BlijfActief">
                            <div class="medal">
                                <div class="icon" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/f/fa/Run_icon.png);"></div>
                                <svg class="progress-ring" width="100%" height="100%">
                                    <circle class="progress-ring__circle" stroke="#3c9966" stroke-width="6" fill="transparent" r="calc(50% - 3px)" cx="50%" cy="50%"/>
                                </svg>
                            </div>
                            <div class="medaille-text"><b>Blijf actief</b><br>Blijf voldoende in beweging</div>
                        </div>
                        <div class="medaille" id="Weetjes">
                            <div class="medal">
                                <div class="icon" style="background-image: url(https://iconfair.com/wp-content/uploads/2020/08/1-55.png);"></div>
                                <svg class="progress-ring" width="100%" height="100%">
                                    <circle class="progress-ring__circle" stroke="#3c9966" stroke-width="6" fill="transparent" r="calc(50% - 3px)" cx="50%" cy="50%"/>
                                </svg>
                            </div>
                            <div class="medaille-text"><b>Weetjes</b><br>Spaar alle hersenweetjes</div>
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

        <div class="popupBackground hidden"></div>

        <div class="medalPopup hidden">
            <div class="popupContent">
                <div class="popupTitle">De Hiker medaille</div>
                <div class="popupText">Loop dagelijks minimaal 20 minuten. Je krijgt hier per dag 5 XP punten voor. Voor je tweede Ommetje van de dag krijg je 1 extra punt.</div>
                <div class="levels">
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">brons</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">zilver</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">goud</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">robijn</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">saffier</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">diamant</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">smaragd</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">amethist</div>
                    </div>
                    <div class="level center">
                        <div id="level-amount">4x</div>
                        <div id="level-icon" style="background-image: url(https://www.svgrepo.com/show/251868/hiker-walk.svg);"></div>
                        <div id="level-name">parelmoer</div>
                    </div>
                </div>
            </div>
            <div class="popupFooter center">
                <div onclick="ClosePopup()">Sluiten</div>
            </div>
        </div>

        <script src="src/js/progress.js?time=<?=time()?>"></script>
    </body>

</html>