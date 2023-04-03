<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/fetchAll.php";


$sql = fetchAll("p16_grand_slam");


$results = pg_query($DB_connect, $sql);


$markup = "";

while ($res = pg_fetch_assoc($results)) {



    $markup .= '
    <tr>
        <td>' . $res["gc_name"]  . '</td>
        <td>' . $res["gc_location"]  . '</td>
        <td>' .  $res["gc_ground"] .  '</td>
        <td><a href="" class="btn btn-warning mx-3">Edit</a></td>
        <td>
                <form action="/controllers/postgresql/deleteGrandSlam.php" method="post">
                    <input name ="gc_id" hidden value="' . $res["gc_id"] . '" type="text"/>
                    <button name="delete_submit" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
    </tr>
    ';

}


echo $markup;
