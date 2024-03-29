<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/fetchAll.php";

# get the row limit count
$rows_to_render_count = intval($_GET["limit"] == "" ? 5 : $_GET["limit"]);

# construct the query string
$sql = fetchAll("p16_player", NULL, $rows_to_render_count);

# exec the query
$results = pg_query($DB_connect, $sql);


$markup = "";

# set the image faces images dir and the coutry images dir
$players_images_dir = $_SERVER["DOCUMENT_ROOT"]. "/assets/images/tennis_players/";
$players_countries_dir = $_SERVER["DOCUMENT_ROOT"]. "/assets/images/country_flags/";

# get the filenames of the available files.
$players_face_images_names = scandir($players_images_dir);
$players_countries_images_names = scandir($players_countries_dir);
$face_image_filename;
$country_image_filename;


while ($res = pg_fetch_assoc($results)) {
    
    $face_image_found = false;
    $country_image_found = false;

    # suppose that the filename are equal to the concatination of the record info.
    $face_image_filename = strtolower($res["player_first_name"] . $res["player_last_name"]) . '.jpg';
    $country_image_filename = strtolower($res["player_nationality"]) . '.png';
   
    # see if the prepared filename is on the dir
    foreach ($players_face_images_names as $filename) {

        if (strcmp($filename, $face_image_filename) == 0) {
            $face_image_found = true;
            break;
        }
    }
    # otherwise, make it generic
    if (!$face_image_found)
    {
        $face_image_filename = "Default_player.png";
    }

    # see if the prepared filename is on the dir
    foreach ($players_countries_images_names as $filename) {

        if (strcmp($filename, $country_image_filename) == 0) {
            $country_image_found = true;
            break;
        }
    }

    # otherwise, make it generic
    if (!$country_image_found)
    {
        $country_image_filename = "default_flag.png";
    }

    
    # append the row info the constructed markup
    $markup .= '
        <tr>
            <td style="vertical-align: middle;"  ><img src="/assets/images/tennis_players/' .$face_image_filename . '" alt="images" height=35 width=45 class="img-thumbnail"/></td>
            <td style="vertical-align: middle;"  >' . $res["player_first_name"]  . '</td>
            <td style="vertical-align: middle;"  >' . $res["player_last_name"]  . '</td>
            <td style="vertical-align: middle;"  >' . $res["player_gender"] .  '</td>
            <td style="vertical-align: middle;"  >
            <img src="/assets/images/country_flags/' .$country_image_filename . '" alt="images" height=35 width=45 class="img-thumbnail"/>
            ' . $res["player_nationality"] . '</td>
            
            <td>
                <form action="/views/editPlayer.php" method="post">
                    <input hidden type="text"  name="player_first_name" value="'. $res["player_first_name"] .'" id="">
                    <input hidden type="text" name="player_last_name" value="'. $res["player_last_name"] .'" id="">
                    <input hidden type="text" name="player_gender" value="'. $res["player_gender"] .'" id="">
                    <input hidden type="text" name="player_nationality" value="'. $res["player_nationality"] .'" id="">
                    <input hidden type="text" name="player_id" value="'. $res["player_id"] .'" id="">
                    <input hidden type="text" name="player_atp_rank" value="'. $res["player_atp_rank"] .'" id="">
                    <button type="submit" name="edit_submit" class="btn btn-warning"> Edit </button>
                </form>
            <td>
                <form action="/controllers/postgresql/deletePlayers.php" method="post">
                    <input name ="player_id" hidden value="' . $res["player_id"] . '" type="text"/>
                    <button name="delete_submit" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
         </tr>
    ';

}

# echo the constructed markup
echo $markup;



