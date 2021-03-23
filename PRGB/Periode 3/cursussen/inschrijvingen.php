<?php

    include "includes/header.inc.php";

    if(!isset($_SESSION["user"])) {
        header("Location: index.php");
        exit();
    }

    include "includes/conn.inc.php";

    if(isset($_GET["removeID"])) {
        $id = $_GET["removeID"];
        $user_id = $_SESSION["user"]["user_id"];
        $sql = "DELETE FROM registrations WHERE id='$id' AND userID='$user_id'";
        mysqli_query($conn, $sql);
        header("Location: inschrijvingen.php");
        exit();
    }

    $userID = $_SESSION["user"]["user_id"];

    $sql = "SELECT * FROM courses, registrations WHERE registrations.userID='$userID' AND registrations.courseID=courses.id";
    $result = mysqli_query($conn, $sql);

    $registrations = [];
    while($row = mysqli_fetch_assoc($result)) {
        $registration = ["id" => $row["id"], "course_name" => $row["name"], "date" => $row["date"]];
        array_push($registrations, $registration);
    }

?>

<div class="main center">
    <h2>Mijn inschrijvingen</h2>

    <?php
    
        if(count($registrations) <= 0) {
            echo "Geen inschrijvingen.";
        } else {
            echo "
                <table>
                <tr>
                    <td>Cursus</td>
                    <td>Datum</td>
                    <td></td>
                </tr>
            ";

            foreach($registrations as $reg) {
                echo "
                    <tr>
                        <td>" . $reg["course_name"] . "</td>
                        <td>" . $reg["date"] . "</td>
                        <td><a href='inschrijvingen.php?removeID=" . $reg["id"] . "'>Cancel inschrijving</a></td>
                    </tr>
                ";
            }

            echo "</table>";
        }
    
    ?>
</div>

<?php include "includes/footer.inc.php"; ?>