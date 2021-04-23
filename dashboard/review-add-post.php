<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:reviews.php');
    } elseif (isset($_POST['submit'])) {
        require_once "session.php";
        require_once "../data.php";

        $img = $_FILES['review']['name'];
        $img_expld = explode('.', $img);
        $ext = end($img_expld);
        $formate = ['jpg', 'png'];

        if (empty($img)) {
            header('location:review-add.php');
        } elseif (!in_array($ext, $formate)) {
            header('location:review-add.php');
        } else {
            $id = rand(0 , 10000);
            $img_name = $id . '.' . $ext;
            $uplode_img = 'img-upload/review_image/' . $img_name;
            move_uploaded_file($_FILES['review']['tmp_name'], $uplode_img);
            $insert = "INSERT INTO reviews (`image`) VALUES ('$img_name')";
            $q = mysqli_query($data,$insert);
            if ($q) {
                header('location:reviews.php');
                $_SESSION['review_add'] = "Added Sucessfully";
            }

        }
    }
} else {
    header('location:review-add.php');
}
