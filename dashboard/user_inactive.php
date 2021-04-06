<?php
require_once '../data.php';
session_start();
$id = $_GET['user_id'];

$inactive_status = "UPDATE `users` SET `status`= 2 WHERE id = $id ";

if (mysqli_query($data,$inactive_status)) {
   header('location:user-active-list.php');
   $_SESSION['usr_inactive'] = "User Inactive Suceessfully";
}

?>