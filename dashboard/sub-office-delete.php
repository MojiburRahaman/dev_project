<?php
session_start();
require_once "../data.php";

    $id = $_GET['id'];
    $sub_office = "DELETE FROM `offices` WHERE `id` = $id";

    if (mysqli_query($data,$sub_office)) {
        header('location:offices.php');
        $_SESSION['delete_sub_office'] = " Deleted Sucessfully";
    }
    




?>