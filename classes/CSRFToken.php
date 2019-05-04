<?php

class CSRFToken
{
    private $token;

    public function __construct()
    {
        $this->refresh();
    }

    public function refresh()
    {
        $this->token =  substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32);
    }

    public function store() {
        $_SESSION['csrf_token'] = $this->token;
    }

    public static function checkWithSession($post_token) {

        if ($_SESSION['csrf_token'] == $post_token) {
            return true;
        }

        return false;
    }

}
