<?php



/**
 * @description: fetchById, allows us to fetch a specific  record that matches the passed id, 
 * 
 * @param string $table, which is the name of the table where the query will be performed
 * @param int $id, which is the wanted record id.
 * 
 */
function fetchById(string $table, int $id): array
{
    $table = sanitizer($table);

    $sql  = "SELECT * FROM $table WHERE '$table'_Id = $id ;";

    
    $result = pg_query($DB_connect, $sql);

    return $result;
}
