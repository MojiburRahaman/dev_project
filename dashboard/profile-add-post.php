<?php
require_once"session.php";
require_once"../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $tagline = $_POST['tagline'];
    $about = $_POST['about'];
    
//   image variable
    $img = $_FILES['user_image']['name'];
    $img_expld = explode('.', $img);
    $ext = end($img_expld);
    $formate = ['jpg','png'];

if (empty($name)) {
   header('location:profile-add.php');
}
elseif (empty($tagline)) {
    header('location:profile-add.php');
 }
 elseif (empty($about)) {
    header('location:profile-add.php');
 }
if (!in_array($ext,$formate)) {
    header('location:profile-add.php');
    $_SESSION['image_ext_err'] = "*Put a image in png formate";
}
else{
   
    $img_name = $id . '.' . $ext;

    $uplode_img = 'img-upload/user_image/' . $img_name;
    move_uploaded_file($_FILES['user_image']['tmp_name'], $uplode_img);
    $insert = "INSERT INTO profile (`user_name`,`tagline`,`about`,`user_image`) VALUES ('$name','$tagline','$about','$img_name')";
    $q = mysqli_query($data,$insert);
    if ($q) {
        header('location:profile.php');
        $_SESSION['profile_add_msg'] = "Added Sucessfully";
    }
    
}


}
else{
    header('location:profile-add.php');
}

?>
