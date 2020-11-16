<?php
    //Adatbázishoz való kapcsolódás PDO-val
    $database = "mysql:host=localhost;dbname=quiz";
    $user = "root";
    $password = "";
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try
    {
        $pdo = new PDO($database, $user, $password, $options);
    }
    catch (PDOException $e)
    {
        echo "Adatbázishoz való csatlakozás sikertelen.";
        exit;
    }

