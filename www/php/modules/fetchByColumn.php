<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";


/**
 * @description: fetchByColumn, allows us to fetch all the records that have the given colomn set to the passed
 * value 
 * 
 * @param string $table, which is the name of the table where the query will be performed.
 * @param string $column, which is a column on the passed table.
 * @param string $value, which is the wanted value of that column.
 */

function fetchByColumn(string $table, string $column, string $value): string
{
    $table = sanitizer($table);
    $column = sanitizer($column);
    $value = sanitizer($value);

    $sql  = "SELECT * FROM $table WHERE $column = '$value' ;";

    return $sql;
}
