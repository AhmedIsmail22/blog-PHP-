 <?php

                if(isset($_SESSION['errors'])){
                    foreach($_SESSION['errors'] as $error){?>
                        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                        <?php
                    }
                }
                    unset($_SESSION['errors']);
            ?>