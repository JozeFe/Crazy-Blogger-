<?php if(isset($_SESSION['msg'])) { ?>
    <div class="alert alert-<?php echo $_SESSION['alertType'] ?>" role="alert">
        <?php echo $_SESSION['msg'] ?>
    </div>
    <?php
    unset($_SESSION['msg']);
    unset($_SESSION['alertType']);
}