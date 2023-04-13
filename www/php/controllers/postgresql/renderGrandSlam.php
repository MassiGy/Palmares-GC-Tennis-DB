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
        <td>
            <form method="post">
                <input name="gc_id" hidden value="' . $res["gc_id"] . '" type="text"/>
                <input name="gc_name" hidden value="' . $res["gc_name"] . '" type="text"/>
                <input name="gc_location" hidden value="' . $res["gc_location"] . '" type="text"/>
                <input name="gc_ground" hidden value="' . $res["gc_ground"] . '" type="text"/>
                <a href="/views/editGrandSlam.php" class="btn btn-warning mx-3">Edit</a>
            </form>
        </td>
        <td>
            <form action="/controllers/postgresql/deleteGrandSlam.php" method="post">
                <input name="gc_id" hidden value="' . $res["gc_id"] . '" type="text"/>
                <button name="delete_submit" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    ';

}


echo $markup;
