<?php
include_once "../utils/sanitize.php";


function fetchAll(string $table, array $filters = NULL): array
{
    $table = sanitizer($table);

    $sql  = "SELECT * FROM $table ";

    if($filters != NULL)
    {
        $sql.= " WHERE ";
        foreach ($filters as $colomn => $value) {
            
            if(strcmp($value, end($filters)[strval($colomn)]) != 0)
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
