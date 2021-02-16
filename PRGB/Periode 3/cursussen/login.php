<!DOCTYPE html>
<html>
    <head>
        <style>
            .red {
                color: red;
            }
        </style>
    </head>

    <body>
        <h1>Inloggen</h1>

        <div id="navbar">
            <a href="index.php">Home</a>
            <a href='login.php'>Inloggen</a>
        </div><br>

        <?php
        
            if($_POST) {
                $rUsername = "Admin";
                $rPassword = "12345";

                $lUsername = $_POST["username"];
                $lPassword = $_POST["password"];

                if(empty($lUsername) || empty($lPassword)) {
                    echo "<span class='red'>Vul beide velden in.</span><br><br>";
                } else {
                    if($lUsername == $rUsername && $lPassword == $rPassword) {
                        header("Location: index.php?loggedIn");
                    } else {
                        echo "<span class='red'>Gebruikers naam en/of wachtwoord onjuist.</span><br><br>";
                    }
                }
            }
        
        ?>

        <form action="" method="post">
            <label>Gebruikersnaam: </label><br>
            <input type="text" name="username"/><br>
            <label>Wachtwoord: </label><br>
            <input type="password" name="password"/><br><br>
            <input type="submit" value="Inloggen"/>
        </form>
    </body>
</html>