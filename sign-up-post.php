<?php
require_once 'data.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $_SESSION['name'] = $name = $_POST['name'];
  $_SESSION['email'] = $email = $_POST['email'];
  $_SESSION['password'] = $password = $_POST['pwd'];
  $_SESSION['confirm_pwd'] = $confirm_password = $_POST['confirm_pwd'];
  $email_preg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';
  $len = strlen($password);

  if (empty($name)) {
    header('location:sign-up.php');
    $_SESSION['name_err'] = '*please enter your name';
  } elseif (preg_match('/[0-9@.-]/', $name)) {
    header('location:sign-up.php');
    $_SESSION['name_alpha_err'] = '*please enter your name in alphabetic';
  } elseif (empty($email)) {
    header('location:sign-up.php');
    $_SESSION['email_err'] = '*please enter your email';

    // email validation start

  } elseif (!preg_match($email_preg, $email)) {
    header('location:sign-up.php');
    $_SESSION['email_preg_err'] = '*please enter a valid email';

    // email validation end

  } elseif (empty($password)) {
    header('location:sign-up.php');
    $_SESSION['pwd_err'] = '*please enter your password';
  } elseif (empty($confirm_password)) {
    header('location:sign-up.php');
    $_SESSION['confirm_password_err'] = '*please enter your confirmation password';

    // password validation start
  } elseif ($len <= 7) {
    header('location:sign-up.php');
    $_SESSION['pwd_value_err'] = '*password must be 8 charecter';
  } elseif (!preg_match('/[A-Z]/', $password)) {
    header('location:sign-up.php');
    $_SESSION['pwd_captial_err'] = '*please use at least one capital letter';
  } elseif (!preg_match('/[a-z]/', $password)) {
    header('location:sign-up.php');
    $_SESSION['pwd_small_err'] = '*please use at least one small letter';
  } elseif (!preg_match('/[0-9]/', $password)) {
    header('location:sign-up.php');
    $_SESSION['pwd_number_err'] = '*please use at least one numeric value';
  } elseif (!preg_match('/[-_@*?&#.,]/', $password)) {
    header('location:sign-up.php');
    $_SESSION['pwd_charecter_err'] = '*please use at least one special charecter';
    // password validation end


  } elseif ($password != $confirm_password) {
    header('location:sign-up.php');
    $_SESSION['password_confirm'] = '*password not matched';
  } else {
    //email unique validation check start

    $email_check = "SELECT COUNT(*) as total FROM users WHERE email = '$email' ";
    $email_query = mysqli_query($data, $email_check);
    $email_fetch = mysqli_fetch_assoc($email_query);
    if ($email_fetch['total'] > 0) {

      // email unique invalid message 

      header('location:sign-up.php');
      $_SESSION['email_exist'] = "Email already exist";
    } else {
      // email unique validation end and datbase store

      $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
      $insert_data = "INSERT INTO `users`( `name`, `email`, `passwords`) VALUES ('$name','$email','$password')";
      $query = mysqli_query($data, $insert_data);
      header('location:login.php');
    }
  }
} else {
  header('location:index.php');
}
?>