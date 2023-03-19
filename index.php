<?php
include('includes/config.php');
$page_title = "Developer Vicky";
$meta_description = "Developer Vicky are always there to help you in coding. As per the need of society, we provide a platform where you can level up your skills and learn new ones. You can learn technologies from scratch to an advanced level with us.";
$meta_keywords = "Developer Vicky, Vicky, Code with vicky, vicky developer, codingwithvicky, developervicky, DEVELOPER VICKY, coding, developer, vicky sahni, PHP, React,";
include('includes/header.php');
include('includes/navbar.php');
?>




<div class="py-5 bg-dark">
    <div class="container">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">Category</h3>
                <span class="divider mb-2"></span>
            </div>


            <?php        
                $homecategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' LIMIT 12 ";
                $homecategory_run = mysqli_query($conn, $homecategory);
            
                if(mysqli_num_rows($homecategory_run) > 0)
                {
                    foreach($homecategory_run as $homecateItem)
                    {
                        ?>
                    
                            <div class="col-md-3 mb-2">
                                <a class="text-decoration-none" href="category.php?title=<?= $homecateItem['slug']; ?>">
                                    <div class="card card-body">
                                        <?= $homecateItem['name']; ?>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
                }
          
            ?>
        </div>
    </div>
</div>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-dark">Developer Vicky</h3>
                <span class="divider mb-2"></span>
                <p>"Developer Vicky" are always there to help you in coding. As per the need of society, we provide a platform where you can level up your skills and learn new ones.
                    You can learn technologies from scratch to an advanced level with us.</p>
            </div>
        </div>
    </div>
</div>


<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Latest Posts</h3>
                <span class="divider mb-2"></span>

                <?php        
                    $homePosts = "SELECT * FROM posts ORDER BY id DESC LIMIT 12";
                    $homePosts_run = mysqli_query($conn, $homePosts);
                
                    if(mysqli_num_rows($homePosts_run) > 0)
                    {
                        foreach($homePosts_run as $homePostItem)
                        {
                            ?>
                        
                                <div class="mb-4">
                                    <a class="text-decoration-none" href="post.php?title=<?= $homePostItem['slug']; ?>">
                                        <div class="card card-body bg-light">
                                            <?= $homePostItem['name']; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Reach Us</h4>
                    </div>
                    <div class="card-body">
                        info@developervicky.com
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/footer.php');
?>