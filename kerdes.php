<!--
Ez a fájl jeleníti a kérdéseket tartalmazó HTML elemeket
-->
<div class="col h-80">
    <div class="row">
        <div class="col-md-2 text-center"><span id="nevMegjelenit">Név: <?= $_SESSION["nev"] ?></span></div>
        <div class="col-md-8"></div>
        <div class="col-md-2 text-center"><span id="pontMegjelenit">Pont: <?= $_SESSION["pont"] ?>/<?= count($_SESSION["hasznalt_kerdesek"])-1 ?></span></div>
    </div>
    <!--Csak 15 kérdést jelenít meg   -->
    <?php if (count($_SESSION["hasznalt_kerdesek"]) < $_SESSION["kerdesek_szama"]+1) : ?>

        <div class="row">
            <div class="col text-center h5">
                <span id="kerdes">
                    <?= $_SESSION["jelenlegi_kerdes"]->kerdes ?>
                </span>
            </div>
        </div>
        <div class="row align-items-center  mb-2">
            <?php foreach ($_SESSION["jelenlegi_kerdes"]->opciok as $opcio) : ?>
                <div class="col-md-3 text-center">

                    <label for="<?= array_search($opcio, $_SESSION["jelenlegi_kerdes"]->opciok) + 1 ?>"><?= $opcio ?></label>

                    <input type="radio" name="valasz" value=<?= array_search($opcio, $_SESSION["jelenlegi_kerdes"]->opciok) + 1 ?> id=<?= array_search($opcio, $_SESSION["jelenlegi_kerdes"]->opciok) + 1 ?>>

                </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <div class="col text-right">
                <input type="button" value="Ellenőriz" onclick="ellenorizValasz()" class="btn btn-primary">
            </div>
            <div class="col">
                <input type="button" value="Következő" onClick="kovetkezoKerdes()" class="btn btn-primary">
            </div>

        </div>
        <div class="row">
            <div class="col text-center"><span id="uzenet"></span></div>
        </div>
</div>

<?php else : ?>
    <?php
        include "database.php";

        $pdo->prepare("INSERT INTO eredmenyek (nev, pont) VALUES(?,?)")->execute([$_SESSION["nev"], $_SESSION["pont"]]);

        $stm = $pdo->query("SELECT DISTINCT pont FROM eredmenyek ORDER BY pont DESC");

        $cnt = 0;
        while ($row = $stm->fetch()) {

            if ($row["pont"] == $_SESSION["pont"]) break;
            $cnt++;
        }
    ?>
    <div class="row">
        <div class="col text-center h4 my-4">
            Gratulálok <?= $_SESSION["nev"] ?> <?= round($_SESSION["pont"] / (count($_SESSION["hasznalt_kerdesek"])-1) * 100, 2) ?>%-ra sikerült megoldani, így a <?= $cnt + 1 ?>. helyen állsz.
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <form>
                <input type="submit" value="Próbáld újra" class="btn btn-primary">
            </form>
        </div>
    </div>

<?php endif ?>
