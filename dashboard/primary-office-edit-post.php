<?php
require_once 'session.php';
require_once '../data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id =  $_SESSION['primary_edit_office_id'];
    $office = mysqli_real_escape_string($data, $_POST['office']);
    $number = $_POST['number'];
    $email = $_POST['email'];

    
    if (empty($office)) {
        header('location:primary-office-edit.php?id='.$id);
    } elseif (empty($number)) {
        header('location:primary-office-edit.php?id='.$id);
    } elseif (empty($email)) {
        header('location:primary-office-edit.php?id='.$id);
    }
    else {
        $add_office = "UPDATE offices SET adress ='$office', phone ='$number', email ='$email' WHERE id = $id ";
        $add_office_q = mysqli_query($data, $add_office);
       
        if ($add_office_q) {
            header('location:offices.php');
            $_SESSION['primary_office_update'] = " Edited Sucessfully";
        }
    }
} else {
    header('location:primary-office-add.php');
}
?>