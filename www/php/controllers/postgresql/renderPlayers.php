
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


echo $markup;



