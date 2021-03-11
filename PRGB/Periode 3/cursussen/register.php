<?php 

    include "includes/header.inc.php"; 

    if(isset($_SESSION["user"])) {
        header("Location: index.php");
        exit();
    }

    $message = "";

    if($_POST) {
        $rUsername = $_POST["rUsername"];
        $rPassword = $_POST["rPassword"];
        $rFullname = $_POST["rFullname"];

        if(empty($rUsername) || empty($rPassword) || empty($rFullname)) {
            $message = "Vul alle velden in.";
        } else {
            $conn = mysqli_connect("localhost", "root", "", "cursussen");
            $sql1 = "SELECT * FROM users WHERE username='$rUsername'";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) > 0) {
                $message = "Gebruikersnaam bestaat al!";
            } else {
                $sql2 = "INSERT INTO users (username, password, fullname) VALUES ('$rUsername', '$rPassword', '$rFullname')";
                if(mysqli_query($conn, $sql2)) {
                    header("Location: login.php");
                    exit();
                } else {
                    $message = "Fout bij registeren. Probeer het nog een keer.";
                }
            }
        }
    }

?>

<div class="main center">
    <form method="post" action="" class="register-form">
        <h2>Registreren</h2>
        <label>Gebruikersnaam:</label><br>
        <input type="text" name="rUsername"/><br><br>
        <label>Volledige naam:</label><br>
        <input type="text" name="rFullname"/><br><br>
        <label>Wachtwoord:</label><br>
        <input type="password" name="rPassword"/><br><br><br>
        <?= empty($message) ? "" : "<span class='red'>" . $message . "</span><br><br>" ?>
        <input type="submit" value="Registeren"/>
    </form>
</div>

<?php include "includes/footer.inc.php"; ?>