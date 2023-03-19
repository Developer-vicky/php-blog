<?php
include('authentication.php');
include('includes/header.php');
?>
            <?php include('message.php'); ?>
<div class="container-fluid px-4">
    <div class="mt-4">
        <h4>Setting 
        </h4>
    </div>
    <div class="card-body">
   
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">About Us</label>
                    <input type="text" name="name" value="" required class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" name="category_update" class="btn btn-primary">Add About</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>