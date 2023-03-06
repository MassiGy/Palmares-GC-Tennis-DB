<?php
    include "../../database/postgresql.conf.php";

    $sql = "SELECT * FROM p16_grand_slam";

    $res = pg_exec($DB_connect,$sql);
    var_dump($res);
