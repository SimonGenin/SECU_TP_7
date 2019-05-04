<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

session_start();

/**
 * Allow user to login
 *
 * @param $username
 * @param $password
 * @return `true` if credential is correct otherwise `false`
 */
function login($username, $password)
{
    global $database;

    $password = md5($password);

    /**
     * This new version first prepare the query and safely bind the variables
     * later to it. It is a common pattern in php.
     * The request is the  executed and we can access its results. If it was
     * an unsuccessful connection, the result is "false".
     */

    $statement = $database->prepare("SELECT username, permission, id
                FROM users
                WHERE username = :username and password = :password");

    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);

    $execution = $statement->execute();
    $result = $execution->fetchArray();

    if ($result) {
        $_SESSION['global_id'] = $result["id"];
        $_SESSION['global_username'] = $result["username"];
        $_SESSION['global_auth'] = true;
        $_SESSION['global_permission'] = $result["permission"];

        return true;
    }

    return false;
}

/**
 * Log user out
 */
function logout()
{
    unset($_SESSION['global_id']);
    unset($_SESSION['global_username']);
    unset($_SESSION['global_auth']);
    unset($_SESSION['global_permission']);
}

/**
 * Check if user is authenticated
 */
function isAuthorised()
{
    if ($_SESSION["global_auth"] == true) {
        return true;
    } else {
        return false;
    }
}

/**
 * Start main script
 */
$global_auth = false;
$action = get("action");

switch ($action) {
    case "login":
        $username = get("username");
        $password = get("password");
        $global_auth = login($username, $password);

        if ($global_auth) {
            $global_route = "home";
        } else {
            $global_route = "login";
        }
        break;
    case "logout":
        logout();
        $global_route = "login";
        break;
    default:
        if (isAuthorised()) {
            $global_auth = true;
            $global_permission = $_SESSION["global_permission"];
        } else {
            $global_route = "login";
        }
}
