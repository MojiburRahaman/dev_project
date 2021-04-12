<?php
require_once "session.php";
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['portfoli_edit_id'];
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
        header('location:portfolio-edit.php?id=' . $edit_id);
    } elseif (empty($catagory)) {
        header('location:portfolio-edit.php?id=' . $edit_id);
    } elseif (empty($summary)) {
        header('location:portfolio-edit.php?id=' . $edit_id);
    } else {
        $insert = "UPDATE `portfolios` SET `title` = '$title' , `catagory` ='$catagory', `summary` = '$summary' where id = $id";
        $q = mysqli_query($data, $insert);
        if ($q) {

            if (!empty($thumbnail_img)) {
                // if thumbnail exist
                if (!in_array($thumbnail_ext, $thumbnail_formate)) {
                    header('location:portfolio-edit.php?id=' . $edit_id);
                } else {
                    // old image check query start
                    $image_check = "SELECT * FROM portfolios where id= '$id' ";
                    $image_query = mysqli_query($data, $image_check);
                    $image_assoc = mysqli_fetch_assoc($image_query);
                    $old_image = 'img-upload/portfolio_image/' . $image_assoc['thumbnail'];
                    // old image unlink
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    // image insert
                    $thumbnai_img_name = $id . '.' . $thumbnail_ext;
                    $uplod_thumb_img = 'img-upload/portfolio_image/' . $thumbnai_img_name;
                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uplod_thumb_img);
                    $insert = "UPDATE `portfolios` SET `thumbnail`='$thumbnai_img_name' WHERE id = $id";
                    $q = mysqli_query($data, $insert);
                    if ($q) {
                        // if featured also insert check
                        if (!empty($featured_img)) {

                            if (!in_array($featured_ext, $featured_formate)) {
                                header('location:portfolio-edit.php?id=' . $edit_id);
                            } else {
                                // old image check query start
                                $image_check = "SELECT * FROM portfolios where id= '$id' ";
                                $image_query = mysqli_query($data, $image_check);
                                $image_assoc = mysqli_fetch_assoc($image_query);
                                $old_image = 'img-upload/portfolio_image/featured_image/' . $image_assoc['portfolio_image'];
                                // old image unlink
                                if (file_exists($old_image)) {
                                    unlink($old_image);
                                }

                                $featured_img_name = $id . '.' . $featured_ext;
                                $uplod_featured_img = 'img-upload/portfolio_image/featured_image/' . $featured_img_name;
                                move_uploaded_file($_FILES['featured']['tmp_name'], $uplod_featured_img);
                                $insert = "UPDATE `portfolios` SET `portfolio_image`='$featured_img_name' WHERE id = $id";
                                $q = mysqli_query($data, $insert);
                                if ($q) {
                                    header('location:portfolios.php');
                                    $_SESSION['profile_edit_msg'] = "Edit Sucessfully";
                                }
                            }
                        } else {
                            header('location:portfolios.php');
                            $_SESSION['portfolio_edit_msg'] = "Edit Sucessfully";
                        }
                    }
                }
            } elseif (!empty($featured_img)) {
                if (!in_array($featured_ext, $featured_formate)) {
                    header('location:portfolio-edit.php?id=' . $edit_id);
                } else {
                    // default image check query start
                    $image_check = "SELECT * FROM portfolios where id= '$id' ";
                    $image_query = mysqli_query($data, $image_check);
                    $image_assoc = mysqli_fetch_assoc($image_query);
                    $old_image = 'img-upload/portfolio_image/featured_image/' . $image_assoc['portfolio_image'];

                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }

                    $featured_img_name = $id . '.' . $featured_ext;
                    $uplod_featured_img = 'img-upload/portfolio_image/featured_image/' . $featured_img_name;
                    move_uploaded_file($_FILES['featured']['tmp_name'], $uplod_featured_img);
                    $insert = "UPDATE `portfolios` SET `portfolio_image`='$featured_img_name' WHERE id = $id";
                    $q = mysqli_query($data, $insert);
                    if ($q) {
                        header('location:portfolios.php');
                        $_SESSION['portfolio_edit_msg'] = "Edit Sucessfully";
                    }
                }
            } else {
                header('location:portfolios.php');
                $_SESSION['portfolio_edit_msg'] = "Edit Sucessfully";
            }
        }
    }
} else {
    header('location:portfolio-edit.php');
}
