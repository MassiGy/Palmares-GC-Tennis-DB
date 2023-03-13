<?php 



/**
 * @description: deleteByColumn, allows us to destroy all the records that have the given column set to the passed
 * value 
 * 
 * @param string $table, which is the name of the table where the query will be performed.
 * @param string $column, which is a column on the passed table.
 * @param string $value, which is the wanted value of that column.
 */

function deleteOneByColumn(string $table, string $column, string $value): int
{
    $table = sanitizer($table);

    $sql  = "DELETE FROM $table WHERE $column = '$value' ;";

    # we need to make this work with prostges instead
    // $result = connection->query($sql);
    $result = false;
    
    return $result == true ? 0 : 1;
}