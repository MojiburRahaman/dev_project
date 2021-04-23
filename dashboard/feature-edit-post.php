<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:services.php');
    } elseif (isset($_POST['submit'])) {

        require_once '../data.php';
        require_once 'session.php';
        $id = $_SESSION['feature_edit_id'];
        $item = $_POST['feature'];
        $product = $_POST['product'];
        $year = $_POST['year'];
        $client = $_POST['client'];
        if (empty($item)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (empty($product)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (empty($year)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (empty($client)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (!is_numeric($client)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (!is_numeric($year)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (!is_numeric($product)) {
            header('location:feature-edit.php?id='.$id);
        } elseif (!is_numeric($item)) {
            header('location:feature-edit.php?id='.$id);
        } else {
            $insert = "UPDATE features SET feature_item = '$item' ,active_product = '$product',year = '$year' , client= '$client' WHERE id = $id";
            $q = mysqli_query($data, $insert);
            if ($q) {
                header('location:services.php');
                $_SESSION['feature_edit'] = "Added Succesfully";
            }
        }
    }
} else {
    header('location:features-edit.php');
}
