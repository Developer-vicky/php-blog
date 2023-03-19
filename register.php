<?php
include('includes/config.php');

$page_title = "Register Page";
$meta_description = "Register page description blogging website ";
$meta_keywords = "php, tech, css";


include('includes/header.php');

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Yor are already logged In";
    header("Location: index.php");
    exit(0);
}

// session_start();
include('includes/navbar.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <?php include('message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">

                    <form action="registercode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>First Name</label>
                            <input required type="text" name="fname" placeholder="Enter First Name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Last Name</label>
                            <input required type="text" name="lname" placeholder="Enter Last Name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Email Id</label>
                            <input required type="email" name="email" placeholder="Enter Your Email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input required type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input required type="password" name="cpassword" placeholder="Confirm Password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="register_btn" class="btn btn-primary">Login</button>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>