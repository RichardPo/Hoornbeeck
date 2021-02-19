<?php

    include "includes/header.inc.php";

    if($_POST) {
        $users = [
            [
                "username" => "Klaas",
                "password" => "Klaas2"
            ],
            [
                "username" => "Albert Jan",
                "password" => "Appie"
            ],
            [
                "username" => "Pim",
                "password" => "Pim2"
            ],
            [
                "username" => "Pepijn",
                "password" => "Peppie"
            ]
        ];

        $lUsername = $_POST["username"];
        $lPassword = $_POST["password"];

        if(empty($lUsername) || empty($lPassword)) {
            echo "<span class='red'>Vul beide velden in.</span><br><br>";
        } else {
            foreach($users as $user) {
                if($user["username"] == $lUsername && $user["password"] == $lPassword) {
                    $_SESSION["username"] = $lUsername;
                    header("Location: index.php");
                    return;
                }
            }
                
            echo "<span class='red'>Gebruikers naam en/of wachtwoord onjuist.</span><br><br>";
        }
    }

?>

<div class="main center">
    <form action="" method="post" class="login-form">
        <h2>Inloggen</h2>
        <label>Gebruikersnaam: </label><br>
        <input type="text" name="username"/><br><br>
        <label>Wachtwoord: </label><br>
        <input type="password" name="password"/><br><br><br>
        <input type="submit" value="Inloggen"/>
    </form>
</div>

<?php include "includes/footer.inc.php"; ?>