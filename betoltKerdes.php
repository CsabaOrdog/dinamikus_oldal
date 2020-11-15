<?php
    //Amennyiben az index.php fájlba importálom a fájt, ott már van
    //$_SESSSION változó, meg a Kerdes.class.php is be van importálva
    if(!isset($_SESSION)){
        include "Kerdes.class.php";
        session_start();
    }
    if (isset($_GET["tipp"])) {
        if (count($_SESSION["hasznalt_valaszok"]) < count($_SESSION["hasznalt_kerdesek"]))
            $_SESSION["hasznalt_valaszok"][] = $_GET["tipp"];
        if (count($_SESSION["hasznalt_valaszok"]) > 0) {
            if ($_SESSION["hasznalt_valaszok"][count($_SESSION["hasznalt_valaszok"]) - 1] == $_SESSION["jelenlegi_kerdes"]->valasz)
            $_SESSION["pont"]++;
        }
    }


    //Addig generál kérdéshez indexet, amíg olyat nem talál ami még nincs benne a hasznalt_kerdesek tömbben
    do {
        $kerdes_index = rand(0, count($_SESSION["kerdesek"]) - 1);
    } while (in_array($kerdes_index, $_SESSION["hasznalt_kerdesek"]));
    //Generált indexet hozzáadja a hasznalt_kerdesek tömbhöz,
    //illetve lekéri a kerdesek tömbből a jelenlegi kérdést
    $_SESSION["hasznalt_kerdesek"][] = $kerdes_index;
    $_SESSION["jelenlegi_kerdes"] = $_SESSION["kerdesek"][$kerdes_index];

    include "kerdes.php";

?>

