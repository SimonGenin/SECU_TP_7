<?php
require_once 'bootstrap.php';

$script = file_get_contents("database/schema_db.sql");

$database->query($script);