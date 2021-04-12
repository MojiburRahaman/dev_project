<?php
require 'inc/header.php';

$add_limit = "SELECT COUNT(*) as total,id,user_name,tagline,about,user_image FROM `profile`";
$add_q = mysqli_query($data, $add_limit);
$add_q_assoc =  mysqli_fetch_assoc($add_q);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Profile</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <!-- warning message -->
            <?php
            if (isset($_SESSION['profile_add_msg'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['profile_add_msg'];
                        unset($_SESSION['profile_add_msg']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['profile_edit_msg'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['profile_edit_msg'];
                        unset($_SESSION['profile_edit_msg']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['delete_social'])) { ?>
                <div class="alert alert-danger">
                    <span>
                        <?php
                        echo  $_SESSION['delete_social'];
                        unset($_SESSION['delete_social']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <!-- warning message end -->
            <h3 class="text-center">Profile</h3>
            <?php
            if ($add_q_assoc['total'] < 1) { ?>
                <div class="text-right">
                    <a href="profile-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
            <?php } else { ?>
                <div class="text-right">
                    <a href="profile-edit.php?id=<?= $add_q_assoc['id']; ?>">
                        <i class="fa fa-plus"></i>
                        edit
                    </a>
                </div>
            <?php }
            ?>

            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th style="background-color:#D3D3D3; " class="text-center"> User Name</th>
                        <th style="background-color: #D3D3D3; " class="text-center">About</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Tagline</th>
                        <th style="background-color: #D3D3D3;" class="text-center">User Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active">
                        <td> <?= $add_q_assoc['user_name']; ?> </td>
                        <td class="text-center">
                            <?= $add_q_assoc['about']; ?>
                        </td>
                        <td> <?= $add_q_assoc['tagline']; ?></td>
                        <td class="text-center">
                            <img width="60" src="img-upload/user_image/<?= $add_q_assoc['user_image']; ?>" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- active user list end -->
    </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';

    ?>