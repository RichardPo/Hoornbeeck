<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <link href="src/css/style.css?time=<?=time()?>" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div class="navbar">
        <h2 class="center">Cursussen</h2>
        <ul>
            <li class="center"><a href="index.php">Home</a></li>
            <li class="center"><?= isset($_SESSION["username"]) ? "<a href='logout.php'>Uitloggen</a>" : "<a href='login.php'>Inloggen</a>" ?></li>
        </ul>
    </div>