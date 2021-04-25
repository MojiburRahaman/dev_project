<?php
require_once '../data.php';

$id = $_GET['id'];
$active_status = "UPDATE `message` SET `status`= 2 WHERE id = $id ";

if (mysqli_query($data,$active_status)) {
   header('location:messages.php');
}
?>