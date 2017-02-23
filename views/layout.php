<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
        <title>Crazy Bloger</title>
        <!-- Bootstrap -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="dist/css/myStyle.css" type="text/css" rel="stylesheet">


    </head>
    <body>
    <?php require_once('views/navbar.php'); ?>

    <div id="mainContainer" class="container">
        <div class="row">
            <div class="starter-template">
                <?php require_once('routes.php'); ?>
            </div>
        </div>
    </div>

    <?php require_once('views/footer.php'); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="dist/js/myScript.js"></script>
    </body>
    </html>
