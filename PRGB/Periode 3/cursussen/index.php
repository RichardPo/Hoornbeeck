<?php

    include "includes/header.inc.php";

    $cursussen = [];

    include "includes/conn.inc.php";
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $cursus = ["cursus" => $row["name"], "omschrijving" => $row["description"], "prijs" => $row["price"]];
        array_push($cursussen, $cursus);
    }

?>
<div class="main center">
    <h2>Inschrijven</h2>
    <table>
        <tr>
            <td>Cursus</td>
            <td>Omschrijving</td>
            <td>Prijs</td>

            <?= isset($_SESSION["user"]) ? "<td></td>" : "" ?>
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

                if(isset($_SESSION["user"])) {
                    echo "<td><a href='index.php?cursus=" . $naam . "'>Inschrijven</a></td>";
                }

                echo "</tr>";
            }
        
        ?>
    </table>

    <?= isset($_SESSION["user"]) && isset($_GET["cursus"]) ? "<p class='success'>Beste " . $_SESSION["user"]["fullname"] . ", je hebt je succesvol ingeschreven voor de cursus " . $_GET["cursus"] . "!</p>" : "" ?>

    <?= isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1 ? "<br><a href='beheer.php'>Beheer cursussen</a>" : "" ?>
</div>

<?php include "includes/footer.inc.php"; ?>