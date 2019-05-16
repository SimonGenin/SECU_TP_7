<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

/**
 * Global function to get parameters from $_POST or $_GET
 * @param $key to get value
 * @return value of $key if available otherwise null;
 */
function get($key)
{
    if (isset($_GET[$key])) return $_GET[$key];
    if (isset($_POST[$key])) return htmlspecialchars($_POST[$key]);
    return null;
}

/**
 * Do a redirection specified by $url
 * @param $url to redirect to
 */
function redirect($url)
{
    global $global_auth;
    global $global_alert_status;
    global $global_message;

    $_SESSION["global_alert_status"] = $global_alert_status;
    $_SESSION["global_message"] = $global_message;
    $_SESSION['global_auth'] = $global_auth;
    header ("location: $url");
    exit;
}

/**
 * Display alert message
 */
function alert()
{
    global $global_alert_status;
    global $global_message;

    if (empty($global_alert_status)) return null;

    switch ($global_alert_status) {
        case "primary": $type = "alert-primary"; break;
        case "success": $type = "alert-success"; break;
        case "info": $type = "alert-info"; break;
        case "danger": $type = "alert-danger"; break;
        default: $type = "";
    }

    unset($_SESSION["global_alert_status"]);
    unset($_SESSION["global_message"]);

    $tag = "<div class=\"alert $type alert-dismissible fade show\" role=\"alert\">
                $global_message
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
                </div>";

    return $tag;
}

/**
 * return status by name
 */
function strStatus($status)
{
    $tag = "";
    switch ($status) {
        case STATUS_INITIATED: $tag = "<span class=\"badge badge-primary\">" . PLANET_STATUSES[STATUS_INITIATED]. "</span>";
                break;
        case STATUS_DESTRUCTING: $tag = "<span class=\"badge badge-warning\">" . PLANET_STATUSES[STATUS_DESTRUCTING]. "</span>";
                break;
        case STATUS_PARTIAL: $tag = "<span class=\"badge badge-warning\">" . PLANET_STATUSES[STATUS_PARTIAL]. "</span>";
                break;
        case STATUS_DESTRUCTED: $tag = "<span class=\"badge badge-success\">" . PLANET_STATUSES[STATUS_DESTRUCTED]. "</span>";
                break;
        default: $tag ="<span class=\"badge badge-danger\">" . PLANET_STATUSES[STATUS_UNKNOWN]. "</span>";
    }
    return $tag;
}

/**
 * 
 */
function strSystem($system)
{
    $name = "";
    switch ($system) {
        case "Unknown":
            $name = "<span class=\"badge badge-dark\">" . $system. "</span>";
            break;
        default:
            $name = $system;
    }

    return $name;
}

/**
 * 
 */
function strSector($sector)
{
    $name = "";
    switch ($sector) {
        case "Unknown":
            $name = "<span class=\"badge badge-dark\">" . $sector. "</span>";
            break;
        default:
            $name = $sector;
    }

    return $name;
}

/**
 * 
 */
function strInhabitant($inhabitant)
{
    $name = "";
    switch ($inhabitant) {
        case "Unknown":
            $name = "<span class=\"badge badge-dark\">" . $inhabitant. "</span>";
            break;
        default:
            $name = $inhabitant;
    }

    return $name;
}

/**
 * 
 */
function strCity($city)
{
    $name = "";
    switch ($city) {
        case "Unknown":
            $name = "<span class=\"badge badge-dark\">" . $city. "</span>";
            break;
        default:
            $name = $city;
    }

    return $name;
}