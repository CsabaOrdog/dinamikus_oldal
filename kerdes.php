<?php
    include "Kerdes.class.php";
    session_start();
    //Addig generál kérdéshez indexet, amíg olyat nem talál ami még nincs benne a hasznalt_kerdesek tömbben
    do{
        $kerdes_index = rand(0,count($_SESSION["kerdesek"])-1);

    }
    while(in_array($kerdes_index,$_SESSION["hasznalt_kerdesek"]));
    //Generált indexet hozzáadja a hasznalt_kerdesek tömbhöz,
    //illetve lekéri a kerdesek tömbből a jelenlegi kérdést
    $_SESSION["hasznalt_kerdesek"][] = $kerdes_index;
    $_SESSION["jelenlegi_kerdes"] = $_SESSION["kerdesek"][$kerdes_index];

    //Az eddig feltett kérdések száma
    $eddigi_kerdesek_szama = $_REQUEST["kerdes_szama"];

?>
<!--Csak 10 kérdést jelenít meg   -->
<?php if($eddigi_kerdesek_szama < 10):?>
<div class="row">
    <div class="col-md-2" id="nevMegjelenit">Név: <?=$_SESSION["nev"]?></div>
    <div class="col-md-8"></div>
    <div class="col-md-2" id="pontMegjelenit">Pont: <?=$_SESSION["pont"]?></div>
</div>
<div class="row">
    <div class="col">
        <?=$_SESSION["jelenlegi_kerdes"]->kerdes?>
    </div>
</div>
<div class="row">
    <?php foreach($_SESSION["jelenlegi_kerdes"]->opciok as $opcio):?>
        <div class="col-md-3">
            <label for="<?=array_search($opcio,$_SESSION["jelenlegi_kerdes"]->opciok)+1?>"><?=$opcio?> </label><input type="radio" name="valasz" value=<?=array_search($opcio,$_SESSION["jelenlegi_kerdes"]->opciok)+1?> id=<?=array_search($opcio,$_SESSION["jelenlegi_kerdes"]->opciok)+1?>>
        </div>
    <?php endforeach?>
</div>
<input type="button" value="Ellenőriz" onclick="ellenorizValasz()">
<input type="button" value="Következő" onClick="ellenoriz()">
<?php else:?>
 GRat valami I guess;

<?php endif?>


