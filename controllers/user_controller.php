<?php
class UserController {
    public function p_profile() {
        if(!isset($_SESSION['user'])){
            return error ("You have to be login first");
        }
        $logs = Log::getLast10LogsByUserId(User::getUserIdByName($_SESSION['user']));
        require_once('views/pages/profile.php');
    }

    public function login() {
        if(empty($_POST['inputUsername'])) {
            error("Username is empty!");
            return require_once('views/pages/login.php');
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['inputUsername'])) {
            error ("Username - Only letters and numbers allowed!");
            return(require_once('views/pages/login.php'));
        }

        if(empty($_POST['inputPassword'])) {
            error("Password is empty!");
            return require_once('views/pages/login.php');
        }

        $username = trim($_POST['inputUsername']);
        $password = trim($_POST['inputPassword']);

        if(!User::checkLoginInDB($username,$password)) {
            error("Username or password is incorrect!");
            return require_once('views/pages/login.php');
        }

        $_SESSION['user'] = $username;
        $log = new Log("NULL", User::getUserIdByName($username), date('Y-m-d H:i:s'));
        Log::insert($log);
        gotoMsg("Login successful !");
        return true;
    }

    public function logout() {
        unset($_SESSION['user']);
        gotoMsg("Logout successful !");
    }

    public function signup() {
        if(empty($_POST['inputUsername'])) {
            error("Username is empty!");
            return require_once('views/pages/signup.php');
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['inputUsername'])) {
            error ("Username - Only letters and numbers allowed!");
            return require_once('views/pages/signup.php');
        }

        $username = trim($_POST['inputUsername']);

        if(User::checkUsernameInDB($username)) {
            error("Username already exists!");
            return require_once('views/pages/signup.php');
        }

        if(empty($_POST['inputPassword'])) {
            error("Password is empty!");
            return require_once('views/pages/signup.php');
        }

        if(empty($_POST['inputConfirmPassword'])) {
            error("Confirm password is empty!");
            return require_once('views/pages/signup.php');
        }

        $password = trim($_POST['inputPassword']);
        $confirmPassword = trim($_POST['inputConfirmPassword']);

        if(strcmp($password, $confirmPassword) != 0) {
            error("Passwords are not equal!");
            return require_once('views/pages/signup.php');
        }

        $user = new User(0, $username, $password);
        User::insert($user);
        gotoMsg("Sign up successful !");

        return true;
    }

    public function delete() {
        if(empty($_POST['inputPassword'])) {
            error("Password is empty!");
            $this->p_profile();
            return false;
        }

        if(empty($_POST['inputConfirmPassword'])) {
            error("Confirm password is empty!");
            $this->p_profile();
            return false;
        }

        $password = trim($_POST['inputPassword']);
        $confirmPassword = trim($_POST['inputConfirmPassword']);

        if(strcmp($password, $confirmPassword) != 0) {
            error("Passwords are not equal!");
            $this->p_profile();
            return false;
        }

        if(!User::checkLoginInDB($_SESSION['user'],$password)) {
            error("Password is incorrect!");
            $this->p_profile();
            return false;
        }

        $user_id = User::getUserIdByName($_SESSION['user']);
        Article::deleteByUserID($user_id);
        Log::deleteByUserId($user_id);
        User::deleteByName($_SESSION['user']);
        unset($_SESSION['user']);
        gotoMsg("Your account has been removed !");
    }

    public function change() {
        if(empty($_POST['currentPassword'])) {
            error("Current password is empty!");
            $this->p_profile();
            return false;
        }

        if(empty($_POST['inputPassword'])) {
            error("Password is empty!");
            $this->p_profile();
            return false;
        }

        if(empty($_POST['inputConfirmPassword'])) {
            error("Confirm password is empty!");
            $this->p_profile();
            return false;
        }

        $currentPassword = trim($_POST['currentPassword']);
        $password = trim($_POST['inputPassword']);
        $confirmPassword = trim($_POST['inputConfirmPassword']);

        if(strcmp($password, $confirmPassword) != 0) {
            error("New passwords are not equal!");
            $this->p_profile();
            return false;
        }

        if(!User::checkLoginInDB($_SESSION['user'],$currentPassword)) {
            error("Current password is incorrect!");
            $this->p_profile();
            return false;
        }

        User::updatePassword($_SESSION['user'], $password);
        msg("Your password has been changed !");
        $this->p_profile();
    }
}
?>