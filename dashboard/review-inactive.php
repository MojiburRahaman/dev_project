<?php
require_once '../data.php';
session_start();

$id = $_GET['id'];
$active_status = "UPDATE `reviews` SET `status`= 2 WHERE id = $id ";

if (mysqli_query($data,$active_status)) {
   header('location:reviews.php');
   $_SESSION['review_inactive'] = "Inctive Suceessfully";
}
?>