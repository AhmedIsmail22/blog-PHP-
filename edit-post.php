<?php require_once('inc/header.php'); ?>
<?php require_once('inc/navbar.php'); ?>
<?php require_once 'inc/connection.php'; ?>
<?php

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $query = "select title,image,body from posts where id=$id";
    $runQuery = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($runQuery) > 0){
        $posts = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    }else {
        $msg = "posts not founded";
    }
    }
    else {
        header('location: index.php');
    }
?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Edit post</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <?php
                if(! empty($posts)){
                    foreach($posts as $post){
                        ?>
                        <?php require_once 'inc/errors.php'; ?>
                            <form method="POST" action="handle/update-post.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="old_image" value="<?php echo $post['image']; ?>">
    
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <textarea class="form-control" id="body" name="body" rows="5"><?php echo $post['body']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">image</label>
                                    <input type="file" class="form-control-file" id="image" name="image" >
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        <?php
                    }
                }else {
                    echo $msg;
                }
            ?>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>