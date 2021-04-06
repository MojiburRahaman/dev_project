<?php
require_once '../data.php';
require_once 'session.php';
$id = $_GET['id'];

$active_status = "UPDATE `services` SET `status`= 1 WHERE id = $id ";

if (mysqli_query($data,$active_status)) {
   header('location:services.php');
   $_SESSION['service_active'] = "Active Suceessfully";
}
?>