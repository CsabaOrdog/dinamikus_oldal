<?php
    session_start();
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
        <script src="script.js"></script>
        <title>Quiz</title>
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
                    <input type="text" name="nevField" id="nevField">
                    <br>
                    <input type="button" name="start" value="Start" id="start">

                </form>

            </div>
        </div>
    </body>
</html>
