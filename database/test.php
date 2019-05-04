<?php
require_once 'bootstrap.php';

$results = $database->select("select name, status from planets, destruction where planets.id = destruction.planet_id");

echo "Number of records: " . count($results) . "\n";

foreach ($results as $value) {
    var_dump($value);
}

$results = $database->select("SELECT 
                                    id, name, region, sector, system, inhabitant, city
                                 FROM 
                                    planets
                                 LIMIT 0, 3");
    
foreach ($results as $value) {
    var_dump($value);
}
