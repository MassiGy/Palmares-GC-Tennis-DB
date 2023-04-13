<?php


include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";


/**
 * @description: deleteOneById, allows us to destroy a specific  record that matches the passed id, 
 * 
 * @param string $table, which is the name of the table where the query will be performed
 * @param int $id, which is the wanted record id.
 * 
 */

function deleteOneById(string $table, string $column, int $id): string
{
    $table = sanitizer($table);

    $sql  = "DELETE FROM $table WHERE $column = $id ;";

    return $sql;
}
