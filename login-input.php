<?php
session_start();
require_once 'data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//login_form input
$email = $_POST['email'];
$password = $_POST['password'];

//   database query
$select = "SELECT COUNT(*) as total, id, name, email, passwords, role FROM `users` WHERE `email`= '$email' ";
$query = mysqli_query($data,$select);
$query_assoc = mysqli_fetch_assoc($query);
 

if ($query_assoc['total'] > 0) {
     $hash_pwd = $query_assoc['passwords'];

     if (password_verify($password,$hash_pwd)) {
         $_SESSION['email'] =$query_assoc['email'];
         $_SESSION['id'] =$query_assoc['id'];
         $_SESSION['name'] = $query_assoc['name'];
        header('location:dashboard/dashboard.php');
        
     }
     else {
         header('location:login.php');
     }
 }
 else {
    header('location:login.php');
 }

}

else {
    header('location:login.php');
}


?>