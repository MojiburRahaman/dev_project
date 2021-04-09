<?php
require_once"session.php";
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];

    if (empty($name)) {
        header('location:social-add.php');
    } elseif (empty($icon)) {
        header('location:social-add.php');
    } elseif (empty($link)) {
        header('location:social-add.php');
    } else {
        $insert = "INSERT INTO `socials` (name,icon,link) VALUES ('$name','$icon','$link') ";
        $data_insert = mysqli_query($data, $insert);
        if ($data_insert) {
            $_SESSION['social_update'] = "Social List Add Sucessfully";
            header('location:socials.php');
        }
    }
} else {
    header('location:social-add.php');
}
?>
