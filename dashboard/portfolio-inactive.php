<?php
require_once '../data.php';
session_start();
$id = $_GET['id'];

$inactive_status = "UPDATE `portfolios` SET `status`= 2 WHERE id = $id ";

if (mysqli_query($data,$inactive_status)) {
   header('location:portfolios.php');
   $_SESSION['portfolio_inactive'] = "Inactive Suceessfully";
}

?>