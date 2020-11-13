<?php
    session_start();
    $kerdes_szama = $_REQUEST["kerdes_szama"];
    $kerdes = array("Mennyi 2+2?","1","2","3","4");
    if($kerdes_szama < 10){
        echo"
        <div class='row'>
            <div class='col'>
            {$kerdes[0]}
            </div>
        </div>
        <div class='row' >
            <div class='col-md-3'>
            {$kerdes[1]}<input type='radio' name='valasz' value='{$kerdes[1]}'>
            </div>
            <div class='col-md-3'>
            {$kerdes[2]}<input type='radio' name='valasz' value='{{$kerdes[2]}}'>
            </div>
            <div class='col-md-3'>
            {$kerdes[3]}<input type='radio' name='valasz' value='{{$kerdes[3]}}'>
            </div>
            <div class='col-md-3'>
            {$kerdes[4]}<input type='radio' name='valasz' value='{{$kerdes[4]}}'>
            </div>
        </div>
        <input type='button' value='Következő' onClick='check()'>
        ";
    }
    else{
        echo "Grat";
    }
?>
