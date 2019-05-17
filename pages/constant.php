<?php
defined('DEATHSTAR') or die('DARK SIDE OF THE FORCE');

define('STATUS_INITIATED',      0);
define('STATUS_DESTRUCTING',    1);
define('STATUS_PARTIAL',        2);
define('STATUS_DESTRUCTED',     3);
define('STATUS_UNKNOWN',        99);

define('PLANET_STATUSES', array(0 => "INITIATED", 1 => "DESTRUCTING", 2 => "PARTIAL", 3 => "DESTRUCTED", 99 => "UNKNOWN"));
define('USER_PERMISSIONS', array("admin" => "ADMINISTRATOR", "user" => "USER"));

define('PAGINATION_MAX_PER_PAGE', 10);

define('FILE_EXTENSION_PHOTO', array(0 => "png", 1 => "jpg", 2 => "jpeg", 3 => "gif"));
define('FILE_MIME_PHOTO', array(0 => "image/png", 1 => "image/jpeg", 2 => "image/gif"));