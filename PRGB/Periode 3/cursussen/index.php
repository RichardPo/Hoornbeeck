<?php

    $cursussen = [
        [
            "cursus" => "Dreamweaver",
            "omschrijving" => "Basis webdesign",
            "prijs" => "120"
        ],
        [
            "cursus" => "Javascript",
            "omschrijving" => "Programmeren in de browser",
            "prijs" => "90"
        ],
        [
            "cursus" => "PHP",
            "omschrijving" => "Programmeren op de server",
            "prijs" => "150"
        ],
        [
            "cursus" => "Dreamweaver Eindwerk",
            "omschrijving" => "Webdesign in de praktijk",
            "prijs" => "180"
        ],
        [
            "cursus" => "Dreamweaver",
            "omschrijving" => "Webdesign thuis",
            "prijs" => "280"
        ],
    ];

?>

<html>

    <head>
        <style>
            table, tr, td {
                border: 2px solid black;
                border-collapse: collapse;
            }
            td {
                padding: 5px;
            }
        </style>
    </head>

    <body>
        <h1>Cursussen</h1>

        <div id="navbar">
            <a href="index.php">Home</a>
            <?= isset($_GET["loggedIn"]) ? "<a href='login.php'>Uitloggen</a>" : "<a href='login.php'>Inloggen</a>" ?>
        </div><br>

        <table>
            <tr>
                <td>Cursus</td>
                <td>Omschrijving</td>
                <td>Prijs</td>

                <?= isset($_GET["loggedIn"]) ? "<td></td>" : "" ?>
            </tr>

            <?php
            
                foreach($cursussen as $cursus) {
                    $naam = $cursus["cursus"];
                    $omschrijving = $cursus["omschrijving"];
                    $prijs = $cursus["prijs"];

                    echo "
                        <tr>
                            <td>" . $naam . "</td>
                            <td>" . $omschrijving . "</td>
                            <td>" . $prijs . "</td>
                    ";

                    if(isset($_GET["loggedIn"])) {
                        echo "<td><a href='index.php?loggedIn&cursus=" . $naam . "'>Inschrijven</a></td>";
                    }

                    echo "</tr>";
                }
            
            ?>
        </table>

        <?= isset($_GET["loggedIn"]) && isset($_GET["cursus"]) ? "Je hebt je succesvol ingeschreven voor de cursus " . $_GET["cursus"] . "!" : "" ?>
    </body>

</html>