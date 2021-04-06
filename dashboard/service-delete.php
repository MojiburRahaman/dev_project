<?php
require_once '../data.php';
require_once 'session.php';

$id = $_GET['id'];
$delete = "DELETE FROM `services` WHERE `id` = $id";

if (mysqli_query($data,$delete)) {
    header('location:services.php');
    $_SESSION['delete_service'] = "Deleted Sucessfully";
}


?>