<?php


if(isset($_SESSION['success'])){
    ?>
        <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
    <?php
}
    
unset($_SESSION['success']);