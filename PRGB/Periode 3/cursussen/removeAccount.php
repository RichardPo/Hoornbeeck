<?php 

    include "includes/header.inc.php";

    if(!isset($_SESSION["user"]["user_id"])) {
        header("Location: index.php");
        exit();
    } else {
        $userID = $_SESSION["user"]["user_id"];
        include "includes/conn.inc.php";
        $sql = "DELETE FROM users WHERE id='$userID'";
        mysqli_query($conn, $sql);
        header("Location: logout.php");
    }

    include "includes/footer.inc.php";

?>