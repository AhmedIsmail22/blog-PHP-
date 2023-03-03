<?php require_once('inc/header.php'); ?>
<?php require_once('inc/navbar.php'); ?>
<?php require_once 'inc/connection.php';?>


<?php

    $query = "select id,title,created_at from posts";
    $runQuery = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($runQuery) > 0){
        $posts = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    }else {
        $msg = "posts not founded";
    }

?>

<div class="container-fluid pt-4">
    <div class="row">
        <?php require_once 'inc/success.php'; ?>
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>All posts</h3>
                </div>
                <div>
                    <a href="create-post.php" class="btn btn-sm btn-success">Add new post</a>
                </div>
            </div>
            <?php 
                if(! empty($posts)){?>
                        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Published At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach($posts as $post){
                                ?>
                                     <tr>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $post['created_at']; ?></td>
                                <td>
                                    <a href="show-post.php?id=<?php echo $post['id'];?>" class="btn btn-sm btn-primary">Show</a>
                                    <a href="edit-post.php?id=<?php echo $post['id'];?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="handle/delete-post.php?id=<?php echo $post['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')">Delete</a>
                                </td>
                            </tr> 
                                <?php
                            }
                    ?>
                </tbody>
            </table>
                    <?php
                }else{echo $msg;}
                ?>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>




