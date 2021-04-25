<?php
require_once "session.php";
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:general-settings.php');
    } elseif (isset($_POST['submit'])) {
        $id = $_SESSION['general_edit_id'];
        $logo = $_FILES['logo']['name'];
        $logo_img_expld = explode('.', $logo);
        $logo_ext = end($logo_img_expld);
        $logo_formate = ['png'];

        $copyright = $_POST['copyright'];

        if (empty($copyright)) {
            header('location:general-edit.php?id=' . $id);
        } elseif (empty($logo)) {
            $insert = "UPDATE general SET  copyright = '$copyright' WHERE id = $id";
            $q = mysqli_query($data, $insert);
            if ($q) {
                header('location:general-settings.php');
                $_SESSION['general_edit'] = "Edited Sucessfully";
            }
        } else {
            if (!in_array($logo_ext, $logo_formate)) {
                header('location:general-edit.php?id=' . $id);
            } else {


                // old image check query start
                $image_check = "SELECT * FROM general where id= '$id' ";
                $image_query = mysqli_query($data, $image_check);
                $image_assoc = mysqli_fetch_assoc($image_query);
                $old_image = 'img-upload/logo/' . $image_assoc['logo'];
                // old image unlink
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

                $logo_img_name = rand(1, 20) . '.' . $logo_ext;
                $uplod_logo_img = 'img-upload/logo/' . $logo_img_name;
                move_uploaded_file($_FILES['logo']['tmp_name'], $uplod_logo_img);

                $insert = "UPDATE general SET logo = '$logo_img_name' , copyright = '$copyright' WHERE id = $id";
                $q = mysqli_query($data, $insert);
                if ($q) {
                    header('location:general-settings.php');
                    $_SESSION['general_edit'] = "Edited Sucessfully";
                }
            }
        }
    }
} else {
    header('location:general-add.php');
}
?>