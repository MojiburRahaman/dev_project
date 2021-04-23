<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:partners.php');
    } elseif (isset($_POST['submit'])) {
        require_once "session.php";
        require_once "../data.php";

        $id = $_SESSION['partner_edit_id'];
        $img = $_FILES['logo']['name'];
        $img_expld = explode('.', $img);
        $ext = end($img_expld);
        $formate = ['png'];

        if (empty($img)) {
            header('location:partner-edit.php?id='.$id);
        } elseif (!in_array($ext, $formate)) {
            header('location:partner-edit.php?id='.$id);
        } else {
            $image_id = rand(0 , 10000);
            $img_name = $image_id . '.' . $ext;

            $image_check = "SELECT * FROM `partners` WHERE id = $id";
            $image_query = mysqli_query($data, $image_check);
            $image_assoc = mysqli_fetch_assoc($image_query);
            $old_image = 'img-upload/partner_company/' . $image_assoc['image'];
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

            $uplode_img = 'img-upload/partner_company/' . $img_name;
            move_uploaded_file($_FILES['logo']['tmp_name'], $uplode_img);
            $insert = "UPDATE partners SET `image` ='$img_name' WHERE id = $id";
            $q = mysqli_query($data,$insert);
            if ($q) {
                header('location:partners.php');
                $_SESSION['partner_edited'] = "Edit Sucessfully";
            }

        }
    }
} else {
    header('location:partner-edit.php');
}
