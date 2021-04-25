<?php
require_once "session.php";
require_once "../data.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        header('location:general-settings.php');
    } 
    elseif (isset($_POST['submit'])) {
        $logo = $_FILES['logo']['name'];
        $logo_img_expld = explode('.', $logo);
        $logo_ext = end($logo_img_expld);
        $logo_formate = ['png'];

        $copyright = $_POST['copyright'];

        if (empty($copyright)) {
            header('location:general-add.php');
        } elseif (!in_array($logo_ext, $logo_formate)) {
            header('location:general-add.php');
        } else {
            $logo_img_name = rand(1, 20) . '.' . $logo_ext;
            $uplod_logo_img = 'img-upload/logo/' . $logo_img_name;
            move_uploaded_file($_FILES['logo']['tmp_name'], $uplod_logo_img);

            $insert = "INSERT INTO general (`logo`,`copyright`) VALUES ('$logo_img_name','$copyright')";
            $q = mysqli_query($data, $insert);
            if ($q) {
                header('location:general-settings.php');
                $_SESSION['general_add'] = "Added Sucessfully";
            }
        }
    }
}

else{
    header('location:general-add.php');
}
?>