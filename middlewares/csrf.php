<?php

// If we have a post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_GET['action'] == 'login') {
        return ;
    }

    // If we have to provide a token
    if (empty($_POST['csrf_token'])) {
        die("No CSRF token provided in the request !");
    }

    else {

        // If the tokens don't match
        if (isset($_POST['csrf_token']) && !CSRFToken::checkWithSession($_POST['csrf_token'])) {
            die("CSRF token don't match !");
        }

    }
}
