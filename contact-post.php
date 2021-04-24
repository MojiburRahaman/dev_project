<?php
session_start();
require_once 'data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = strip_tags($_POST['name']);
    $email = $_POST['email'];
    $message = strip_tags(mysqli_real_escape_string($data, $_POST['message']));
    $email_preg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';

    if (empty($name)) {
        header('location:index.php#contact');
    } elseif (is_numeric($name)) {
        header('location:index.php#contact'); 
    } elseif (empty($email)) {
        header('location:index.php#contact');
    } elseif (!preg_match($email_preg, $email)) {
        header('location:index.php#contact');
    } elseif (empty($message)) {
        header('location:index.php#contact');
    } else {
        $insert = "INSERT INTO message (name,email,message) VALUES ('$name','$email','$message') ";
        $q = mysqli_query($data,$insert);
        if ($q) {
            header('location:index.php#contact');
            $_SESSION['contact_done'] = '<i class="fa fa-check-circle" color="green"></i> &nbsp; Message Send Successfully';
        }
    }
} else {
    header('location:index.php#contact');
}

?>
