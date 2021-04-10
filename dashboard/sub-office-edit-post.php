<?php
require_once 'session.php';
require_once '../data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id =  $_SESSION['sub_edit_office_id'];
    $office = mysqli_real_escape_string($data, $_POST['office']);
    $number = $_POST['number'];
    $email = $_POST['email'];
    $place = $_POST['place'];
   
    if (empty($office)) {
        header('location:sub-office-edit.php?id='.$id);
    } elseif (empty($number)) {
        header('location:sub-office-edit.php?id='.$id);
    } elseif (empty($email)) {
        header('location:sub-office-edit.php?id='.$id);
    }
    elseif (empty($place)) {
        header('location:sub-office-edit.php?id='.$id);
    }
    else {
       
        $add_office = "UPDATE offices SET country ='$place' , adress ='$office', phone ='$number', email ='$email' WHERE id = $id ";
        $add_office_q = mysqli_query($data, $add_office);
       
        if ($add_office_q) {
            header('location:offices.php');
            $_SESSION['sub_office_update'] = " Edited Sucessfully";
            
        }
    }
} else {
    header('location:sub-office-edit.php');
}
?>