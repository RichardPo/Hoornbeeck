<?php

    include "includes/header.inc.php";

    $message = "";
    $cursussen = [];

    include "includes/conn.inc.php";
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $cursus = ["id" => $row["id"], "cursus" => $row["name"], "omschrijving" => $row["description"], "prijs" => $row["price"]];
        array_push($cursussen, $cursus);
    }

    if($_POST) {
        if(isset($_POST["date"]) && isset($_SESSION["user"]) && isset($_GET["cursus"])) {
            $date = $_POST["date"];
            $userID = $_SESSION["user"]["user_id"];
            $courseID = $_GET["cursus"];

            if(empty($date)) {
                $message = "Geef een datum op voor de inschrijving.";
            } else {
                $sql2 = "INSERT INTO registrations (userID, courseID, date) VALUES ('$userID', '$courseID', '$date')";
                if(mysqli_query($conn, $sql2)) {
                    $message = "Beste " . $_SESSION["user"]["username"] . ", je hebt je succesvol ingeschreven.";
                } else {
                    $message = "Er ging iets mis bij het inschrijven. Probeer het nog een keer.";
                }
            }
        } else {
            $message = "Er ging iets mis bij het inschrijven. Probeer het nog een keer.";
        }
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
                $id = $cursus["id"];

                echo "
                    <tr>
                        <td>" . $naam . "</td>
                        <td>" . $omschrijving . "</td>
                        <td>" . $prijs . "</td>
                ";

                if(isset($_SESSION["user"])) {
                    echo "<td><a href='index.php?registerPopup&cursus=" . $id . "'>Inschrijven</a></td>";
                }

                echo "</tr>";
            }
        
        ?>
    </table>

    <?= isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1 ? "<br><a href='beheer.php'>Beheer cursussen</a>" : "" ?>
    <?= empty($message) ? "" : "<br><div class='success'>" . $message . "</div>" ?>

    <div class="popup hidden" id="registerPopup">
        <form method="post" action="index.php<?= isset($_GET["cursus"]) ? "?cursus=" . $_GET["cursus"] : "" ?>">
            <h2>Inschrijven</h2>
            <label>Wanneer gaat u de cursus volgen?</label><br>
            <input type="date" name="date"/><br><br>
            <input type="submit" value="Inschrijven"/>
            <div class="close-popup" onclick="ClosePopup('registerPopup')">Sluiten</div>
        </form>
    </div>
</div>

<?= isset($_GET["registerPopup"]) ? "<script>OpenPopup('registerPopup');</script>" : "" ?>

<?php include "includes/footer.inc.php"; ?>