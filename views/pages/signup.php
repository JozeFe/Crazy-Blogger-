<div class="starter-template col-xs-12 col-md-6">
    <form class="form-horizontal" name="signUp" action="?controller=user&action=signup" onsubmit="return validateSignUpForm()" method="post">
        <div class="form-group">
            <label for="inputUsername3" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" id="inputUsername3" class="form-control" name="inputUsername" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" id="inputPassword3" class="form-control" name="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword3" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" id="inputConfirmPassword3" class="form-control" name="inputConfirmPassword" placeholder="Confirm Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Sign up</button>
            </div>
        </div>
    </form>
</div>