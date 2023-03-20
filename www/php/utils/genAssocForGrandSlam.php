<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitize.php";

/**
 * 
 * @description genAssocForGrandSlam, this helper function will generate an associative array with 
 * the right schemma for the insertOne and updateOne procedures.
 * 
 * @param string $name, this is the name of the GrandSlam
 * @param string $location, this is the location of the GrandSlam
 * @param string $ground, this is the ground of the GrandSlam
 * @param int $creation, this is the year of the GrandSlam
 */


function genAssocForGrandSlam(string $name, string $location, string $ground, int $creation): array
{
    $res = [];

    $res["gc_name"] = sanitizer($name);
    $res["gc_location"] = sanitizer($location);
    $res["gc_ground"] = sanitizer($ground);
    $res["gc_creation"] = $creation;

    return $res;
}
