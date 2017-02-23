<?php
function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'user':
            require_once('models/user.php');
            require_once('models/article.php');
            require_once('models/log.php');
            $controller = new UserController();
            break;
        case 'articles':
            require_once('models/user.php');
            require_once('models/article.php');
            $controller = new ArticleController();
            break;
    }

    // call the action
    $controller->{ $action }();
}

function error($msg) {
    $_SESSION['msg'] = "<strong>Error! </strong>".$msg;
    $_SESSION['alertType'] = "danger";
    call('pages', 'alert');
}

function msg($msg) {
    $_SESSION['msg'] = $msg;
    $_SESSION['alertType'] = "success";
    call('pages', 'alert');
}

function gotoMsg($msg) {
    $_SESSION['msg'] = $msg;
    $_SESSION['alertType'] = "success";
    header("location: ?controller=pages&action=alert");
}

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array('pages' => ['home', 'alert', 'login', 'signup', 'create'],
                     'user'  => ['p_profile','login', 'logout', 'signup', 'delete','change'],
                     'articles' => ['p_index', 'p_show', 'p_edit', 'p_showuser', 'insert', 'update', 'delete', 'ajaxPage']);

// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the pages controller
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        error("404 Page not found!");
    }
} else {
    error("404 Page not found!");
}
?>