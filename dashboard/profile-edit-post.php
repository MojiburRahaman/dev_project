<?php
require_once"session.php";
require_once"../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $edit_id = $_SESSION['profile_edit_id'];
    $name = $_POST['name'];
    $tagline = $_POST['tagline'];
    $about = mysqli_real_escape_string($data,$_POST['about']);
    // $old= $_POST['old_user_image'];
    
//   image variable
    $img = $_FILES['user_image']['name'];
    $img_expld = explode('.', $img);
    $ext = end($img_expld);
    $formate = ['png'];

if (empty($name)) {
   header('location:profile-edit.php?id='.$edit_id);
}
elseif (empty($tagline)) {
    header('location:profile-edit.php?id='.$edit_id);
 }
 elseif (empty($about)) {
    header('location:profile-edit.php?id='.$edit_id);
 }
elseif (empty($img)) {
    $insert = "UPDATE `profile` SET `user_name` = '$name' , `tagline` ='$tagline', `about` = '$about' where id = $edit_id";
    $q = mysqli_query($data,$insert);
    if ($q) {
        header('location:profile.php');
        $_SESSION['profile_edit_msg'] = "Edit Sucessfully";
    }
}
else{
  if (!in_array($ext,$formate)) {
        header('location:profile-edit.php?id='.$edit_id);
    }
    else {

    $img_name = $id . '.' . $ext;

    // default image check query start
    $image_check = "SELECT * FROM profile where id= '$id' ";
    $image_query = mysqli_query($data, $image_check);
    $image_assoc = mysqli_fetch_assoc($image_query);
    $old_image = 'img-upload/user_image/' . $image_assoc['user_image'];


    if ($image_assoc['user_image'] != 'user_default_image.png') {

        if (file_exists($old_image)) {
            unlink($old_image);
        }
    }
    // default image check query end

    $uplode_img = 'img-upload/user_image/' . $img_name;
    move_uploaded_file($_FILES['user_image']['tmp_name'], $uplode_img);
    $insert = "UPDATE `profile` SET `user_name` = '$name' , `tagline` ='$tagline', `about` = '$about' ,`user_image` = '$img_name' WHERE id = $edit_id";
    $q = mysqli_query($data,$insert);
    if ($q) {
        header('location:profile.php');
        $_SESSION['profile_edit_msg'] = "Edit Sucessfully";
    }
    
    }
    
}


}
else{
    header('location:profile-add.php');
}

?>
