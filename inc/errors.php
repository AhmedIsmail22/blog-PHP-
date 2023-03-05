<?php


if(isset($_SESSION['error'])){
    foreach($_SESSION['error'] as $error){
        ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        
        <?php
    }
    unset($_SESSION['error']);
}