<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:services.php');
    } elseif (isset($_POST['submit'])) {

        require_once '../data.php';
        require_once 'session.php';

        $item = $_POST['feature'];
        $product = $_POST['product'];
        $year = $_POST['year'];
        $client = $_POST['client'];
        if (empty($item)) {
            header('location:features-add.php');
        }
        elseif (empty($product)) {
            header('location:features-add.php');
        }
        elseif (empty($year)) {
            header('location:features-add.php');
        }
        elseif(empty($client)) {
            header('location:features-add.php');
        }
        elseif(!is_numeric($client)) {
            header('location:features-add.php');
        }
        elseif(!is_numeric($year)) {
            header('location:features-add.php');
        }
        elseif(!is_numeric($product)) {
            header('location:features-add.php');
        }
        elseif(!is_numeric($item)) {
            header('location:features-add.php');
        }

else {
    $insert = "INSERT INTO features (`feature_item`, `active_product`, `year`, `client`) VALUES ('$item','$product','$year','$client')" ;
    $q = mysqli_query($data,$insert);
    if ($q) {
        header('location:services.php');
        $_SESSION['feature_add'] = "Added Succesfully";
    }
}





    }
} else {
    header('location:features-add.php');
}
?>