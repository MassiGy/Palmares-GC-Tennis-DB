<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/updateOne.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/genAssocForPlayer.php";

if (isset($_POST["edit_submit"])) {

    # construct the query
    $sql = updateOne(
        "P16_Player",
        genAssocForPlayer(
            $_POST["player_first_name"],
            $_POST["player_last_name"],
            $_POST["player_gender"],
            $_POST["player_nationality"],
            intval($_POST["player_atp_rank"])
        ),
        array("player_id" => intval($_POST["player_id"]))
    );

    # exec our query
    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the editing process");

    # redirect
    header("Location: /views/players.php");
}
