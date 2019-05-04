<?php

// defined('DEATHSTAR') or die('No human allowed');
require_once 'bootstrap.php';

$script = file_get_contents("database/seed.sql");

$database->query($script);