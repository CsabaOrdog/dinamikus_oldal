<?php
include "database.php";
$stm = $pdo->query("SELECT nev, pont FROM eredmenyek ORDER BY pont DESC");
$tableStr = "";
$cnt = 0;
$rows = $stm->fetchall();
//why
$previous = -1;

foreach ($rows as $row) {


    if ($row[1] != $previous)
        $cnt++;
    $tableStr .= "<tr><td>{$cnt}.</td><td>{$row[0]}</td><td>{$row[1]}</td></tr>";
    $previous = $row[1];
}


?>
<?php if (count($rows) > 0) : ?>
    <div class="col h-80 w-50 text-center">

        <table style="margin: 0px auto;">
            <thead>
                <th>Helyezés</th>
                <th>Név</th>
                <th>Pont</th>
            </thead>
            <tbody>
                <?= $tableStr ?>
            </tbody>
        </table>

    <?php else : ?>
        <div class="col h-80 w-50 text-center">
            <h1>Még nincsenek eredmények</h1>

        <?php endif ?>
            <form>
                <input type="submit" value="Vissza" class="btn btn-primary mt-2">
            </form>
        </div>
