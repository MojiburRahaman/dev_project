<?php
require_once '../data.php';
require_once 'session.php';
$id = $_GET['id'];

$active_status = "UPDATE `socials` SET `status`= 2 WHERE id = $id ";

if (mysqli_query($data,$active_status)) {
   header('location:socials.php');
   $_SESSION['social_inactive'] = "Inactive Suceessfully";
}
?>