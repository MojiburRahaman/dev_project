<?php
require 'inc/header.php';
// active user data_query
$select_data = "SELECT * FROM `settings`";
$data_query = mysqli_query($data, $select_data);

$add_limit = "SELECT COUNT(*) as total FROM `settings`";
$add_q = mysqli_query($data, $add_limit);
$add_q_assoc =  mysqli_fetch_assoc($add_q);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">System Settings</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <!-- warning message -->
            <?php
            if (isset($_SESSION['social_update'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['social_update'];
                        unset($_SESSION['social_update']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['social_edit_update'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['social_edit_update'];
                        unset($_SESSION['social_edit_update']);
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
            <h3 class="text-center">System Settings</h3>
            <?php
            if ($add_q_assoc['total'] < 1) { ?>
                <div class="text-right">
                    <a href="settings-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
            <?php }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th>SL</th>
                        <th>User Name</th>
                        <th class="text-center">About</th>
                        <th>Tagline</th>
                        <th class="text-center">office Address</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Copyright</th>
                        <th class="text-center">Logo</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_query as $key => $value) { ?>
                        <tr class="active">
                            <td> <?= ++$key; ?> </td>
                            <td> <?= $value['user_name']; ?> </td>
                            <td class="text-center">
                                <?= $value['about']; ?>
                            </td>
                            <td> <?= $value['tagline']; ?></td>
                            <td> <?= $value['office_address']; ?></td>
                            <td> <?= $value['phone']; ?></td>
                            <td> <?= $value['email']; ?></td>
                            <td> <?= $value['copyright']; ?></td>
                            <td> <?= $value['logo']; ?></td>
                            <td class="text-center">
                                <a href="social-edit.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a>
                            </td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div><!-- active user list end -->
    </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';

    ?>