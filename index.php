<?php
    // Mivel nincs több oldal, és az oldalnak a működéshez nincs szükség újratöltésre,
    // ezért minden újratöltődésnél új session jön létre
    if (isset($_SESSION)) {
        session_destroy();
    }
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="./resources/favicon.png">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="styles/styles.css" />
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="scripts/script.js"></script>
        <title>Kvíz</title>
    </head>

    <body>
        <div class="container">
            <div class="row align-items-end" id="cimsor">
                <div class="col text-center ">
                    <h1 id="cim">Kvíz</h1>
                </div>
            </div>
            <div id="tartalom" class="row justify-content-center">
                <div class="col">
                    <div class="row text-center mb-2">
                        <div class="col" style="font-size: 22px">
                            Név megadása után a Start gombra rányomva 15 kvízkérdést kell megválaszolni.
                            <br>
                            Rangsor gombra kattintva megtekinthető az eddigi játékokból álló rangsor
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col text-center">

                            <label for="nevField">Név:</label>


                            <input type="text" name="nevField" id="nevField" autocomplete="off">
                        </div>

                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="col text-right">
                            <input type="button" value="Start" id="start" class="btn btn-primary">
                        </div>
                        <div class="col">
                            <input type="button" value="Rangsor" id="rangsor" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center"><span id="uzenet"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
