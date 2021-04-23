<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:partners.php');
    } elseif (isset($_POST['submit'])) {
        require_once "session.php";
        require_once "../data.php";

        $img = $_FILES['logo']['name'];
        $img_expld = explode('.', $img);
        $ext = end($img_expld);
        $formate = ['png'];

        if (empty($img)) {
            header('location:partner-add.php');
        } elseif (!in_array($ext, $formate)) {
            header('location:partner-add.php');
        } else {
            $id = rand(0 , 10000);
            $img_name = $id . '.' . $ext;
            $uplode_img = 'img-upload/partner_company/' . $img_name;
            move_uploaded_file($_FILES['logo']['tmp_name'], $uplode_img);
            $insert = "INSERT INTO partners (`image`) VALUES ('$img_name')";
            $q = mysqli_query($data,$insert);
            if ($q) {
                header('location:partners.php');
                $_SESSION['partner_add'] = "Added Sucessfully";
            }

        }
    }
} else {
    header('location:partner-add.php');
}
