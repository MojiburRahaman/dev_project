<?php
require_once 'session.php';
require_once '../data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $office = mysqli_real_escape_string($data, $_POST['office']);
    $number = $_POST['number'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    if (empty($office)) {
        header('location:primary-office-add.php');
    } elseif (empty($number)) {
        header('location:primary-office-add.php');
    } elseif (empty($email)) {
        header('location:primary-office-add.php');
    }
    elseif (empty($place)) {
        header('location:primary-office-add.php');
    }
    else {
        $add_office = "INSERT INTO offices (country,adress,phone,email) VALUES ( '$place','$office','$number','$email' )";
        $add_office_q = mysqli_query($data, $add_office);


        if ($add_office_q) {
            $insert_id = mysqli_insert_id($data);
            $set_status = "UPDATE offices SET status = 2 WhERE id = $insert_id";
            $set_status_q = mysqli_query($data, $set_status);
            if ($set_status_q) {
                header('location:offices.php');
                $_SESSION['sub_add'] = " Added Sucessfully";
            }
        }
    }
} else {
    header('location:primary-office-add.php');
}
