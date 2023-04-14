<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/updateOne.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/genAssocForGrandSlam.php";

if (isset($_POST["edit_submit"])) {

    # construct our query
    $sql = updateOne(
        "P16_Grand_Slam",
        genAssocForGrandSlam(
            $_POST["gc_name"],
            $_POST["gc_location"],
            $_POST["gc_ground"],
            intval($_POST["gc_creation"])
        ),
        array("gc_id" => intval($_POST["gc_id"]))
    );

    # exec our query
    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the editing process");

    # redirect
    header("Location: /views/grandSlams.php");
}
