<?php
include('authentication.php');
include('includes/header.php');
?>


<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if(isset($_POST['post_update'])){

     $post_id = $_POST['post_id'];

    
    $category_id = $_POST["category_id"];
    $name = test_input($_POST["name"]);
    $slug = test_input($_POST["slug"]);
    $description = test_input($_POST["description"]);
    $meta_title = test_input($_POST["meta_title"]);
    $meta_description = test_input($_POST["meta_description"]);
    $meta_keyword = test_input($_POST["meta_keyword"]);

    $query = "UPDATE posts SET category_id='$category_id',name='$name',slug='$slug',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword' WHERE id='$post_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Posts Updated Successfully!";        
    }
    else
    {
        echo "Something Went Wrong.!";
        
    }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Post
                        <a href="post-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $post_id = $_GET['id'];
                            $post_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
                            $post_query_res = mysqli_query($conn, $post_query);

                            if(mysqli_num_rows($post_query_res) > 0)
                            {
                                $post_row = mysqli_fetch_array($post_query_res);
                                ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                        
                                        <input type="hidden" name="post_id" value="<?= $post_row['id'] ?>">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="">Category List</label>
                                                <?php 
                                                    $category = "SELECT * FROM categories WHERE status='0' ";
                                                    $category_run = mysqli_query($conn,$category);
                                                    if(mysqli_num_rows($category_run) >0)
                                                    {
                                                        ?>
                                                            <select name="category_id" class="form-control">
                                                                <option value="">--Select Category--</option>
                                                                <?php
                                                                    foreach($category_run as $categoryitem)
                                                                    {
                                                                        ?>
                                                                            <option value="<?= $categoryitem['id'] ?>" <?= $categoryitem['id'] == $post_row['category_id'] ? 'selected':'' ?> >
                                                                                <?= $categoryitem['name'] ?>
                                                                            </option>
                                                                         <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <h5>No category Available</h5>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?= $post_row['name'] ?>" required class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Slug(URL)</label>
                                                <input type="text" name="slug" value="<?= $post_row['slug'] ?>" required class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Description</label>
                                                
                                                <textarea name="description" id="summernote" required class="form-control"><?= html_entity_decode($post_row['description']); ?></textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Meta Title</label>
                                                <input type="text" name="meta_title" value="<?= $post_row['meta_title'] ?>" max="191" required class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description" required class="form-control" rows="4"><?= $post_row['meta_description'] ?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Meta Keyword</label>
                                                <textarea name="meta_keyword" required class="form-control" rows="4"><?= $post_row['meta_keyword'] ?></textarea>
                                            </div>
                                            <!-- <div class="col-md-6 mb-3">
                                                <label for="">Image</label>
                                                <input type="hidden" name="old_image" value="<?= $post_row['image'] ?>" />
                                                <input type="file" name="image"  class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status" <?= $post_row['status'] == '1' ? 'checked':'' ?> width="70px" height="70px"/>
                                            </div> -->
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="post_update" class="btn btn-primary">Update Post</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <h4>No Record Found</h4>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/footer.php');
include('includes/scripts.php');
?>