<?php

include_once "../utils/sanitize.php";

function fetchById(string $table, int $id): array
{
    $table = sanitizer($table);

    $sql  = "SELECT * FROM $table WHERE '$table'_Id = $id ;";

    // $result = mysqli_fetch_array($this->connection->query($sql), MYSQLI_ASSOC);
    # we need to make this work with postgresql instead
    $result = [];

    return $result;
}
