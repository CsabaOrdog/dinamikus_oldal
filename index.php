<?php
    session_start();
    print_r($_SESSION);
    if(isset($_POST["asd"])){

    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="styles.css" />
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <title>Weboldal</title>
    </head>
    <body>
        <div class="container">
            <div class="row" id="cimsor">
                <div class="col text-center">
                    <h1 id="cim">Quiz</h1>
                </div>
            </div>
            <div id="tartalom" class="row justify-content-center">
                <form method="post" class="text-center">

                    <label for="nevField">Név:</label>
                    <input type="text" name="nameField"  id="nevField">
                    <br>
                    <input type="submit" name="asd" value="yes">

                </form>
            </div>
        </div>
    </body>
</html>
