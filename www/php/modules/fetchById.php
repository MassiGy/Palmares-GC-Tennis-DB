<?php

include_once "../utils/sanitize.php";


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

    // $result = mysqli_fetch_array($this->connection->query($sql), MYSQLI_ASSOC);
    # we need to make this work with postgresql instead
    $result = [];

    return $result;
}
