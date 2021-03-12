<?php

    include "includes/header.inc.php"; 
    
    if(!isset($_SESSION["user"])) {
        header("Location: index.php");
        exit();
    }

    $uMessage = "";
    $aMessage = "";

    if($_POST) {
        include "includes/conn.inc.php";
        if(isset($_POST["updateAccount"])) {
            $uUsername = $_POST["uUsername"];
            $uFullname = $_POST["uFullname"];
            $uPassword = $_POST["uPassword"];
    
            if(empty($uUsername) || empty($uFullname) || empty($uPassword)) {
                $uMessage = "Vul alle velden in.";
            } else {
                $userID = $_SESSION["user"]["user_id"];
    
                $sql1 = "SELECT * FROM users WHERE username='$uUsername'";
                $result = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result) > 0) {
                    $uMessage = "Gebruikersnaam bestaat al!";
                } else {
                    $sql2 = "UPDATE users SET username='$uUsername', password='$uPassword', fullname='$uFullname' WHERE id='$userID'";
                    if(mysqli_query($conn, $sql2)) {
                        $_SESSION["user"]["username"] = $uUsername;
                        $_SESSION["user"]["password"] = $uPassword;
                        $_SESSION["user"]["fullname"] = $uFullname;

                        header("Location: account.php");
                        exit();
                    } else {
                        $uMessage = "Er ging iets fout bij het bijwerken van uw account. Probeer het nog een keer.";
                    }
                }
            }
        } elseif(isset($_POST["updateAdmins"])) {
            if($_SESSION["user"]["admin"] == 1) {
                $aUsername = $_POST["aUsername"];
                $aAction = $_POST["aAction"];

                if(empty($aUsername) || empty($aAction)) {
                    $aMessage = "Vul alle velden in.";
                } else {
                    $admin = 0;
                    if($aAction == "add") {
                        $admin = 1;
                    }
                    $sql1 = "SELECT * FROM users WHERE username='$aUsername'";
                    $result = mysqli_query($conn, $sql1);
                    if(mysqli_num_rows($result) > 0) {
                        $sql2 = "UPDATE users SET admin='$admin' WHERE username='$aUsername'";
                        if(!mysqli_query($conn, $sql2)) {
                            $aMessage = "Er ging iets fout bij het bijwerken van de beheerder-selectie. Probeer het nog een keer.";
                        } else {
                            header("Location: account.php");
                            exit();
                        }
                    } else {
                        $aMessage = "Geen gebruiker gevonden!";
                    }
                }
            } else {
                $aMessage = "Je moet een admin zijn om admins te kunnen beheren!";
            }
        }
    }

?>

<div class="main center">
    <div class="block">
        Gebruikersnaam: <?= $_SESSION["user"]["username"]; ?><br>
        Volledige naam: <?= $_SESSION["user"]["fullname"]; ?><br><br>
        <?= $_SESSION["user"]["admin"] ? "<div class='btn center' style='background-color: rgb(96, 177, 127);' onclick=\"OpenPopup('adminPopup')\">Beheer admins</div><br>" : "" ?>
        <div class="btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('accountPopup')">Account bijwerken</div><br>
        <a href="removeAccount.php"><div class="btn center">Verwijder account</div></a>
    </div>

    <div class="popup hidden" id="accountPopup">
        <form method="post" action="account.php?accountPopup">
            <h2>Account bijwerken</h2>
            <label>Gebruikersnaam:</label><br>
            <input type="text" name="uUsername"/><br><br>
            <label>Volledige naam:</label><br>
            <input type="text" name="uFullname"/><br><br>
            <label>Wachtwoord:</label><br>
            <input type="password" name="uPassword"/><br><br><br>
            <?= empty($uMessage) ? "" : "<span class='red'>" . $uMessage . "</span><br><br>" ?>
            <input type="submit" name="updateAccount" value="Bijwerken"/>
            <div class="close-popup" onclick="ClosePopup('accountPopup')">Sluiten</div>
        </form>
    </div>

    <div class="popup hidden" id="adminPopup">
        <form method="post" action="account.php?adminPopup">
            <h2>Beheerder toevoegen / verwijderen</h2>
            <label>Gebruikersnaam:</label><br>
            <input type="text" name="aUsername"/><br><br>
            <label>Toevoegen of verwijderen:</label><br><br>
            <input type="radio" name="aAction" value="add" checked/><label>Toevoegen</label><br><br>
            <input type="radio" name="aAction" value="remove"/><label>Verwijderen</label><br><br>
            <?= empty($aMessage) ? "" : "<span class='red'>" . $aMessage . "</span><br><br>" ?>
            <input type="submit" name="updateAdmins" value="Bijwerken"/>
            <div class="close-popup" onclick="ClosePopup('adminPopup')">Sluiten</div>
        </form>
    </div>
</div>

<?= isset($_GET["accountPopup"]) ? "<script>OpenPopup('accountPopup');</script>" : "" ?>
<?= isset($_GET["adminPopup"]) ? "<script>OpenPopup('adminPopup');</script>" : "" ?>

<?php include "includes/footer.inc.php"; ?>