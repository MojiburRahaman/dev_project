<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:reviews.php');
    } elseif (isset($_POST['submit'])) {
        require_once "session.php";
        require_once "../data.php";

        $id = $_SESSION['review_edit'];
        $img = $_FILES['review']['name'];
        $img_expld = explode('.', $img);
        $ext = end($img_expld);
        $formate = ['jpg', 'png'];

        if (empty($img)) {
            header('location:review-edit.php?id='.$id);
        } elseif (!in_array($ext, $formate)) {
            header('location:review-edit.php?id='.$id);
        } else {
        //   $test =  mysqli_last_insert_id($data);
            // $id = mysqli_insert_id($data);
            $image_id = rand(0 , 10000);
            $img_name = $image_id . '.' . $ext;

            $image_check = "SELECT * FROM `reviews` WHERE id = $id";
            $image_query = mysqli_query($data, $image_check);
            $image_assoc = mysqli_fetch_assoc($image_query);
            $old_image = 'img-upload/review_image/' . $image_assoc['image'];
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

            $uplode_img = 'img-upload/review_image/' . $img_name;
            move_uploaded_file($_FILES['review']['tmp_name'], $uplode_img);
            $insert = "UPDATE reviews SET `image` ='$img_name' WHERE id = $id";
            $q = mysqli_query($data,$insert);
            if ($q) {
                header('location:reviews.php');
                $_SESSION['review_edit'] = "Edit Sucessfully";
            }

        }
    }
} else {
    header('location:review-edit.php');
}
