<?php

define('DEATHSTAR', microtime(true));

require_once 'pages/constant.php';
require_once 'pages/global.php';
require_once 'classes/Database.php';
require_once 'config.php';

use app\classes\Database;
$database = new Database($DB_PATH);

$global_auth       = false;
$global_permission = "";
$global_route      = "";

// load the class (couldn't make the use keyword work)
require_once 'classes/CSRFToken.php';

require_once 'pages/auth.php';

if (isset($_SESSION["global_alert_status"])) {
    $global_alert_status = $_SESSION["global_alert_status"];
}

if (isset($_SESSION["global_message"])) {
    $global_message      = $_SESSION["global_message"];
}

// If we want csrf protection
if ($CSRF_PROTECTION_ACTIVE) {
    require_once 'middlewares/csrf.php';
}
