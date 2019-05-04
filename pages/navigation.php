<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

/**
 * Get planet if it was already set or destructed.
 */
function getPlanetNavigation($planet_id)
{
    global $database;

    $results = $database->select("SELECT 
                                  d.id as destruction_id,
                                  d.status as status,
                                  d.description as description,
                                  p.id as id,
                                  p.name as name,
                                  p.region as region,
                                  p.sector as sector,
                                  p.system as system,
                                  p.inhabitant as inhabitant,
                                  p.city as city
                                FROM 
                                  destruction d, planets p
                                WHERE 
                                  d.planet_id = p.id and
                                  d.planet_id = $planet_id
                                ");
    return $results;
}

/**
 * 
 */
function getPlanet($planet_id)
{
    global $database;
    
    $result = $database->select("SELECT 
                                    id, name, region, sector, system, inhabitant, city
                                  FROM 
                                    planets
                                  WHERE
                                    id = $planet_id");
    return $result;
}

/**
 * Add new destruction plan
 * @param $planet_id id of planet
 * @param $status_id id of status to add
 * @param $description description of the plan
 * @return true if add was successfully otherwise false
 */
function addNewDestruction($planet_id, $status_id, $description)
{
    global $database;

    $today = date("Y-m-d");
    $result = $database->exec("INSERT INTO destruction(planet_id, date, status, description) VALUES ($planet_id, \"$today\", $status_id, \"$description\")");
    return $result;
}

/**
 * Update existing destruction plan
 * @param $planet_id id of planet
 * @param $status_id id of status to add
 * @param $description description of the plan
 * @return true if update was successfully otherwise false
 */
function updateDestruction($destruction_id, $status_id, $description)
{
    global $database;

    $result = $database->exec("UPDATE destruction SET status = $status_id, description = \"$description\" WHERE id = $destruction_id");
    
    return $result;
}

/**
 * Start main script
 */
$action = get("action");
if ($global_permission != "admin") {
    $global_alert_status = "danger";
    $global_message = "Higher privilege is required.";
    redirect("/");
}
switch ($action) {
    case "set":
        $planet_id = get("planetId");
        $results   = getPlanetNavigation($planet_id);
        if (count($results) > 0) {
            $alreadySet = true;
            $planet = $results[0];
        } else {
            $alreadySet = false;
            $results = getPlanet($planet_id);
            $planet = $results[0];
        }
        include "views/navigation.php";
        break;
    case "update":
        $planet_id      = get("planetId");
        $status_id      = get("statusId");
        $destruction_id = get("destructionId");
        $description    = get("description");

        if (empty($destruction_id)) {
            // insert
            $result = addNewDestruction($planet_id, $status_id, $description);
            if ($result) {
                $global_alert_status = "info";
                $global_message = "Destruction plan is successfully added.";
            } else {
                $global_alert_status = "danger";
                $global_message = "Failed to add destruction plan.";
            }
            redirect("/");
        } else {
            // update
            $result = updateDestruction($destruction_id, $status_id, $description);
            if ($result) {
                $global_alert_status = "info";
                $global_message = "Destruction plan is successfully updated.";
            } else {
                $global_alert_status = "danger";
                $global_message = "Destruction plan failed to update.";
            }
            redirect("/");
        }
        break;
}