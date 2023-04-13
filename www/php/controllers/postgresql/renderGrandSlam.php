<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/fetchAll.php";


$sql = fetchAll("p16_grand_slam");


$results = pg_query($DB_connect, $sql);


$markup = "";

$grand_slams_images_dir = $_SERVER["DOCUMENT_ROOT"] . "/assets/images/grand_slams/";

$grand_slams_images_filenames = scandir($grand_slams_images_dir);
$grand_slam_filename;

while ($res = pg_fetch_assoc($results)) {

    $grand_slam_image_found = false;

    $grand_slam_filename = strtolower(str_replace(" ", "", $res["gc_name"])) . '.png';


    foreach ($grand_slams_images_filenames as $filename) {

        if (strcmp($filename, $grand_slam_filename) == 0) {
            $grand_slam_image_found = true;
            break;
        }
    }

    if (!$grand_slam_image_found) {
        $grand_slam_filename = "default_image.png";
    }


    $markup .= '
    <tr>
        <td style="vertical-align: middle;"><img src="/assets/images/grand_slams/' .$grand_slam_filename . '" alt="images" height=35 width=45 class="img-thumbnail"/></td>
        <td style="vertical-align: middle;">' . $res["gc_name"]  . '</td>
        <td style="vertical-align: middle;">' . $res["gc_location"]  . '</td>
        <td style="vertical-align: middle;">' .  $res["gc_ground"] .  '</td>
        <td>
            <form action="/views/editGrandSlam.php" method="post">
                <input name="gc_id" hidden value="' . $res["gc_id"] . '" type="text"/>
                <input name="gc_name" hidden value="' . $res["gc_name"] . '" type="text"/>
                <input name="gc_location" hidden value="' . $res["gc_location"] . '" type="text"/>
                <input name="gc_ground" hidden value="' . $res["gc_ground"] . '" type="text"/>
                <input name="gc_creation" hidden value="' . $res["gc_creation"] . '" type="text"/>
                <button class="btn btn-warning mx-3">Edit</button>
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
