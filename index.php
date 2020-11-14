<?php
    // Mivel nincs több oldal, és az oldalnak a működéshez nincs szükség újratöltésre,
    // ezért minden újratöltődésnél új session jön létre
    if(isset($_SESSION)){
        session_destroy();
    }
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="styles/styles.css" />
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="scripts/script.js"></script>
        <title>Quiz</title>
    </head>
    <body>
        <div class="container ">
            <div class="row" id="cimsor">
                <div class="col text-center">
                    <h1 id="cim">Quiz</h1>
                </div>
            </div>


            <div id="tartalom" class="row justify-content-center align-items-center">
                <div class="col ">
                    <form id="urlap" autocomplete="off" >
                        <div class="row" >
                            <div class="col text-center">
                                <label for="nevField">Name:</label>
                                <input type="text" name="nevField" id="nevField">
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col text-center" >
                                <input type="button" name="start" value="Start" id="start">
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col text-center"><span id="uzenet"></span></div>
        </div>
    </body>
</html>
