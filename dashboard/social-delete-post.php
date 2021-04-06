<?php
session_start();
require_once "../data.php";

    $id = $_GET['id'];
    $social_delete = "DELETE FROM `socials` WHERE `id` = $id";

    if (mysqli_query($data,$social_delete)) {
        header('location:socials.php');
        $_SESSION['delete_social'] = " Deleted Sucessfully";
    }
    




?>