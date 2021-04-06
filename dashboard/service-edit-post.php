<?php
session_start();
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $summary = $_POST['summary'];
    $id =$_SESSION['service_edit_id'];

    if (empty($name)) {
        header('location:social-add.php');
    } elseif (empty($icon)) {
        header('location:social-add.php');
    } elseif (empty($summary)) {
        header('location:social-add.php');
    } else {
        $insert = "UPDATE`services` set name = '$name',icon = '$icon',summary = '$summary' WHERE id = $id";
        $data_insert = mysqli_query($data, $insert);
        if ($data_insert) {
            $_SESSION['service_edit_update'] = "Service Edit Sucessfully";
            header('location:services.php');
        }
    }
} else {
    header('location:service-edit.php');
}
?>