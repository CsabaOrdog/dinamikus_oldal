<?php
    /*
    Visszatéríti a megadott és a helyes választ vesszővel elválasztva
    majd a választ hozzáadja a hasznalt_valaszok tömbhöz
    */
    include "Kerdes.class.php";
    session_start();

    $valasz_szama = $_REQUEST["valasz_szama"];

    echo"{$valasz_szama},{$_SESSION["jelenlegi_kerdes"]->valasz}";
    $_SESSION["hasznalt_valaszok"][]= $valasz_szama;
