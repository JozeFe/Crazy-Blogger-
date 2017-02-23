<div class="starter-template col-xs-12 col-md-6">
    <h2>Profile settings</h2>
    <br>
    <dl class="dl-horizontal">
        <dt>Username:</dt>
        <dd><?php echo $_SESSION['user'] ?></dd>
        <dt>Last 10 Logins:</dt>
        <dd><ul class="list-unstyled">
                <?php foreach($logs as $log) {?>
                <li>[<?php echo $log->date; ?>]</li>
                <?php } ?>
            </ul></dd>
    </dl>

    <h3>Password</h3>
    <p>Change your password.</p>
    <form class="form-horizontal" action="?controller=user&action=change" method="post">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Current password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="currentPassword" placeholder="Current password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword3" class="col-sm-2 control-label">New password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="inputPassword" placeholder="New password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword3" class="col-sm-2 control-label">Verify password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="inputConfirmPassword" placeholder="Verify password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Change password !</button>
            </div>
        </div>
    </form>

    <h3>Deleting account</h3>
    <p>If you would like to delete your account enter your password.</p>
    <form class="form-horizontal" action="?controller=user&action=delete" method="post">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword3" class="col-sm-2 control-label">Confirm password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="inputConfirmPassword" placeholder="Confirm Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Delete account !</button>
            </div>
        </div>
    </form>
</div>