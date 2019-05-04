<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

/**
 * get planets that have been destructed.
 */
function getPlanetDestruction($page)
{
    global $database;

    $limit = PAGINATION_MAX_PER_PAGE;
    $offset = $limit * ($page - 1);
    $results = $database->select("SELECT 
                                    destruction.id as id,
                                    name,
                                    date,
                                    status,
                                    description
                                  FROM 
                                    planets,
                                    destruction
                                  WHERE
                                    planets.id = destruction.planet_id
                                  LIMIT $limit OFFSET $offset");

    return $results;
}

/**
 * Main script
 */
$global_menu = "home";
$page     = intval(get("pageno"));
$previous = $page > 1 ? $page - 1 : 1;
$next     = $page > 0 ? $page + 1 : 2;
$results  = getPlanetDestruction($page);
include "views/home.php";