<?php

namespace app\classes;
use SQLite3;

class Database extends SQLite3 {
	function __construct($db) {
		$this->open($db);
	}

	function select($sql) {
		$new_array = array();
		$results = $this->query($sql);
		while ($row = $results->fetchArray()) {
			array_push($new_array, $row);
		}

		return $new_array;
	}
}
?>