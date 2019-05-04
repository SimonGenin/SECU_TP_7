<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

/**
 * Update user password
 * @param $user_id id of current user
 * @param $new_password1 new password
 * @param $new-password2
 * @return true if password is successfully updated otherwise false
 */
function updatePassword($user_id, $new_password1, $new_password2)
{
    global $database;
    $path     = "";
    $photo_yn = false;

    $upload_dir = 'public/uploads';
    if ($new_password1 == $new_password2) {
    $password = md5($new_password1);

    if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $tmp_path = $_FILES["photo"]["tmp_name"];
        $name     = $_FILES["photo"]["name"];
        $path     = $upload_dir . "/" . $name;
        if (move_uploaded_file($tmp_path, $path))
        $photo_yn = true;
    }

    if ($photo_yn) {
        $result = $database->exec("UPDATE users SET password = \"$password\", photo_path = \"$path\" WHERE id = $user_id");
    } else {
        $result = $database->exec("UPDATE users SET password = \"$password\"
                                WHERE 
                                    id = $user_id
                                ");
    }
    
    return $result;
    } else {
    return false;
    }
}

/**
 * 
 */
function saveUser($username, $password, $permission)
{
    global $database;

    $username = strtolower($username);
    $password = md5($password);

    if (empty($username) || empty($password) || empty($permission)) return false;

    // check if user exists
    $check = $database->select("SELECT 
                                    username
                                FROM
                                    users
                                WHERE 
                                    username = \"$username\"");

    if (count($check) > 0) {
        return false;
    } else {
        $result = $database->exec("INSERT INTO 
                                    users (username, password, permission) 
                                    VALUES(\"$username\", \"$password\", \"$permission\")");

        return $result;
    }
}

function index($page = 1)
{
    global $database;

    $limit = PAGINATION_MAX_PER_PAGE;
    $offset = $limit * ($page - 1);
    $results = $database->select("SELECT 
                                    id, username, permission, photo_path 
                                  FROM users LIMIT $limit OFFSET $offset");

    return $results;
}

function delete($user_id)
{
    global $database;

    $result = $database->exec("DELETE FROM users WHERE id = $user_id");

    return $result;
}
/**
 * Start main script
 */
$action = get("action");

switch ($action) {
    case "index":
        $page     = intval(get("pageno"));
        $results  = index($page);
        $previous = $page > 1 ? $page - 1 : 1;
        $next     = $page > 0 ? $page + 1 : 2;
        $results = index($page);
        include "views/user/index.php";
        break;
    case "add":
        if ($global_permission != "admin") {
            $global_alert_status = "danger";
            $global_message = "Higher privilege is required.";
            redirect("/");
        } else {
            include "views/user/addUser.php";
        }
        break;
    case "delete":
        if ($global_permission != "admin") {
            $global_alert_status = "danger";
            $global_message = "Higher privilege is required.";
            redirect("/");
        } else {
            $user_id = get("userId");
            $result = delete($user_id);
            if ($result) {
            $global_alert_status = "info";
            $global_message = "User is successfully deleted.";
            } else {
            $global_alert_status = "danger";
            $global_message = "Failed to delete user.";
            }
            redirect("/");
        }
        break;
    case "save":
        if ($global_permission != "admin") {
            $global_alert_status = "danger";
            $global_message = "Higher privilege is required.";
            redirect("/");
        } else {
            $username   = get("username");
            $password   = get("password");
            $permission = get("permission");

            $result = saveUser($username, $password, $permission);

            if ($result) {
                $global_alert_status = "info";
                $global_message = "User is successfully added.";
            } else {
                $global_alert_status = "danger";
                $global_message = "Failed to add user.";
            }
            redirect("/");
        }
        break;
    case "password":
        include "views/user/password.php";
        break;
    case "update":
        $new_password1 = get("newPassword1");
        $new_password2 = get("newPassword2");
        $user_id = get("userId");

        $result = updatePassword($user_id, $new_password1, $new_password2);
        if ($result) {
            $global_alert_status = "info";
            $global_message = "Password is successfully updated.";
        } else {
            $global_alert_status = "danger";
            $global_message = "Failed to update password.";
        }
        redirect("/");
        break;
}