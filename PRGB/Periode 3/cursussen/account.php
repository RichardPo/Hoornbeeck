<?php

    include "includes/header.inc.php"; 
    
    if(!isset($_SESSION["user"])) {
        header("Location: index.php");
        exit();
    }

    $message = "";

    if($_POST) {
        $uUsername = $_POST["uUsername"];
        $uFullname = $_POST["uFullname"];
        $uPassword = $_POST["uPassword"];

        if(empty($uUsername) || empty($uPassword)) {
            $message = "Vul alle velden in.";
        } else {
            $userID = $_SESSION["user"]["user_id"];

            $conn = mysqli_connect("localhost", "root", "", "cursussen");
            $sql = "UPDATE users SET username='$uUsername', password='$uPassword', fullname='$uFullname' WHERE id='$userID'";
            
            if(mysqli_query($conn, $sql)) {
                $_SESSION["user"]["username"] = $uUsername;
                $_SESSION["user"]["password"] = $uPassword;
                $_SESSION["user"]["fullname"] = $uFullname;
            } else {
                $message = "Er ging iets fout bij het bijwerken van uw account. Probeer het nog een keer.";
            }
        }
    }

?>

<div class="main center">
    <div class="block">
        Gebruikersnaam: <?= $_SESSION["user"]["username"]; ?><br>
        Volledige naam: <?= $_SESSION["user"]["fullname"]; ?><br><br>
        <?= $_SESSION["user"]["admin"] ? "<div class='account-btn center' style='background-color: rgb(96, 177, 127);' onclick=\"OpenPopup('adminPopup')\">Beheer admins</div><br>" : "" ?>
        <div class="account-btn center" style="background-color: rgb(96, 177, 127);" onclick="OpenPopup('accountPopup')">Account bijwerken</div><br>
        <a href="removeAccount.php"><div class="account-btn center">Verwijder account</div></a>
    </div>

    <div class="popup hidden" id="accountPopup">
        <form method="post" action="">
            <h2>Account bijwerken</h2>
            <label>Gebruikersnaam:</label><br>
            <input type="text" name="uUsername"/><br><br>
            <label>Volledige naam:</label><br>
            <input type="text" name="uFullname"/><br><br>
            <label>Wachtwoord:</label><br>
            <input type="password" name="uPassword"/><br><br><br>
            <?= empty($message) ? "" : "<span class='red'>" . $message . "</span><br><br>" ?>
            <input type="submit" value="Bijwerken"/>
            <div class="close-popup" onclick="ClosePopup('accountPopup')">Sluiten</div>
        </form>
    </div>

    <div class="popup hidden" id="adminPopup">
        <form method="post" action="updateAdmin.php">
            <h2>Account bijwerken</h2>
            <label>Gebruikersnaam:</label><br>
            <input type="text" name="uUsername"/><br><br>
            <label>Volledige naam:</label><br>
            <input type="text" name="uFullname"/><br><br>
            <label>Wachtwoord:</label><br>
            <input type="password" name="uPassword"/><br><br><br>
            <?= empty($message) ? "" : "<span class='red'>" . $message . "</span><br><br>" ?>
            <input type="submit" value="Bijwerken"/>
            <div class="close-popup" onclick="ClosePopup('accountPopup')">Sluiten</div>
        </form>
    </div>
</div>

<script src="src/js/popup.js"></script>

<?php include "includes/footer.inc.php"; ?>