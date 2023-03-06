<?php require_once('inc/header.php'); ?>
<?php require_once('inc/navbar.php'); ?>
<?php require_once 'inc/connection.php'; ?>

<?php
    $lang = $_SESSION['lang'];
?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3><?php echo $lang['login']; ?></h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none"><?php echo $lang['back']; ?></a>
                </div>
            </div>
            <?php require_once 'inc/errors.php'; ?>
            <form method="POST" action="handle/handle-login.php">
    
                <div class="mb-3">
                    <label for="email" class="form-label"><?php echo $lang['email']; ?></label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_SESSION['email']))echo $_SESSION['email']; unset($_SESSION['email']); ?>" >
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label"><?php echo $lang['password']; ?></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_SESSION['password']))echo $_SESSION['password']; unset($_SESSION['password']); ?>">
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit"><?php echo $lang['login']; ?></button>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>