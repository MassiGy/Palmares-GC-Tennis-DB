<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/deleteOneById.php";

if (isset($_POST["delete_submit"])) {

    # construct the sql for the cascade deletion
    $sql = "DELETE FROM p16_participate WHERE gc_id = " . sanitizer($_POST["gc_id"]) . ";";

    # exec the deletion sql
    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the delete process");

    # contruct the query for the targgeted record deletion
    $sql = deleteOneById("P16_Grand_Slam", "gc_id", $_POST["gc_id"]);

    # exec our query
    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the delete process");

    # redirect
    header("Location: /views/grandSlams.php");
}
