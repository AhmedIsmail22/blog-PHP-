<?php require_once('inc/header.php'); ?>
<?php require_once('inc/navbar.php'); ?>
<?php require_once 'inc/connection.php';?>
<?php require_once 'inc/success.php'; ?>
<?php
    $lang = $_SESSION['lang'];
    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }
    
    $limit = 2;
    $offset = ($page-1)*$limit;

    $query = "select count(id) as total from posts";
    $runQuery = mysqli_query($conn, $query);
    if(mysqli_num_rows($runQuery) == 1){
        $post = mysqli_fetch_assoc($runQuery);
        $total = $post['total'];
    }
    $numer_of_pages = ceil($total / $limit);

    if($page < 1 || $page > $numer_of_pages){
        header("location:".$_SERVER['PHP_SELF']."?page=1");
    }
    
    $query = "select id, title, created_at from posts limit $limit offset $offset";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery)){
        $posts = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    }else {
        $msg = "posts not founded";
    }
01

?>
<div class="container-fluid pt-4">
    <div class="row">
        <?php require_once 'inc/success.php'; ?>
        <?php require_once 'inc/errors.php'; ?>
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3><?php echo $lang['all posts']; ?></h3>
                </div>
                <div>
                    <a href="create-post.php" class="btn btn-sm btn-success"><?php echo $lang['add new post']; ?></a>
                </div>
            </div>
            <?php if(!empty($posts)):?>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><?php echo $lang['title']; ?></th>
                        <th scope="col"><?php echo $lang['puplished at']; ?></th>
                        <th scope="col"><?php echo $lang['actions']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post): ?>
                        <tr>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['created_at']; ?></td>
                        <td>
                            <a href="show-post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-primary"><?php echo $lang['show']; ?></a>
                            <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-secondary"><?php echo $lang['edit']; ?></a>
                            <a href="handle/delete-post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')"><?php echo $lang['delete']; ?></a>
                        </td>
                     </tr> 
                        <?php endforeach; ?>
                </tbody>
            </table>
                <?php else:?><?php endif; ?>
             
        </div>
    </div>
    <ul class="pagination flex justify-content-center" style="margin-top:150px">
    <li class="page-item <?php if($page == 1) echo "disabled"; ?>"><a class="page-link" href="index.php?page=<?php echo $page-1; ?>"><?php echo $lang['previous']; ?></a></li>
    <?php for ($i=1; $i <= $numer_of_pages; $i++) { 
        ?>
             <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
        <?php 
    } ?>
    <li class="page-item <?php if($page == $numer_of_pages) echo "disabled"; ?>"><a class="page-link" href="index.php?page=<?php echo $page+1; ?>"><?php echo $lang['next']; ?></a></li>
  </ul>
</div>

<?php require('inc/footer.php'); ?>




