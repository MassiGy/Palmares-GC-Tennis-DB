<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/insertOne.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/genAssocForPlayer.php";

# if the form is triggered
if (isset($_POST["insert_submit"])) {
    
    # construct the sql string
    $sql = insertOne("P16_Player", genAssocForPlayer($_POST["player_first_name"], $_POST["player_last_name"], $_POST["player_gender"],
     $_POST["player_nationality"], intval($_POST["player_atp_rank"])));

    # exec the query
    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the adding process");

    # redirect
    header("Location: /views/players.php");
}
