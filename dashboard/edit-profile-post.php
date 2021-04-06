<?php
require_once 'session.php';
require_once '../data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email_preg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';

    // image variables
    $img = $_FILES['profile_pic']['name'];
    $img_expld = explode('.', $img);
    $ext = end($img_expld);
    $formate = ['jpg', 'png', 'gif', 'jpeg'];

    if (empty($name)) {
        // edit name empty check
        header('location:edit-profile.php');
    } elseif (empty($email)) {
        // edit email empty check
        header('location:edit-profile.php');
    } elseif (!preg_match($email_preg, $email)) {
        // edit email valid check
        header('location:edit-profile.php');
    } elseif (!in_array($ext, $formate)) {
        header('location:edit-profile.php');
    } else {

        $img_name = $id . '.' . $ext;

        // default image check query start
        $image_check = "SELECT * FROM users where id= '$id' ";
        $image_query = mysqli_query($data, $image_check);
        $image_assoc = mysqli_fetch_assoc($image_query);
        $old_image = 'img-upload/' . $image_assoc['profile_img'];


        if ($image_assoc['profile_img'] != 'default.png') {

            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
        // default image check query end

        $uplode_img = 'img-upload/' . $img_name;
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $uplode_img);

        $update_user_profile = "UPDATE `users` SET `name`= '$name',`email`='$email', `profile_img`='$img_name' WHERE id = $id ";

        if (mysqli_query($data, $update_user_profile)) {
            $_SESSION['name'] = $name;
            $_SESSION['profile_update_msg'] = 'Profile Update Successfully';
            header('location:edit-profile.php');
        }
    }
} else {
    header('location:dashboard.php');
}