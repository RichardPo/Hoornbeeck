<!DOCTYPE html>
<html>
    <head>
        <title>Sneeuwvrij?</title>
    </head>

    <body>

        <?php

            $meer = false;
            if($_POST) {
                $meer = $_POST["hoeveelheid"] == "meer";
            }

        ?>
    
        <h1>Sneeuwvrij?</h1>
        <p>Bij meer dan 10 cm sneeuw is de school dicht.</p>
        <form action="" method="post">
            <input type="radio" name="hoeveelheid" value="meer" <?php if($_POST && $meer) { echo "checked"; } ?>/>
            <label>Er ligt meer dan 10 cm sneeuw</label><br>
            <input type="radio" name="hoeveelheid" value="minder" <?php if($_POST && $meer == false) { echo "checked"; } ?>/>
            <label>Er ligt minder dan 10 cm sneeuw</label><br><br>
            <input type="submit" value="Bepaal"/>
        </form>

        <?php 

            if($_POST) {
                if($meer) {
                    echo "De school is dicht.";
                } else {
                    echo "De school is open.";
                }
            }

        ?>
    </body>
</html>