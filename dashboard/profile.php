<?php
require 'inc/header.php';
// profile start
$add_limit = "SELECT COUNT(*) as total,id,user_name,tagline,about,user_image FROM `profile`";
$add_q = mysqli_query($data, $add_limit);
$add_q_assoc =  mysqli_fetch_assoc($add_q);
// profile end

// education start
$education = "SELECT * FROM `educations`";
$education_q = mysqli_query($data, $education);
// education end
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
        </div>

        <!-- educations part start-->
        <div class="sl-page-title">
            <h3 class="text-center">Educations</h3>
            <!-- warning message -->
            <?php
            if (isset($_SESSION['edu_add'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['edu_add'];
                        unset($_SESSION['edu_add']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['edu_edit'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['edu_edit'];
                        unset($_SESSION['edu_edit']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <!-- warning message end -->

        
                <div class="text-right">
                    <a href="education-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>

            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th style="background-color:#D3D3D3; " class="text-center"> SL</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Title</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Year</th>
                        <th style="background-color: #D3D3D3;" class="text-center">Progress</th>
                        <th style="background-color: #D3D3D3;" class="text-center">Status</th>

                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($education_q as $key => $value){?>
                    <tr class="active">
                        <td class="text-center"> <?= ++$key?> </td>
                        <td class="text-center">
                            <?=strtoupper($value['title']); ?>
                        </td>
                        <td class="text-center"> <?= $value['year']; ?></td>
                        <td class="text-center"> <?= $value['progress']; ?></td>
                        <td class="text-center">
                        <a href="education-edit.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a> &nbsp;
                        <a href="education-delete.php?id=<?= $value['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- education part end -->

    </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';

    ?>