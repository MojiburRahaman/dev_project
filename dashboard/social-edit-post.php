<?php
session_start();
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $id =$_SESSION['social_edit_id'];

    if (empty($name)) {
        header('location:social-add.php');
    } elseif (empty($icon)) {
        header('location:social-add.php');
    } elseif (empty($link)) {
        header('location:social-add.php');
    } else {
        $insert = "UPDATE`socials` set name = '$name',icon = '$icon',link = '$link' WHERE id = $id";
        $data_insert = mysqli_query($data, $insert);
        if ($data_insert) {
            $_SESSION['social_edit_update'] = "Social List Edit Sucessfully";
            header('location:socials.php');
        }
    }
} else {
    header('location:social-edit.php');
}
?>