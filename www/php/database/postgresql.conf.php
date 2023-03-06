<?php
    include "../env.php";

    $strConnection = "host=" . strval($_ENV["DB_HOST"]) . " dbname=" . strval($_ENV["DB_NAME"]) . " user=" . strval($_ENV["DB_USER"] . " password=" . strval($_ENV["DB_PASSWORD"]));
    var_dump($strConnection);
    $DB_connect = pg_connect($strConnection);