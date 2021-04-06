<?php
require_once 'session.php';
require_once '../data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $old_pwd = $_POST['current_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $cnfrm_new_pwd = $_POST['confirm_new_pwd'];
    $len = strlen($new_pwd);
    $id = $_SESSION['id'];

    // current password database query start

    $select = "SELECT COUNT(*) as total, id, passwords FROM `users` WHERE `id`= '$id' ";
    $query = mysqli_query($data, $select);
    $query_assoc = mysqli_fetch_assoc($query);
    $hash_old_pwd = $query_assoc['passwords'];

    // current password database query start
   

    if (empty($old_pwd)) {
        header('location:change-password.php');
        $_SESSION['old_pass_empty'] = '*Please Enter Your Current Password';
    } elseif (!password_verify($old_pwd, $hash_old_pwd)) {
        header('location:change-password.php');
        $_SESSION['old_pass_match_err'] = '*Current Password not matched';
    } elseif (empty($new_pwd)) {
        header('location:change-password.php');
        $_SESSION['new_pass_empty'] = '*Please Enter Your New Password';
    }
    // password validation start

    elseif ($len <= 7) {
        header('location:change-password.php');
        $_SESSION['new_pwd_value_err'] = '*password must be 8 charecter';
    } elseif (!preg_match('/[A-Z]/', $new_pwd)) {
        header('location:change-password.php');
        $_SESSION['new_pwd_captial_err'] = '*please use at least one capital letter';
    } elseif (!preg_match('/[a-z]/', $new_pwd)) {
        header('location:change-password.php');
        $_SESSION['new_pwd_small_err'] = '*please use at least one small letter';
    } elseif (!preg_match('/[0-9]/', $new_pwd)) {
        header('location:change-password.php');
        $_SESSION['new_pwd_number_err'] = '*please use at least one numeric value';
    } elseif (!preg_match('/[-_@*?&#.,]/', $new_pwd)) {
        header('location:change-password.php');
        $_SESSION['new_pwd_charecter_err'] = '*please use at least one special charecter';

        // password validation end
    } 
    elseif (empty($cnfrm_new_pwd)) {
        header('location:change-password.php');
        $_SESSION['confirm_new_pass_empty'] = '*Please Enter Your New Password';
    } 
    elseif ($new_pwd != $cnfrm_new_pwd) {
        header('location:change-password.php');
        $_SESSION['new_password_confirm'] = '*password not matched';
    } else {
        $password = password_hash($new_pwd, PASSWORD_DEFAULT);
        
        // password update query
        
        $update_pass = "UPDATE `users` SET `passwords`= '$password' WHERE id = $id ";
        $pwd_update= mysqli_query($data,$update_pass);
        if ($pwd_update) {
            header('location:change-password.php');
            $_SESSION['pwd_update'] = 'Password Change Successfully';
        }
    }
} else {
    header('location:dashboard.php');
}
