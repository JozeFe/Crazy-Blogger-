<?php
class PagesController {
    public function home() {
        require_once('views/pages/home.php');
    }

    public function alert() {
        require_once('views/pages/alert.php');
    }

    public function login() {
        require_once('views/pages/login.php');
    }

    public function signup() {
        require_once('views/pages/signup.php');
    }

    public function create() {
        require_once('views/pages/create.php');
    }
}
?>