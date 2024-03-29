<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/insertOne.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/genAssocForGrandSlam.php";

# if the form is triggered
if (isset($_POST["insert_submit"])) {
    
    # create the sql string
    $sql = insertOne("P16_Grand_Slam", genAssocForGrandSlam($_POST["gc_name"], $_POST["gc_location"], $_POST["gc_ground"],
     intval($_POST["gc_creation"])));

    # exec the sql
    $results = pg_query($DB_connect, $sql);

    if ($results != true) die("Something went wrong on the adding process");

    # redirect
    header("Location: /views/grandSlams.php");
}