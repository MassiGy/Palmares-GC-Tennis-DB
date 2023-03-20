<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";


/**
 * @description: fetchAll, allows us to fetch all the records that fulfills the passed filters, 
 * by default, these are set to null.
 * 
 * @param string $table, which is the name of the table where the query will be performed
 * @param array|null $filter, defaults to null, which is an associative array that contains key-values pairs
 * of the colomns and thier values, so as it can be used as filters
 */
function fetchAll(string $table, array $filters = NULL, int $limit = 30): string
{
    $table = sanitizer($table);

    $sql  = "SELECT * FROM $table ";

    if($filters != NULL)
    {
        $sql.= " WHERE ";
        foreach ($filters as $colomn => $value) {
           
            if(strcmp($value, $filters[array_key_last($filters)]) != 0)
            {
                # if the end is not reached yet, chain with an end 

                if(!is_numeric($value))
                    $sql .= " $colomn = '$value' AND ";
                else
                    $sql .= " $colomn = $value AND ";

            }
            else 
            {   
                # otherwise, do not chain with anything.
                if(!is_numeric($value))
                    $sql .= " $colomn = '$value'";
                else
                    $sql .= " $colomn = $value ";
            }
        }
    }

    # add the limit if it was given.
    $sql .= " LIMIT $limit ";


    # add the missing semi-colomn
    $sql .= " ;";

    return $sql;
}
