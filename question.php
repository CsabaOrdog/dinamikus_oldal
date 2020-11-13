<?php
    include "kerdes.class.php";
    session_start();
    do{
        $kerdes_index = rand(0,count($_SESSION["kerdesek"])-1);
    }
    while(in_array($_SESSION["kerdesek"][$kerdes_index],$_SESSION["hasznalt_kerdesek"]));

    $jelenlegi_kerdes = $_SESSION["hasznalt_kerdesek"][] = $_SESSION["kerdesek"][$kerdes_index];
    $eddigi_kerdesek_szama = $_REQUEST["kerdes_szama"];


?>
<?php if($eddigi_kerdesek_szama < 10):?>
<div class='row'>
    <div class='col'>
    <?=$jelenlegi_kerdes->kerdes?>
    </div>
</div>
<div class='row' >
    <?php foreach($jelenlegi_kerdes->opciok as $opcio):?>
        <div class='col-md-3'>
            <label for="<?=array_search($opcio,$jelenlegi_kerdes->opciok)?>"><?=$opcio?> <label><input type='radio' name='valasz' value=<?=$opcio?> id=<?=array_search($opcio,$jelenlegi_kerdes->opciok)?>>
        </div>
    <?php endforeach?>
</div>
<input type='button' value='Következő' onClick='check()'>
<?php else:?>
 GRat valami I guess;

<?php endif?>


