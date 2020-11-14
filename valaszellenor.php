<?php
    include "Kerdes.class.php";
    session_start();

    $valasz_szama = $_REQUEST["valasz_szama"];
    if($valasz_szama == $_SESSION["jelenlegi_kerdes"]->valasz){
        echo"{$valasz_szama},{$valasz_szama}";
        $_SESSION["pont"] += 1;

    }else{
        echo"{$valasz_szama},{$_SESSION["jelenlegi_kerdes"]->valasz}";
    }
?>
