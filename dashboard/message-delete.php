<?php
require_once '../data.php';
require_once 'session.php';

$id = $_GET['id'];
$delete = "DELETE FROM `message` WHERE `id` = $id";

if (mysqli_query($data,$delete)) {
    header('location:messages.php');
    $_SESSION['dlt_message'] = "Deleted Sucessfully";
}


?>