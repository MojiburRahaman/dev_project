<?php
require_once '../data.php';
session_start();
$id = $_GET['user_id'];

$active_status = "UPDATE `users` SET `status`= 1 WHERE id = $id ";

if (mysqli_query($data,$active_status)) {
   header('location:user-inactive-list.php');
   $_SESSION['usr_active'] = "User Active Suceessfully";
}

?>