<?php

if(isset($_SESSION['success'])){?>
    <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
    <?php
}
unset($_SESSION['success']);


if(isset($_SESSION['deleted'])){?>
    <div class="alert alert-danger text-center"><?php echo $_SESSION['deleted']; ?></div>
    <?php
}
unset($_SESSION['deleted']);
?>