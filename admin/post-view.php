<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    
    <div class="row mt-4">
        <div class="col-md-12">


            <?php include('message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>view Posts
                        <a href="post-add.php" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <?php if($_SESSION['auth_role'] == '2') : ?>
                                        <th>Delete</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // $posts = "SELECT * FROM posts WHERE status!='2' ";
                                    $posts = "SELECT p.*, c.name AS cname FROM posts p,categories c WHERE c.id = p.category_id ";
                                    $posts_run = mysqli_query($conn, $posts);

                                    if(mysqli_num_rows($posts_run) > 0)
                                    {
                                        foreach($posts_run as $post)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $post['id'] ?></td>
                                                <td><?= $post['name'] ?></td>
                                                <td><?= $post['cname'] ?></td>
                                                
                                                <td>
                                                    <a href="post-edit.php?id=<?= $post['id'] ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <?php if($_SESSION['auth_role'] == '2') : ?>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" name="post_delete_btn" value="<?= $post['id'] ?>" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                <?php endif; ?>

                                            </tr>
                                            <?php

                                        }

                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/footer.php');
include('includes/scripts.php');
?>