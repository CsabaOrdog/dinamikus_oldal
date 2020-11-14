<?php
    include "Kerdes.class.php";
    session_start();
    if(isset($_GET["tipp"]) && $_GET["tipp"] == $_SESSION["jelenlegi_kerdes"]->valasz)
        $_SESSION["pont"]++;

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
<div class="row " style="height:5rem">
    <div class="col-md-2 text-center" id="nevMegjelenit">Name: <?=$_SESSION["nev"]?></div>
    <div class="col-md-8"></div>
    <div class="col-md-2 text-center" id="pontMegjelenit">Point: <?=$_SESSION["pont"]?></div>
</div>
<div class="row" id="kerdes"style="height:5rem">
    <div class="col text-center">
        <?=$_SESSION["jelenlegi_kerdes"]->kerdes?>
    </div>
</div>
<div class="row align-items-center" style="height:5rem">
    <?php foreach($_SESSION["jelenlegi_kerdes"]->opciok as $opcio):?>
        <div class="col-md-3 text-center">
            <label for="<?=array_search($opcio,$_SESSION["jelenlegi_kerdes"]->opciok)+1?>"><?=$opcio?></label> <input type="radio" name="valasz" value=<?=array_search($opcio,$_SESSION["jelenlegi_kerdes"]->opciok)+1?> id=<?=array_search($opcio,$_SESSION["jelenlegi_kerdes"]->opciok)+1?>>
        </div>
    <?php endforeach?>
</div>
<div class="row" style="height:5rem">
        <div class="col text-right"><input type="button" value="Check" onclick="ellenorizValasz()">
</div>
        <div class="col"><input type="button" value="Next" onClick="kovetkezoKerdes()"></div>
</div>


<?php else:?>
 GRat valami I guess;

<?php endif?>


