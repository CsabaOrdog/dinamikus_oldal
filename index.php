<?php

    include "Kerdes.class.php";
    session_start();
    //$in_seesion változó tárolja, hogy van-e már megkezdett session
    $in_session = false;


    if (isset($_SESSION["hasznalt_kerdesek"])) {
        //Ha a használt_kerdesek tömb száma túllépi a kerdesek_szama értékét, akkor
        //befejeződött az eddigi session, és törli a korábbi session változóit
        if (count($_SESSION["hasznalt_kerdesek"]) > $_SESSION["kerdesek_szama"])
            session_unset();
        else {
            //Ha még nem volt elegendő a kérdések száma, akkor még marad a korábbi session
            $in_session = true;
        }
    }
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
        <!--Címsor-->
        <div class="row align-items-end" id="cimsor">
            <div class="col text-center ">
                <h1 id="cim">Kvíz</h1>
            </div>
        </div>
        <!--Tartalom -->
        <div id="tartalom" class="row justify-content-center">
            <!--Ha úgy töltődött újra az oldal, hogy még nem volt megválaszolva az összes kérdés
                akkor az aktuális kérdést jeleníti meg.-->
            <?php if ($in_session) : ?>
                <?php
                    //Ha már meghívódott a valaszellenor.php, akkor ne lehessen újra ugyanarra a
                    //kérdésre válaszolni, így egy új kérdést kér a betoltKerdes.php-tól
                    if(count($_SESSION["hasznalt_kerdesek"]) == count($_SESSION["hasznalt_valaszok"]))
                        require "betoltKerdes.php";

                    //Ha még nem válaszolt a kérdésre, akkor a kerdes.php segítségével betölti
                    //az előző kérdést
                    else{
                        require "kerdes.php";
                    }
                ?>
            <?php else : ?>
                <!--Ha még nem kezdődött session, akkor a kezdőlapot jeleníti meg-->
                <div class="col">

                    <div class="row text-center mb-2">
                        <div class="col">
                            Név megadása után a Start gombra rányomva 15 kvízkérdést kell megválaszolni.
                            <br>
                            Rangsor gombra kattintva megtekinthető az eddigi játékokból álló rangsor.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <label for="nevField">Név:</label>

                            <input type="text" id="nevField" autocomplete="off">
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
            <?php endif ?>
        </div>
    </div>
</body>

</html>
