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

?>

<div class="main center">
    <h2>Mijn inschrijvingen</h2>
    <table>
        <tr>
            <td>Cursus</td>
            <td>Datum</td>
            <td></td>
        </tr>

        <?php

            $userID = $_SESSION["user"]["user_id"];

            $sql = "SELECT * FROM courses, registrations WHERE registrations.userID='$userID' AND registrations.courseID=courses.id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td><a href='inschrijvingen.php?removeID=" . $row["id"] . "'>Cancel inschrijving</a></td>
                    </tr>
                ";
            }
        ?>
    </table>
</div>

<?php include "includes/footer.inc.php"; ?>