<?php
require 'inc/header.php';

// inactive user data_query
$select_inactive_data = 'SELECT * FROM `users` WHERE `status` = 2';
$data_inactive_query = mysqli_query($data, $select_inactive_data);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">All Inactive Users</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <!-- warning message -->
            <?php
            if (isset($_SESSION['usr_active'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['usr_active'];
                        unset($_SESSION['usr_active']);
                        ?>
                    </span>
                </div>

            <?php  }
            ?>

            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr class="warning">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_inactive_query as $key => $value) { ?>
                        <tr class="danger">
                            <td> <?= ++$key; ?> </td>
                            <td> <?= $value['name']; ?> </td>
                            <td> <?= $value['email']; ?></td>
                            <td>
                            <img width="60" src="img-upload/<?= $value['profile_img']; ?>" >
                            </td>
                            <td class="text-center">
                                <a href="user_active.php?user_id=<?= $value['id']; ?>" class="btn btn-warning">Inactive</a>
                            </td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<!-- active user list end -->
<?php
require 'inc/footer.php';
?>