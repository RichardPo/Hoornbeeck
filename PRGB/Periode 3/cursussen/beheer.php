<?php 

    include "includes/header.inc.php";

    if($_SESSION["user"]["admin"] != 1) {
        header("Location: index.php");
        exit();
    }

    $cMessage = "";
    if($_POST) {
        include "includes/conn.inc.php";
        $sql = "";

        if(isset($_POST["addCourse"])) {
            $courseName = $_POST["cName"];
            $courseDescription = $_POST["cDescription"];
            $coursePrice = $_POST["cPrice"];

            if(empty($courseDescription) || empty($coursePrice)) {
                $cMessage = "Vul alle velden in.";
            } else {
                $sql = "INSERT INTO courses (name, description, price) VALUES ('$courseName', '$courseDescription', '$coursePrice')";
            }
        } elseif(isset($_POST["editCourse"])) {
            $courseID = $_POST["cID"];
            $courseNewName = $_POST["cNewName"];
            $courseDescription = $_POST["cDescription"];
            $coursePrice = $_POST["cPrice"];

            if(empty($courseID) || empty($courseNewName) || empty($courseDescription) || empty($coursePrice)) {
                $cMessage = "Vul alle velden in.";
            } else {
                $sql = "UPDATE courses SET name='$courseNewName', description='$courseDescription', price='$coursePrice' WHERE id='$courseID'";
            }
        } elseif(isset($_POST["removeCourse"])) {
            $courseID = $_POST["cID"];

            if(empty($courseID)) {
                $cMessage = "Vul het veld in.";
            } else {
                $sql = "DELETE FROM courses where id='$courseID'";
            }
        }

        if(!empty($sql)) {
            if(mysqli_query($conn, $sql))  {
                header("Location: index.php");
                exit();
            } else {
                $cMessage = "Er ging iets mis tijdens het bijwerken van de lijst met cursussen. Probeer het nog een keer.";
            }
        }
    }

?>

<div class="main center">
    <div class="block">
        <div class="btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('add-course-popup')">Cursus toevoegen</div><br>
        <div class="btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('edit-course-popup')">Cursus bewerken</div><br>
        <div class="btn center" onclick="OpenPopup('remove-course-popup')">Cursus verwijderen</div>
    </div>

    <div class="popup hidden" id="add-course-popup">
        <form method="post" action="beheer.php?addCoursePopup">
            <h2>Cursus toevoegen</h2>
            <label>Cursusnaam:</label><br>
            <input type="text" name="cName"/><br><br>
            <label>Cursusbeschrijving:</label><br>
            <input type="text" name="cDescription"/><br><br>
            <label>Prijs:</label><br>
            <input type="number" name="cPrice"/><br><br><br>
            <?= empty($cMessage) ? "" : "<span class='red'>" . $cMessage . "</span><br><br>" ?>
            <input type="submit" name="addCourse" value="Toevoegen"/>
            <div class="close-popup" onclick="ClosePopup('add-course-popup')">Sluiten</div>
        </form>
    </div>

    <div class="popup hidden" id="edit-course-popup">
        <form method="post" action="beheer.php?editCoursePopup">
            <h2>Cursus bewerken</h2>
            <label>Cursus:</label><br>
            <select name="cID">
                <option value="">Niets geselecteerd</option>
                <?php
                
                    include "includes/conn.inc.php";
                    $sql = "SELECT * FROM courses";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }

                ?>
            </select><br><br>
            <label>Nieuwe cursusnaam:</label><br>
            <input type="text" name="cNewName"/><br><br>
            <label>Nieuwe cursusbeschrijving:</label><br>
            <input type="text" name="cDescription"/><br><br>
            <label>Nieuwe prijs:</label><br>
            <input type="number" name="cPrice"/><br><br><br>
            <?= empty($cMessage) ? "" : "<span class='red'>" . $cMessage . "</span><br><br>" ?>
            <input type="submit" name="editCourse" value="Bijwerken"/>
            <div class="close-popup" onclick="ClosePopup('edit-course-popup')">Sluiten</div>
        </form>
    </div>

    <div class="popup hidden" id="remove-course-popup">
        <form method="post" action="beheer.php?removeCoursePopup">
            <h2>Cursus bewerken</h2>
            <label>Cursus:</label><br>
            <select name="cID">
                <option value="">Niets geselecteerd</option>
                <?php
                
                    include "includes/conn.inc.php";
                    $sql = "SELECT * FROM courses";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }

                ?>
            </select><br><br>
            <?= empty($cMessage) ? "" : "<span class='red'>" . $cMessage . "</span><br><br>" ?>
            <input type="submit" name="removeCourse" value="Verwijderen"/>
            <div class="close-popup" onclick="ClosePopup('remove-course-popup')">Sluiten</div>
        </form>
    </div>
</div>

<?= isset($_GET["addCoursePopup"]) ? "<script>OpenPopup('add-course-popup');</script>" : "" ?>
<?= isset($_GET["editCoursePopup"]) ? "<script>OpenPopup('edit-course-popup');</script>" : "" ?>
<?= isset($_GET["removeCoursePopup"]) ? "<script>OpenPopup('remove-course-popup');</script>" : "" ?>

<?php include "includes/footer.inc.php"; ?>