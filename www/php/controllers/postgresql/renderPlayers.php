<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/database/postgresql.conf.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/fetchAll.php";


$sql = fetchAll("p16_player", NULL, 1500);


$results = pg_query($DB_connect, $sql);


$markup = "";
$players_images_dir = $_SERVER["DOCUMENT_ROOT"]. "/assets/images/tennis_players/";

$players_images_names = scandir($players_images_dir);
$image_filename;

while ($res = pg_fetch_assoc($results)) {
    
    $found = false;

    $image_filename = strtolower($res["player_first_name"] . $res["player_last_name"]) . '.jpg';
   
    
    foreach ($players_images_names as $filename) {

        if (strcmp($filename, $image_filename) == 0) {
            $found = true;
            break;
        }
    }
    
    if (!$found)
    {
        $image_filename = "Default_player.png";
    }

    $markup .= '
        <tr>
            <td><img src="/assets/images/tennis_players/' .$image_filename . '" alt="images" height=40 width=50 class="img-thumbnail"/></td>
            <td>' . $res["player_first_name"]  . '</td>
            <td>' . $res["player_last_name"]  . '</td>
            <td>' . $res["player_gender"] .  '</td>
            <td>' . $res["player_nationality"] . '</td>
            <td> <a href="" class="btn btn-warning mx-3">Edit</a>
            <td>
                <form action="/controllers/postgresql/deletePlayers.php" method="post">
                    <input name ="player_id" hidden value="' . $res["player_id"] . '" type="text"/>
                    <button name="delete_submit" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
         </tr>
    ';

}


echo $markup;
