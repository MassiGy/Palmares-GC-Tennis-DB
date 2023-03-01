<?php

include_once "../utils/sanitize.php";

function deleteOneById(string $table, int $id): int
{
    $table = sanitizer($table);

    $sql  = "DELETE FROM $table WHERE Id = $id ;";

    # we need to make this work with postgres instead
    // $result = $this->connection->query($sql);
    $result = false;

    return $result == true ? 0 : 1;
}