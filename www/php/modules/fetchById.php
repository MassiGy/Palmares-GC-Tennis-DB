<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";

/**
 * @description: fetchById, allows us to fetch a specific  record that matches the passed id, 
 * 
 * @param string $table, which is the name of the table where the query will be performed
 * @param int $id, which is the wanted record id.
 * 
 */
function fetchById(string $table, int $id): string
{
    $table = sanitizer($table);

    $sql  = "SELECT * FROM $table WHERE '$table'_Id = $id ;";

    return $sql;
}
