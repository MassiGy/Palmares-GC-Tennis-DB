<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";


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

            if (strcmp($value, $payload[array_key_last($payload)]) != 0) {

                if (!is_numeric($value))
                    $sql .= " $key='$value', ";
                else
                    $sql .= " $key=$value, ";
            } else {

                if (!is_numeric($value))
                    $sql .= " $key='$value' ";
                else
                    $sql .= " $key=$value ";
            }
        }
    }

    # add the filters;
    $sql .= " WHERE ";
    foreach ($filters as $colomn => $value) {

        if (strcmp($value, $filters[array_key_last($filters)]) != 0) {
            # if the end is not reached yet, chain with an end 
            if (!is_numeric($value))
                $sql .= " $colomn = '$value' AND ";
            else
                $sql .= " $colomn = $value AND ";


        } else {
            # otherwise, do not chain with anything.
            if (!is_numeric($value))
                $sql .= " $colomn = '$value' ";
            else
                $sql .= " $colomn = $value ";

        }
    }

    # add the missing semi-colomn
    $sql .= " ;";

    echo $sql;




    # exec the update query
    $result = false;
    return $result == true ? 0 : 1;
}
