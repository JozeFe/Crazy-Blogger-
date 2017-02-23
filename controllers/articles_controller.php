<?php
class ArticleController {
    public function p_index() {
        if (!isset($_GET['page']))
            return error("404 Article not found!");
        $NUMBER = 3;
        $page = $_GET['page'];
        $pagescount = ceil(Article::getRowCount() / $NUMBER);

        if ($_GET['page'] > $pagescount || $_GET['page'] < 1)
            return error("404 Article not found!");

        $articles = Article::getListFromLong(($page - 1)*$NUMBER, $NUMBER);

        require_once('views/articles/index2.php');
    }

    public function ajaxPage() {
        $arr = array("a" => "1", "b" => "2");
        $arr2 = [];
        $arr2["key"] = "value";
        $arr2["key2"] = "value2";
        echo json_encode($arr2);
        /*
        if (!isset($_GET['page']))
            return;
        $NUMBER = 3;
        $page = $_GET['page'];
        $pagescount = ceil(Article::getRowCount() / $NUMBER);

        if ($_GET['page'] > $pagescount || $_GET['page'] < 1)
            return;

        $articles = Article::getListFromLong(($page - 1)*$NUMBER, $NUMBER);

        //print $articles;
        //echo json_encode($articles); */
    }

    public function p_show() {
        if (!isset($_GET['id']))
            return error("404 Article not found!");

        $article = Article::getArticleById($_GET['id']);
        require_once('views/articles/show.php');
    }

    public function p_showuser() {
        if(!isset($_SESSION['user'])){
            return error ("You have to be login first");
        }

        $user_id = User::getUserIdByName($_SESSION['user']);
        $articles = Article::getArticlesByUserId($user_id);
        require_once('views/articles/showuser.php');
    }

    public function p_edit() {
        if (!isset($_GET['id']))
            return error("404 Article not found!");

        $user_id = User::getUserIdByName($_SESSION['user']);
        $article = Article::getArticleById($_GET['id']);

        if ($user_id != $article->id_users) {
            return error("You don't have permission!");
        }

        require_once('views/articles/edit.php');
    }

    public function insert() {
        if(!isset($_SESSION['user'])){
            return error ("You have to be login first");
        }

        if(empty($_POST['inputTitle'])) {
            error("Title field is empty!");
            require_once('views/pages/create.php');
            return false;
        }

        if(empty($_POST['inputDescription'])) {
            error("Description field is empty!");
            require_once('views/pages/create.php');
            return false;
        }

        if(empty($_POST['inputText'])) {
            error("Text field is empty!");
            require_once('views/pages/create.php');
            return false;
        }

        $title = htmlspecialchars($_POST['inputTitle']);
        $description = htmlspecialchars($_POST['inputDescription']);
        $text = htmlspecialchars($_POST['inputText']);

        $user_id = User::getUserIdByName($_SESSION['user']);
        $date = date('Y-m-d H:i:s');
        $article = new Article('NULL', $user_id, $title, $text, $description, $date);
        Article::insert($article);
        gotoMsg("Article was created successful !");

        //require_once('views/pages/create.php');
    }



    public function delete() {
        if(!isset($_SESSION['user'])){
            return error ("You have to be login first");
        }

        if (!isset($_GET['id']))
            return error("404 Article not found!");

        $user_id = User::getUserIdByName($_SESSION['user']);
        $article = Article::getArticleById($_GET['id']);

        if ($user_id != $article->id_users) {
            return error("You don't have permission!");
        }
        Article::deleteByID($_GET['id']);
        msg("Article was deleted!");
        $this->p_showuser();
    }

    public function update() {
        if(!isset($_SESSION['user'])){
            return error ("You have to be login first");
        }

        if (!isset($_GET['id']))
            return error("404 Article not found!");

        $user_id = User::getUserIdByName($_SESSION['user']);
        $article = Article::getArticleById($_GET['id']);

        if ($user_id != $article->id_users) {
            return error("You don't have permission!");
        }

        if(empty($_POST['inputTitle'])) {
            error("Title field is empty!");
            require_once('views/pages/create.php');
            return false;
        }

        if(empty($_POST['inputDescription'])) {
            error("Description field is empty!");
            require_once('views/pages/create.php');
            return false;
        }

        if(empty($_POST['inputText'])) {
            error("Text field is empty!");
            require_once('views/pages/create.php');
            return false;
        }

        $title = htmlspecialchars($_POST['inputTitle']);
        $description = htmlspecialchars($_POST['inputDescription']);
        $text = htmlspecialchars($_POST['inputText']);
        $date = date('Y-m-d H:i:s');
        $article = new Article($_GET['id'], $user_id, $title, $text, $description, $date);
        Article::update($article);

        msg("Article was updated!");
        $this->p_showuser();
    }

}
?>