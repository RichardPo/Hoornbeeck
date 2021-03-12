<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Cursussen</title>

    <script src="https://kit.fontawesome.com/e5272abace.js" crossorigin="anonymous"></script>

    <link href="src/css/style.css?time=<?=time()?>" rel="stylesheet" type="text/css"/>

    <script src="src/js/popup.js"></script>
</head>

<body>
    <div class="navbar">
        <h2 class="center">Cursussen</h2>
        <ul>
            <li class="center"><a href="index.php">Home</a></li>
            <li class="center"><?= isset($_SESSION["user"]) ? "<a href='logout.php'>Uitloggen</a>" : "<a href='login.php'>Inloggen</a>" ?></li>
            <?= isset($_SESSION["user"]) ? "" : "<li class='center'><a href='register.php'>Registreren</a></li>" ?>
            <?= isset($_SESSION["user"]) ? "<li class='center'><a href='account.php'><div class='pf center'><i class='far fa-user'></i></div></a></li>" : "" ?>
        </ul>
    </div>