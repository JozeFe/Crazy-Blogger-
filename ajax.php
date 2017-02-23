<?php
require_once('connection.php');
require_once('models/user.php');
require_once('models/article.php');

if (!isset($_GET['page']))
return error("404 Page not found!");
$NUMBER = 3;
$page = $_GET['page'];
$pagescount = ceil(Article::getRowCount() / $NUMBER);

if ($_GET['page'] > $pagescount || $_GET['page'] < 1)
return error("404 Page not found!");

$articles = Article::getListFromLong(($page - 1)*$NUMBER, $NUMBER);

echo json_encode($articles);
?>