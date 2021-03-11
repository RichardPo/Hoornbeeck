<?php

    include "includes/header.inc.php";

    if(isset($_SESSION["user"])) {
        header("Location: index.php");
        exit();
    }

    $message = "";

    if($_POST) {
        $lUsername = $_POST["lUsername"];
        $lPassword = $_POST["lPassword"];

        if(empty($lUsername) || empty($lPassword)) {
            $message = "Vul beide velden in.";
        } else {
            $conn = mysqli_connect("localhost", "root", "", "cursussen");
            $sql = "SELECT * FROM users WHERE username='$lUsername' AND password='$lPassword'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    $admin = false;
                    if($row["admin"] > 0) {
                        $admin = true;
                    }

                    $_SESSION["user"] = ["user_id" => $row["id"], "username" => $row["username"], "fullname" => $row["fullname"], "admin" => $admin];
                    header("Location: index.php");
                    exit();
                }
            } else {
                $message = "Gebruikers naam en/of wachtwoord onjuist.";
            }
        }
    }

?>

<div class="main center">
    <form action="" method="post" class="login-form">
        <h2>Inloggen</h2>
        <label>Gebruikersnaam: </label><br>
        <input type="text" name="lUsername"/><br><br>
        <label>Wachtwoord: </label><br>
        <input type="password" name="lPassword"/><br><br><br>
        <?= empty($message) ? "" : "<span class='red'>" . $message . "</span><br><br>" ?>
        <input type="submit" value="Inloggen"/>
    </form>
</div>

<?php include "includes/footer.inc.php"; ?>