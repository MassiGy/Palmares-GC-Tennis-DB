<?php

include_once "../utils/sanitize.php";


/**
 * @description: updateOne, this will allow us to update a record of any of our tables.
 * 
 * @param string $table, this is the name of the targeted table
 * @param array $payload, this is the update body, a.k.a the table column names and their values, that must be 
 * under the `SET` clause in SQL. 
 * @param array $filters, this is the filters, a.k.a the table column names and their values that must be under the 
 * `WHERE` clause in SQL.
 * 
 */

function updateOne(string $table, array $payload, array $filters): int
{
    $table = sanitizer($table);

    $sql = "UPDATE $table SET ";

    # add the new values 
    foreach ($payload as $key => $value) {
     
        if (!empty($value)) {

            if (strcmp(strval($value), end($payload)[strval($key)]) != 0) {
                $sql .= "$key='$value', ";
            } else {
                $sql .= "$key='$value' ";
            }
        }
  
    }

    # add the filters;
    $sql .= " WHERE ";
    foreach ($filters as $colomn => $value) {

        if (strcmp($value, end($filters)[strval($colomn)]) != 0) {
            # if the end is not reached yet, chain with an end 
            $sql .= " " . strval($colomn) . " = " . strval($value) . " AND ";
        } else {
            # otherwise, do not chain with anything.
            $sql .= " " . strval($colomn) . " = " . strval($value);
        }
    }

    # add the missing semi-colomn
    $sql .= " ;";





    # exec the update query
    $result = false;
    return $result == true ? 0 : 1;
}
