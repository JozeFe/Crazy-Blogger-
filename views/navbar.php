<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Crazy Bloger</a>
        </div>
        <?php if(isset($_SESSION['user'])) { ?>
            <div id="navbarLog" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="?controller=articles&action=p_index&page=1">Articles</a></li>
                    <li><a href="?controller=articles&action=p_showuser">My Articles</a></li>
                    <li><a href="?controller=pages&action=create">Create Article</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?controller=user&action=p_profile">Profile</a></li>
                    <li><a href="?controller=user&action=logout">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        <?php } else { ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="?controller=articles&action=p_index&page=1">Articles</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?controller=pages&action=signup">Sign Up</a></li>
                    <li><a href="?controller=pages&action=login">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        <?php } ?>
    </div>
</nav>