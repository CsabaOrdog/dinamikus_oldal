<?php
//Az eddigi eredményeket lekéri az adatbázisból, majd megjeleníti egy táblázatban
include "database.php";
$stm = $pdo->query("SELECT nev, pont FROM eredmenyek ORDER BY pont DESC");
$tableStr = "";
$cnt = 0;
$rows = $stm->fetchall();
$previous = -1;

foreach ($rows as $row) {
    if ($row[1] != $previous) {
        $cnt++;
    }
    $tableStr .= "<tr><td>{$cnt}.</td><td>{$row[0]}</td><td>{$row[1]}</td></tr>";
    $previous = $row[1];
}

?>
<?php if (count($rows) > 0) : ?>

    <div class="col text-center">

        <table class="table">
            <thead>
                <th>Helyezés</th>
                <th>Név</th>
                <th>Pont</th>
            </thead>
            <tbody>
                <?= $tableStr ?>
            </tbody>
        </table>
        <form>
            <input type="submit" value="Vissza" class="btn btn-primary my-2">
        </form>
    </div>

<?php else : ?>
    <div class="col text-center">
        <h2>Még nincsenek eredmények</h2>
        <form>
            <input type="submit" value="Vissza" class="btn btn-primary my-2">
        </form>
    </div>

<?php endif ?>
