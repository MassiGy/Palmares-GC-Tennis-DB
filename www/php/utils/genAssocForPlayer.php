<?php

include_once "./sanitize.php";


/**
 * 
 * @description genAssocForPlayer, this helper function will generate an associative array with 
 * the right schemma for the insertOne and updateOne procedures.
 * 
 * @param string $firstName, this is the firstName of the Player
 * @param string $lastName, this is the lastName of the Player
 * @param string $gender, this is the gender of the Player
 * @param string $nationality , this is the nationality of the Player
 * @param int $rank, this is the atp rank of the Player
 */

function genAssocForPlayer(string $firstName, string $lastName, string $gender, string $nationality, int $rank): array
{
    $res = [];

    $res["player_first_name"] = sanitizer($firstName);
    $res["player_last_name"] = sanitizer($lastName);
    $res["player_gender"] = sanitizer($gender);
    $res["player_nationality"] = sanitizer($nationality);
    $res["player_atp_rank"] = $rank;
    return $res;
}
