<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/insertOne.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/updateOne.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/fetchAll.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/genAssocForPlayer.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/genAssocForGrandSlam.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";

function showPlayers() {

    $res = pg_query($DB_connect, fetchAll("p16_player"));

    echo $res;

}

showPlayers();