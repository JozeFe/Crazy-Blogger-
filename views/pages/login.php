<div class="starter-template col-xs-12 col-md-6">
    <form class="form-horizontal" name="loginForm" action="?controller=user&action=login" onsubmit="return validateLoginForm()" method="post">
        <div class="form-group">
            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" id="inputUsername" class="form-control" name="inputUsername" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Sign in</button>
            </div>
        </div>
    </form>
</div>