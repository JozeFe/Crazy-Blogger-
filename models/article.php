<?php
class Article {

    public $id;
    public $id_users;
    public $title;
    public $text;
    public $description;
    public $date;

    public function __construct($id, $id_users, $title, $text, $description, $date) {
        $this->id      = $id;
        $this->id_users  = $id_users;
        $this->title = $title;
        $this->text = $text;
        $this->description = $description;
        $this->date = $date;
    }

    public static function getRowCount() {
        $count = 0;
        $db = Db::getInstance();
        $req = $db->query('SELECT COUNT(*) AS count FROM article');
        $count = $req->fetch();
        Db::close();
        return $count['count'];
    }

    public static function getListOfAll() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM article');
        foreach($req->fetchAll() as $article) {
            $list[] = new Article($article['id'], $article['id_users'], $article['title'],
                $article['text'], $article['description'], $article['date']);
        }

        Db::close();
        return $list;
    }

    public static function getListFromLong($from, $long) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM article ORDER BY date DESC LIMIT ?, ?');
        $req->bindParam(1, $from, PDO::PARAM_INT);
        $req->bindParam(2, $long, PDO::PARAM_INT);
        $req->execute();
        foreach($req->fetchAll() as $article) {
            $list[] = new Article($article['id'], $article['id_users'], $article['title'],
                $article['text'], $article['description'], $article['date']);
        }

        Db::close();
        return $list;
    }

    public static function getArticlesByUserId($id_user) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM article WHERE id_users = ?');
        $req->execute(array($id_user));
        foreach($req->fetchAll() as $article) {
            $list[] = new Article($article['id'], $article['id_users'], $article['title'],
                $article['text'], $article['description'], $article['date']);
        }

        Db::close();
        return $list;
    }

    public static function getArticleById($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM article WHERE id = ?');
        $req->execute(array($id));
        $article = $req->fetch();

        Db::close();
        return new Article($article['id'], $article['id_users'], $article['title'],
            $article['text'], $article['description'], $article['date']);
    }

    public static function insert($article) {
        $db = Db::getInstance();
        $stmt = $db->prepare("INSERT INTO article(id, id_users, title,
            text, description, date) VALUES(?,?,?,?,?,?)");
        $stmt->execute(array('NULL',$article->id_users,$article->title,
            $article->text, $article->description, $article->date));
        Db::close();
    }

    public static function deleteByUserID($id_user) {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM article WHERE id_users = ?");
        $stmt->execute(array($id_user));
        Db::close();
    }

    public static function deleteByID($id) {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM article WHERE id = ?");
        $stmt->execute(array($id));
        Db::close();
    }

    public static function update($article) {
        $db = Db::getInstance();
        $stmt = $db->prepare("UPDATE article SET title = ?, text = ?, description = ?, date = ?
            WHERE id = ? AND id_users = ?");
        $stmt->execute(array($article->title, $article->text, $article->description, $article->date,
            $article->id, $article->id_users));
        Db::close();
    }
}
?>