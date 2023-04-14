<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/deleteOneById.php";

if (isset($_POST["delete_submit"])) {

    $sql = "DELETE FROM p16_participate WHERE player_id = " . sanitizer($_POST["player_id"]) . ";";

    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the delete process");

    $sql = deleteOneById("P16_Player", "player_id", $_POST["player_id"]);

    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the delete process");

    header("Location: /views/players.php");
}

