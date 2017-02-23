<?php
class User {

    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password) {
        $this->id      = $id;
        $this->username  = $username;
        $this->password = $password;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM users');

        // we create a list of User objects from the database results
        foreach($req->fetchAll() as $user) {
            $list[] = new User($user['id'], $user['username'], $user['hash']);
        }

        Db::close();
        return $list;
    }

    public static function getUserById($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM users WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        Db::close();
        return new User($user['id'], $user['username'], $user['hash']);
    }

    public static function getUserByName($username) {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $user = $req->fetch();

        Db::close();
        return new User($user['id'], $user['username'], $user['hash']);
    }

    public static function getUserIdByName($username) {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $user = $req->fetch();
        if($req->rowCount() == 0) {
            return -1;
        }
        Db::close();
        return $user['id'];
    }

    public static function checkLoginInDB($username, $password) {
        $db = Db::getInstance();
        $stmt = $db->query("SELECT username, hash FROM users WHERE username='$username'");
        $row_count = $stmt->rowCount();
        if($row_count == 0) {
            return false;
        }
        $user_row = $stmt->fetch();
        $correct_hash = $user_row['hash'];
        Db::close();

        if (password_verify($password, $correct_hash)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkUsernameInDB($username) {
        $db = Db::getInstance();
        $stmt = $db->query("SELECT username FROM users WHERE username='$username'");
        $row_count = $stmt->rowCount();
        Db::close();
        if($row_count == 1) {
            return true;
        }
        return false;
    }

    public static function insert($user) {
        $db = Db::getInstance();
        $hash = password_hash($user->password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users(id, username, hash)
            VALUES(?,?,?)");
        $stmt->execute(array('NULL',$user->username,$hash));
        Db::close();
    }

    public static function deleteByName($username) {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM users WHERE username = ?");
        $stmt->execute(array($username));
        Db::close();
    }

    public static function updatePassword($username, $password) {
        $db = Db::getInstance();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("UPDATE users SET hash = ? WHERE username = ?");
        $stmt->execute(array($hash, $username));
        Db::close();
    }
}
?>