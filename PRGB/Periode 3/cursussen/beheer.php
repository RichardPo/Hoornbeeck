<?php 

    include "includes/header.inc.php";

    if($_SESSION["user"]["admin"] != 1) {
        header("Location: index.php");
        exit();
    }

    $cMessage = "";
    $catMessage = "";
    if($_POST) {
        $sql = "";

        if(isset($_POST["addCourse"])) {
            $courseName = $_POST["cName"];
            $courseDescription = $_POST["cDescription"];
            $coursePrice = $_POST["cPrice"];
            $courseCat = $_POST["cat"];

            if(empty($courseName) || empty($courseDescription) || empty($coursePrice) || empty($courseCat)) {
                $cMessage = "Vul alle velden in.";
            } else {
                $sql = "INSERT INTO courses (name, description, price, category) VALUES ('$courseName', '$courseDescription', '$coursePrice', '$courseCat')";
            }
        } elseif(isset($_POST["editCourse"])) {
            $courseID = $_POST["cID"];
            $courseName = $_POST["cNewName"];
            $courseDescription = $_POST["cDescription"];
            $coursePrice = $_POST["cPrice"];
            $courseCat = $_POST["cat"];

            if(empty($courseID) || empty($courseName) || empty($courseDescription) || empty($coursePrice) || empty($courseCat)) {
                $cMessage = "Vul alle velden in.";
            } else {
                $sql = "UPDATE courses SET name='$courseName', description='$courseDescription', price='$coursePrice', category='$courseCat' WHERE id='$courseID'";
            }
        } elseif(isset($_POST["removeCourse"])) {
            $courseID = $_POST["cID"];

            if(empty($courseID)) {
                $cMessage = "Vul het veld in.";
            } else {
                $sql = "DELETE FROM courses WHERE id='$courseID'";
            }
        } elseif(isset($_POST["addCategory"])) {
            $categoryName = $_POST["catName"];

            if(empty($categoryName)) {
                $catMessage = "Vul het veld in.";
            } else {
                $sql = "INSERT INTO categories (categoryName) VALUES ('$categoryName')";
            }
        } elseif(isset($_POST["removeCategory"])) {
            $categoryID = $_POST["catID"];

            if(empty($categoryID)) {
                $catMessage = "Vul het veld in.";
            } else {
                $sql = "DELETE FROM categories WHERE id='$categoryID'; DELETE FROM courses WHERE category='$categoryID'";
            }
        }

        if(!empty($sql)) {
            include "includes/conn.inc.php";
            if(mysqli_multi_query($conn, $sql))  {
                header("Location: index.php");
                exit();
            } else {
                $cMessage = "Er ging iets mis tijdens het bijwerken van de lijst met cursussen/categorieën. Probeer het nog een keer.";
                $catMessage = $cMessage;
            }
        }
    }

?>

<div class="main center">
    <div class="block">
        <div class="btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('add-course-popup')">Cursus toevoegen</div><br>
        <div class="btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('edit-course-popup')">Cursus bewerken</div><br>
        <div class="btn center" onclick="OpenPopup('remove-course-popup')">Cursus verwijderen</div><br><br>
        <div class="btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('add-category-popup')">Categorie toevoegen</div><br>
        <div class="btn center" onclick="OpenPopup('remove-category-popup')">Categorie verwijderen</div>
    </div>

    <div class="popup hidden" id="add-course-popup">
        <form method="post" action="beheer.php?addCoursePopup">
            <h2>Cursus toevoegen</h2>
            <label>Cursusnaam:</label><br>
            <input type="text" name="cName"/><br><br>
            <label>Cursusbeschrijving:</label><br>
            <input type="text" name="cDescription"/><br><br>
            <label>Prijs:</label><br>
            <input type="number" name="cPrice"/><br><br>
            <label>Categorie:</label><br>
            <select name="cat">
                <option value="">Niets geselecteerd</option>
                <?php
                
                    include "includes/conn.inc.php";
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["categoryName"] . "</option>";
                    }

                ?>
            </select><br><br><br>
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
            <input type="number" name="cPrice"/><br><br>
            <label>Nieuwe categorie:</label><br>
            <select name="cat">
                <option value="">Niets geselecteerd</option>
                <?php
                
                    include "includes/conn.inc.php";
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["categoryName"] . "</option>";
                    }

                ?>
            </select><br><br><br>
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

    <div class="popup hidden" id="add-category-popup">
        <form method="post" action="beheer.php?addCategoryPopup">
            <h2>Categorie toevoegen</h2>
            <label>Categorienaam:</label><br>
            <input type="text" name="catName"/><br><br>
            <?= empty($catMessage) ? "" : "<span class='red'>" . $catMessage . "</span><br><br>" ?>
            <input type="submit" name="addCategory" value="Toevoegen"/>
            <div class="close-popup" onclick="ClosePopup('add-category-popup')">Sluiten</div>
        </form>
    </div>

    <div class="popup hidden" id="remove-category-popup">
        <form method="post" action="beheer.php?removeCategoryPopup">
            <h2>Categorie verwijderen</h2>
            <label>Categorie:</label><br>
            <select name="catID">
                <option value="">Niets geselecteerd</option>
                <?php
                
                    include "includes/conn.inc.php";
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["categoryName"] . "</option>";
                    }

                ?>
            </select><br><br>
            <?= empty($catMessage) ? "" : "<span class='red'>" . $catMessage . "</span><br><br>" ?>
            <input type="submit" name="removeCategory" value="Verwijderen"/>
            <div class="close-popup" onclick="ClosePopup('remove-category-popup')">Sluiten</div>
        </form>
    </div>
</div>

<?= isset($_GET["addCoursePopup"]) ? "<script>OpenPopup('add-course-popup');</script>" : "" ?>
<?= isset($_GET["editCoursePopup"]) ? "<script>OpenPopup('edit-course-popup');</script>" : "" ?>
<?= isset($_GET["removeCoursePopup"]) ? "<script>OpenPopup('remove-course-popup');</script>" : "" ?>
<?= isset($_GET["addCategoryPopup"]) ? "<script>OpenPopup('add-category-popup');</script>" : "" ?>
<?= isset($_GET["removeCategoryPopup"]) ? "<script>OpenPopup('remove-category-popup');</script>" : "" ?>

<?php include "includes/footer.inc.php"; ?>