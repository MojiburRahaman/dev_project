<?php
require_once "session.php";
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $catagory = $_POST['catagory'];
    $summary = mysqli_real_escape_string($data, $_POST['summary']);

    //  thumb image variable
    $thumbnail_img = $_FILES['thumbnail']['name'];
    $thumbnail_img_expld = explode('.', $thumbnail_img);
    $thumbnail_ext = end($thumbnail_img_expld);
    $thumbnail_formate = ['jpg', 'png'];

    //  thumb image variable
    $featured_img = $_FILES['featured']['name'];
    $featured_img_expld = explode('.', $featured_img);
    $featured_ext = end($featured_img_expld);
    $featured_formate = ['jpg', 'png'];

    if (empty($title)) {
        header('location:portfolio-add.php');
    } elseif (empty($catagory)) {
        header('location:portfolio-add.php');
    } elseif (empty($summary)) {
        header('location:portfolio-add.php');
    } elseif (!in_array($thumbnail_ext, $thumbnail_formate)) {
        header('location:portfolio-add.php');
    } elseif (!in_array($featured_ext, $featured_formate)) {
        header('location:portfolio-add.php');
    } else {
        $insert = "INSERT INTO portfolios (`title`,`catagory`,`summary`) VALUES ('$title','$catagory','$summary')";
        $q = mysqli_query($data, $insert);
        if ($q) {
            $id = mysqli_insert_id($data);

            // thumbnail image move
            $thumbnai_img_name = $id . '.' . $thumbnail_ext;
            $uplod_thumb_img = 'img-upload/portfolio_image/' . $thumbnai_img_name;
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uplod_thumb_img);

            // featured image move
            $featured_img_name = $id . '.' . $featured_ext;
            $uplod_featured_img = 'img-upload/portfolio_image/featured_image/' . $featured_img_name;
            move_uploaded_file($_FILES['featured']['tmp_name'], $uplod_featured_img);
            
            $update_pic = "UPDATE portfolios SET thumbnail = '$thumbnai_img_name' , portfolio_image='$featured_img_name' WHERE id =  $id";
            $pic_q = mysqli_query($data, $update_pic);
            if ($pic_q) {
                header('location:portfolios.php');
                $_SESSION['profile_add_msg'] = "Added Sucessfully";
            }
        }
    }
} else {
    header('location:portfolio-add.php');
}
