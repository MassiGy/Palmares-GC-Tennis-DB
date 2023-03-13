<?php


/**
 * @description: fetchAll, allows us to fetch all the records that fulfills the passed filters, 
 * by default, these are set to null.
 * 
 * @param string $table, which is the name of the table where the query will be performed
 * @param array|null $filter, defaults to null, which is an associative array that contains key-values pairs
 * of the colomns and thier values, so as it can be used as filters
 */
function fetchAll(string $table, array $filters = NULL): array
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
                $sql .= " " . strval($colomn) . " = " . strval($value) . " AND " ;
            }
            else 
            {   
                # otherwise, do not chain with anything.
                $sql .= " " . strval($colomn) . " = " . strval($value) ;
            }
        }
    }

    # add the missing semi-colomn
    $sql .= " ;";



    // $result = mysqli_fetch_all($this->connection->query($sql), MYSQLI_ASSOC);
    // $result = pg_query($sql);
    $result = []; # need to change this when we implement the postgresql integration

    return $result;
}
