<?php

    include "includes/header.inc.php";

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
<div class="main center">
    <h2>Inschrijven</h2>
    <table>
        <tr>
            <td>Cursus</td>
            <td>Omschrijving</td>
            <td>Prijs</td>

            <?= isset($_SESSION["username"]) ? "<td></td>" : "" ?>
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

                if(isset($_SESSION["username"])) {
                    echo "<td><a href='index.php?cursus=" . $naam . "'>Inschrijven</a></td>";
                }

                echo "</tr>";
            }
        
        ?>
    </table>

    <?= isset($_SESSION["username"]) && isset($_GET["cursus"]) ? "<p class='success'>Beste " . $_SESSION["username"] . ", je hebt je succesvol ingeschreven voor de cursus " . $_GET["cursus"] . "!</p>" : "" ?>
</div>

<?php include "includes/footer.inc.php"; ?>