<?php
require_once '../data.php';
require_once 'session.php';

$user_delete_id = $_GET['usr_dlt_id'];
$user_delete = "DELETE FROM `users` WHERE `id` = $user_delete_id";

if (mysqli_query($data,$user_delete)) {
    header('location:user-active-list.php');
    $_SESSION['delete_user'] = "User Deleted Sucessfully";
}


?>