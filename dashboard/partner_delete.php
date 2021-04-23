<?php
require_once '../data.php';
require_once 'session.php';

$id = $_GET['id'];
$delete = "DELETE FROM `partners` WHERE `id` = $id";

if (mysqli_query($data,$delete)) {
    header('location:partners.php');
    $_SESSION['dlt_partners'] = "Deleted Sucessfully";
}


?>