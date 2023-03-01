<?php

include_once "../utils/sanitize.php";

function fetchByColomn(string $table, string $column, string $value): array
{
    $table = sanitizer($table);
    $column = sanitizer($column);
    $value = sanitizer($value);

    $sql  = "SELECT * FROM $table WHERE $column = '$value' ;";

    # we need to make this work with postgresql instead.
    // $result = mysqli_fetch_all($this->connection->query($sql), MYSQLI_ASSOC);

    $result = [];

    return $result;
}
