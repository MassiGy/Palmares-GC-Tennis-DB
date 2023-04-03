<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/deleteOneById.php";

if (isset($_POST["delete_submit"])) {
    $sql = "DELETE FROM p16_participate WHERE gc_id = " . $_POST["gc_id"] . ";";

    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the delete process");

    $sql = deleteOneById("P16_Grand_Slam", "gc_id", $_POST["gc_id"]);

    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the delete process");

    header("Location: /views/grandSlams.php");
}