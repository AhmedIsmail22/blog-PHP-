<?php require_once 'connection.php'; 
    $lang = $_SESSION['lang'];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><?php echo $lang['blog']; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="nav-link" href="inc/message-en.php?lang=en">English</a>
                    </li> 
                    <li class="nav-item">
                    <a class="nav-link" href="inc/message-ar.php?lang=ar">العربية</a>
                    </li> 
                <?php if(!isset($_SESSION['user_id'])):?>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php"><?php echo $lang['login']; ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                    <a class="nav-link" href="handle/logout.php"><?php echo $lang['logout']; ?></a>
                    </li>   
                <?php endif ?> 
            </ul>
        </div>
    </div>
</nav>