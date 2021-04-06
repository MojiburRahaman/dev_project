<?php
require 'inc/header.php';

$select_data = "SELECT * FROM `socials`";
$data_query = mysqli_query($data, $select_data);

$total_data = "SELECT COUNT(*) as total FROM `socials`";
$q = mysqli_query($data, $total_data);
$q_assoc = mysqli_fetch_assoc($q);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">All Social List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">

            <!-- warning message start -->
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
                <div class="alert alert-danger ">
                    <span>
                        <?php
                        echo  $_SESSION['delete_social'];
                        unset($_SESSION['delete_social']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['social_inactive'])) { ?>
                <div class="alert alert-warning ">
                    <span>
                        <?php
                        echo  $_SESSION['social_inactive'];
                        unset($_SESSION['social_inactive']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['social_active'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['social_active'];
                        unset($_SESSION['social_active']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <!-- warning message end -->
            <h3 class="text-center">All Social List</h3>

            <!-- max add limitation start -->
            <?php
            if ($q_assoc['total'] < 5) { ?>
                <div class="text-right">
                    <a href="social-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
            <?php }
            else { ?>
                <div class="text-right">
                    <span class="tx-danger">*Maximum Add Limit 5</span>
                </div>
            <?php }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th>SL</th>
                        <th>Name</th>
                        <th class="text-center">Icon</th>
                        <th>Link</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_query as $key => $value) { ?>
                        <tr class="active">
                            <td> <?= ++$key; ?> </td>
                            <td> <?= ucfirst($value['name']); ?> </td>
                            <td class="text-center">
                                <i class="<?= $value['icon'] ?>"></i>
                            </td>
                            <td><?=$value['link'];?></td>
                            <td class="text-center">
                                <?php
                                if ($value['status'] == 1) { ?>
                                    <a href="social-inactive.php?id=<?= $value['id']; ?>" class=" btn btn-success">Active</a>
                                <?php }
                                ?>
                                <?php
                                if ($value['status'] == 2) { ?>
                                    <a href="social-active.php?id=<?= $value['id']; ?>" class=" btn btn-warning">Inctive</a>
                                <?php }
                                ?>


                            </td>
                            <td class="text-center">
                                <a href="social-edit.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a> &nbsp;
                                <a href="social-delete-post.php?id=<?= $value['id']; ?>" class="btn btn-danger">Delete</a>
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