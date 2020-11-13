<?php
    session_start();
    include "Kerdes.class.php";

    //Pont, név változó és hasznalt_kerdesek(ami a használt kérdések indexét fogja tárolni) inicializálása
    $_SESSION["nev"] = $_REQUEST["nev"];
    $_SESSION["pont"] = 0;
    $_SESSION["hasznalt_kerdesek"] = array();

    //Kérdések beolvasása csv fájlból
    $file = new SplFileObject("data/data.csv");
    $file->setFlags(SplFileObject::READ_CSV);
    $file->setCsvControl(';');
    $kerdesek = array();
    while(!$file->eof())
    {
        $row = $file->fgetcsv();
        $kerdesek[] = new Kerdes($row[0],array_slice($row,1,4),$row[count($row)-1]);

    }

    $_SESSION["kerdesek"] = $kerdesek;

?>
