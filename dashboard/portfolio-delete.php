<?php
require_once '../data.php';
session_start();
$id = $_GET['id'];

$inactive_status = "DELETE FROM `portfolios` WHERE id = $id ";

if (mysqli_query($data,$inactive_status)) {
   header('location:portfolios.php');
   $_SESSION['portfolio_delete'] = "Deleted Suceessfully";
}

?>