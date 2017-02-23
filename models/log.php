<?php
class Log {

    public $id;
    public $id_user;
    public $date;

    public function __construct($id, $id_user, $date) {
        $this->id      = $id;
        $this->id_user  = $id_user;
        $this->date = $date;
    }

    public static function getLast10LogsByUserId($id_user) {
        $list = [];
        $db = Db::getInstance();
        $id = intval($id_user);
        $req = $db->prepare('SELECT * FROM logs WHERE id_user = ? ORDER BY date DESC LIMIT 10');
        $req->execute(array($id_user));
        foreach($req->fetchAll() as $log) {
            $list[] = new Log($log['id'], $log['id_user'], $log['date']);
        }

        Db::close();
        return $list;
    }

    public static function insert($log) {
        $db = Db::getInstance();
        $stmt = $db->prepare("INSERT INTO logs(id, id_user, date)
            VALUES(?,?,?)");
        $stmt->execute(array('NULL',$log->id_user,$log->date));
        Db::close();
    }

    public static function deleteByUserId($id_user) {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM logs WHERE id_user = ?");
        $stmt->execute(array($id_user));
        Db::close();
    }
}
?>