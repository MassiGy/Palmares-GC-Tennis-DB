<?php 
include_once "../utils/sanitize.php";

function deleteOneByColomn(string $table, string $column, string $value): int
{
    $table = sanitizer($table);

    $sql  = "DELETE FROM $table WHERE $column = '$value' ;";

    # we need to make this work with prostges instead
    // $result = connection->query($sql);
    $result = false;
    
    return $result == true ? 0 : 1;
}