<?php
include('authentication.php');
include('includes/header.php');
?>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST["category_id"];
    $name = test_input($_POST["name"]);
    $slug = test_input($_POST["slug"]);
    $description = test_input($_POST["description"]);
    $meta_title = test_input($_POST["meta_title"]);
    $meta_description = test_input($_POST["meta_description"]);
    $meta_keyword = test_input($_POST["meta_keyword"]);
    $query = "INSERT INTO posts (category_id,name,slug,description,meta_title,meta_description,meta_keyword) VALUES ('$category_id','$name','$slug','$description','$meta_title','$meta_description','$meta_keyword')";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Posts Add Successfully!";
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
                    <h4>Add Post
                        <a href="post-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
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
                                                    <option value="<?= $categoryitem['id'] ?>"><?= $categoryitem['name'] ?></option>
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
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" required class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" required class="form-control" rows="4"></textarea>               
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" max="191" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" required class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" required class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_post" class="btn btn-primary">Save Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>