<?php
require_once 'session.php';
require_once '../data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $office = mysqli_real_escape_string($data, $_POST['office']);
    $number = $_POST['number'];
    $email = $_POST['email'];

// if already insert a table 
// $primnary_offc = "SELECT COUNT(*) total FROM `offices` WHERE status = 1";
// $primnary_offc_q = mysqli_query($data, $primnary_offc);
// $primnary_offc_assoc =  mysqli_fetch_assoc($primnary_offc_q); 

    if (empty($office)) {
        header('location:primary-office-add.php');
    } elseif (empty($number)) {
        header('location:primary-office-add.php');
    } elseif (empty($email)) {
        header('location:primary-office-add.php');
    }
    // elseif ($primnary_offc_assoc['total'] > 0) {
    //     header('location:offices.php');
    // } 
    else {
        $add_office = "INSERT INTO offices (adress,phone,email) VALUES ( '$office','$number','$email' ) SET status = 2";
        $add_office_q = mysqli_query($data, $add_office);
        if ($add_office_q) {
            header('location:offices.php');
            $_SESSION['primary_add'] = " Added Sucessfully";
        }
    }
} else {
    header('location:primary-office-add.php');
}
?>