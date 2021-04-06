<?php
require_once '../data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = $_SESSION['user_id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $email_preg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';

   if (empty($name)) {
      // edit name empty check
      header('location:user-edit.php?user_edit_id=' . $id);
   } elseif (empty($email)) {
      // edit email empty check
      header('location:user-edit.php?user_edit_id=' . $id);
   } elseif (!preg_match($email_preg, $email)) {
      // edit email valid check
      header('location:user-edit.php?user_edit_id=' . $id);
   } else {
      $update_edit_status = "UPDATE `users` SET `name`= '$name',`email`='$email' WHERE id = $id ";

      if (mysqli_query($data, $update_edit_status)) {
         header('location:user-active-list.php');
         $_SESSION['usr_update'] = "User Updated Suceessfully";
      }
   }
} else {
   header('location:user-edit.php');
}

?>