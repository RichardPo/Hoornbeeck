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
        <h2>Cursussen</h2>
        <form action="" method="post">
            <label>Geef je naam:</label>
            <input type="text" name="name" required="true"/><br><br>

            <table>
                <tr>
                    <td>Cursus</td>
                    <td>Omschrijving</td>
                    <td>Prijs</td>
                    <td></td>
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
                                <td>
                                    <button name='cursus' value='" . $naam . "' type='submit'>Inschrijven</button>
                                </td>
                            </tr>
                        ";
                    }
                
                ?>
            </table>
        </form>

        <?php
        
            if($_POST) {
                $name = $_POST["name"];
                $cursus = $_POST["cursus"];
                echo "Beste " . $name . ", je hebt je succesvol ingeschreven voor de cursus " . $cursus . "!";
            }
        
        ?>
    </body>

</html>