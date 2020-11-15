<?php
    //Adatbázishoz való kapcsolódás PDO-val
    $database = "mysql:host=localhost;dbname=quiz";
    $user = "root";
    $password = "";
    $pdo = new PDO($database, $user, $password);
