<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

/**
 * Search planet by name
 * @param $name name of planet
 * @param $page number of current page to show
 * @return array of planet
 */
function search($name, $page = 1)
{
    global $database;

    $limit = PAGINATION_MAX_PER_PAGE;
    $offset = $limit * ($page - 1);

    if (!empty($name)) {
        $results = $database->select("SELECT 
                                        id, name, region, sector, system, inhabitant, city
                                     FROM 
                                        planets
                                     WHERE 
                                        name LIKE \"%$name%\"
                                     LIMIT $limit offset $offset");
        return $results;
    } else {
        return array();
    } 
}

/**
 * List all planets
 * @param $page number of current page to show
 * @return array of all planets indicated by current $page
 */
function index($page = 1)
{
    global $database;

    $limit = PAGINATION_MAX_PER_PAGE;
    $offset = $limit * ($page - 1);

    $results = $database->select("SELECT 
                                    id, name, region, sector, system, inhabitant, city
                                  FROM 
                                    planets
                                  LIMIT $limit offset $offset");
    
    return $results;
}

/**
 * Save a new planet
 */
function save($name, $region, $sector, $system, $inhabitant, $city) {
    global $database;

    $result = $database->exec("INSERT INTO 
                                planets (name, region, sector, system, inhabitant, city) 
                                VALUES(\"$name\", \"$region\", \"$sector\", \"$system\", \"$inhabitant\", \"$city\")");

    return $result;
}

/**
 * Get planet detail
 * @param $id
 */
function getPlanet($id)
{
    global $database;

    $result = $database->select("SELECT 
                                    id, name, region, sector, system, inhabitant, city
                                 FROM 
                                    planets
                                 WHERE 
                                    id = $id");
    return $result;
}

/**
 * Update an existing planet
 */
function updatePlanet($id, $name, $region, $sector, $system, $inhabitant, $city) {
    global $database;
    $result = $database->exec("UPDATE 
                                    planets
                               SET 
                                    name = \"$name\",
                                    region = \"$region\",
                                    sector = \"$sector\",
                                    system = \"$system\",
                                    inhabitant = \"$inhabitant\",
                                    city = \"$city\"
                               WHERE
                                    id = $id");
    return $result;
}

/**
 * Start main script
 */
$action = get("action");

switch ($action) {
    case "add":
        include "views/planet/add.php";
        break;
    case "update":
        $id = get("planetId");
        $results = getPlanet($id);
        $planet = $results[0];
        include "views/planet/update.php";
        break;
    case "savePlanet":
        $name       = get("name");
        $region     = get("region");
        $sector     = get("sector");
        $system     = get("system");
        $inhabitant = get("inhabitatn");
        $city       = get("city");

        $result = save($name, $region, $sector, $system, $inhabitant, $city);

        if ($result) {
            $global_alert_status = "info";
            $global_message = "Planet is successfully added.";
        } else {
            $global_alert_status = "danger";
            $global_message = "Failed to add planet.";
        }
        redirect("/");
        break;
    case "updatePlanet":
        $id         = get("id");
        $name       = get("name");
        $region     = get("region");
        $sector     = get("sector");
        $system     = get("system");
        $inhabitant = get("inhabitant");
        $city       = get("city");

        $result = updatePlanet($id, $name, $region, $sector, $system, $inhabitant, $city);

        if ($result) {
            $global_alert_status = "info";
            $global_message = "Planet is successfully updated.";
        } else {
            $global_alert_status = "danger";
            $global_message = "Failed to update planet.";
        }
        redirect("/");
        break;
    case "search":
        $name = get("name");
        $page = intval(get("pageno"));
        $results = search($name, $page);
        $previous = $page > 1 ? $page - 1 : 1;
        $next     = $page > 0 ? $page + 1 : 2;
        include "views/planet/search.php";
        break;
    case "index":
        $page     = intval(get("pageno"));
        $results  = index($page);
        $previous = $page > 1 ? $page - 1 : 1;
        $next     = $page > 0 ? $page + 1 : 2;
        include "views/planet/search.php";
        break;
}