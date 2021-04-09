<?php
require 'inc/header.php';
// active user data_query
$primnary_offc = "SELECT COUNT(*) total,id,adress,phone,email FROM `offices` WHERE status = 1";
$primnary_offc_q = mysqli_query($data, $primnary_offc);
$primnary_offc_assoc =  mysqli_fetch_assoc($primnary_offc_q);

$sub_office = "SELECT COUNT(*) total,id,adress,phone,email FROM `offices` WHERE status = 2";
$sub_office_q = mysqli_query($data, $primnary_offc);
$sub_office_assoc =  mysqli_fetch_assoc($primnary_offc_q);
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
            <div>
                <?php
                if (isset($_SESSION['primary_add'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['primary_add'];
                            unset($_SESSION['primary_add']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['primary_office_update'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['primary_office_update'];
                            unset($_SESSION['primary_office_update']);
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

                <!-- primary office address start -->
                <h3 class="text-center">Office Address</h3>
                <?php
                if ($primnary_offc_assoc['total'] < 1) { ?>
                    <div class="text-right">
                        <a href="primary-office-add.php">
                            <i class="fa fa-plus"></i>
                            Add Primary office Address
                        </a>
                    </div>
                <?php } else { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="info">
                                <th style="background-color: #DC143C; color:white;" class="text-center">Primary Office Address</th>
                                <th style="background-color: #DC143C; color:white;" class="text-center">Phone</th>
                                <th style="background-color: #DC143C; color:white;" class="text-center">Email</th>

                                <th style="background-color: #DC143C; color:white;" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="active">
                                <td> <?= $primnary_offc_assoc['adress']; ?> </td>
                                <td> <?= $primnary_offc_assoc['phone']; ?></td>
                                <td> <?= $primnary_offc_assoc['email']; ?></td>

                                <td class="text-center">
                                    <a href="primary-office-edit.php?id=<?= $primnary_offc_assoc['id']; ?>" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php }
                ?>
            </div>
            <!-- primary office address start -->

            <div>
                <?php
                if (isset($_SESSION['primary_add'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['primary_add'];
                            unset($_SESSION['primary_add']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['primary_office_update'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['primary_office_update'];
                            unset($_SESSION['primary_office_update']);
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

                <!-- primary office address start -->
                <h3 class="text-center">Sub Office Address</h3>
                <div class="text-right">
                    <a href="sub-office-add.php">
                        <i class="fa fa-plus"></i>
                        Add Sub office Address
                    </a>
                </div>
                <?php
                if ($sub_office_assoc['total'] > 0) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="info">
                                <th style="background-color: #DC143C; color:white;" class="text-center">Primary Office Address</th>
                                <th style="background-color: #DC143C; color:white;" class="text-center">Phone</th>
                                <th style="background-color: #DC143C; color:white;" class="text-center">Email</th>
                                <th style="background-color: #DC143C; color:white;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="active">
                                <td> <?= $sub_office_assoc['adress']; ?> </td>
                                <td> <?= $sub_office_assoc['phone']; ?></td>
                                <td> <?= $sub_office_assoc['email']; ?></td>
                                <td class="text-center">
                                    <a href="primary-office-edit.php?id=<?= $sub_office_assoc['id']; ?>" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php }
                ?>
            </div>
        </div><!-- active user list end -->
    </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';

    ?>