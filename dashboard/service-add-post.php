<?php
session_start();
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $summary = mysqli_real_escape_string($data,$_POST['summary']);

    if (empty($name)) {
        header('location:social-add.php');
    } elseif (empty($icon)) {
        header('location:social-add.php');
    } elseif (empty($summary)) {
        header('location:social-add.php');
    } else {
        $insert = "INSERT INTO `services` (name,icon,summary) VALUES ('$name','$icon','$summary') ";
        $data_insert = mysqli_query($data, $insert);
        if ($data_insert) {
            $_SESSION['service_update'] = "Social List Add Sucessfully";
            header('location:services.php');
        }
    }
} else {
    header('location:service-add.php');
}
?>
