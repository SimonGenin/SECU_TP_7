<?php
	require 'bootstrap.php';

	if ($global_auth) {
		switch ($global_route) {
			case "home":
				require_once("pages/home.php");
				break;
			default:
				$page = get("page");
				$global_route = $page;
				$route = "pages/${page}" . ".php";
				if (file_exists($route))
					require_once($route);
				else {
					$global_route = "home";
					require_once("pages/home.php");
				}
		}
	} else {
		require_once("pages/login.php");
	}
?>

