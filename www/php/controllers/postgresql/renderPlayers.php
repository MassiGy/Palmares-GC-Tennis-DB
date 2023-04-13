<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/fetchAll.php";


$sql = fetchAll("p16_player", NULL, 50);


$results = pg_query($DB_connect, $sql);


$markup = "";
$players_images_dir = $_SERVER["DOCUMENT_ROOT"]. "/assets/images/tennis_players/";
$players_countries_dir = $_SERVER["DOCUMENT_ROOT"]. "/assets/images/country_flags/";

$players_face_images_names = scandir($players_images_dir);
$players_countries_images_names = scandir($players_countries_dir);
$face_image_filename;
$country_image_filename;


while ($res = pg_fetch_assoc($results)) {
    
    $face_image_found = false;
    $country_image_found = false;

    $face_image_filename = strtolower($res["player_first_name"] . $res["player_last_name"]) . '.jpg';
    $country_image_filename = strtolower($res["player_nationality"]) . '.png';
   
    
    foreach ($players_face_images_names as $filename) {

        if (strcmp($filename, $face_image_filename) == 0) {
            $face_image_found = true;
            break;
        }
    }

    if (!$face_image_found)
    {
        $face_image_filename = "Default_player.png";
    }

    foreach ($players_countries_images_names as $filename) {

        if (strcmp($filename, $country_image_filename) == 0) {
            $country_image_found = true;
            break;
        }
    }

    if (!$country_image_found)
    {
        $country_image_filename = "default_flag.png";
    }

    

    $markup .= '
        <tr>
            <td style="vertical-align: middle;"  ><img src="/assets/images/tennis_players/' .$face_image_filename . '" alt="images" height=35 width=45 class="img-thumbnail"/></td>
            <td style="vertical-align: middle;"  >' . $res["player_first_name"]  . '</td>
            <td style="vertical-align: middle;"  >' . $res["player_last_name"]  . '</td>
            <td style="vertical-align: middle;"  >' . $res["player_gender"] .  '</td>
            <td style="vertical-align: middle;"  >
            <img src="/assets/images/country_flags/' .$country_image_filename . '" alt="images" height=35 width=45 class="img-thumbnail"/>
            ' . $res["player_nationality"] . '</td>
            
            <td><a href="" class="btn btn-warning mx-3">Edit</a></td>
            <td> <a href="" class="btn btn-danger">Delete</a></td>
         </tr>
    ';

}


echo $markup;
