<!-- <?php
include('authentication.php');
if(isset($_POST['add_post'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $query = "INSERT INTO posts (category_id,name,slug,description,meta_title,meta_description,meta_keyword,) VALUES 
                ('$category_id','$name','$slug','$description','$meta_title','$meta_description','$meta_keyword', current_timestamp());";
    $query_run = mysqli_query($conn, $query); 
    
    if($query_run)
    {         
        $_SESSION['message'] = "Post Created Successfully";
        header('Location: post-add.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: post-add.php');
        exit(0);
    }
    
}
?>