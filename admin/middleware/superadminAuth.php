<?php
if($_SESSION['auth_role'] !="2" )
{
    $_SESSION['message'] = "You are not Authorised as Super ADMIN";
    header("Location: index.php");
    exit(0);
}
?>