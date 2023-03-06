<?php

include_once "../utils/sanitize.php";


/**
 * @description: insertOne, this will allow us to insert new records to all our tables.
 * 
 * @param string $table, this is the name of the targeted table
 * @param array $payload, this is the insert body, a.k.a the table column names and their values.
 * This array should be generated from the utils/ helper functions.
 */

function insertOne(string $table, array $payload): int
{
    $table = sanitizer($table);

    $sql = "INSERT INTO $table (";

    $keys = array_keys($payload);

    foreach ($keys as $key) {
      
        if (strcmp($key, end($keys)) != 0) {
            $sql .= "$key,";
        } else {
            $sql .= "$key)";
        }
    }

    $sql .= " VALUES (";


    $values = array_values($payload);

    foreach ($values as $val) {
       
        if ($val != end($values)) {
            $sql .= "'$val',";
        } else {
            $sql .= "'$val')";
        }
    }

    $sql .= " ;";


    # exec the insert query



    $result = false;

    return $result == true ? 0 : 1;
}

