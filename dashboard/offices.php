<?php
require 'inc/header.php';
// primary office query start
$primnary_offc = "SELECT COUNT(*) total,id,adress,phone,email FROM `offices` WHERE status = 1";
$primnary_offc_q = mysqli_query($data, $primnary_offc);
$primnary_offc_assoc =  mysqli_fetch_assoc($primnary_offc_q);
// primary office query end

// sub office query start
$sub_office = "SELECT * FROM `offices` WHERE status = 2";
$sub_office_q = mysqli_query($data, $sub_office);
// sub office query end
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Offices</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <!-- warning message -->
            <div class="primay_office">
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
                                <td class="text-center"> <?= $primnary_offc_assoc['adress']; ?> </td>
                                <td class="text-center"> <?= $primnary_offc_assoc['phone']; ?></td>
                                <td class="text-center"> <?= $primnary_offc_assoc['email']; ?></td>

                                <td class="text-center">
                                    <a href="primary-office-edit.php?id=<?= $primnary_offc_assoc['id']; ?>" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php }
                ?>
            </div>
            <br>
            <br>
            <br>
            <!-- primary office address end -->

            <div class="sub_office">
                <h3 class="text-center">Sub Office Address</h3>
                <!-- sub office warning massege  -->
                <?php
                if (isset($_SESSION['sub_add'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['sub_add'];
                            unset($_SESSION['sub_add']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['sub_office_update'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['sub_office_update'];
                            unset($_SESSION['sub_office_update']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['delete_sub_office'])) { ?>
                    <div class="alert alert-danger">
                        <span>
                            <?php
                            echo  $_SESSION['delete_sub_office'];
                            unset($_SESSION['delete_sub_office']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <!-- sub office warning message end -->

                <!-- Sub office address start -->
                <div class="text-right">
                    <a href="sub-office-add.php">
                        <i class="fa fa-plus"></i>
                        Add Sub office Address
                    </a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr class="info">
                            <th style="background-color: #DC143C; color:white;" class="text-center">SL</th>
                            <th style="background-color: #DC143C; color:white;" class="text-center">Place Name</th>
                            <th style="background-color: #DC143C; color:white;" class="text-center">Sub Office Address</th>
                            <th style="background-color: #DC143C; color:white;" class="text-center">Phone</th>
                            <th style="background-color: #DC143C; color:white;" class="text-center">Email</th>
                            <th style="background-color: #DC143C; color:white;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sub_office_q as $key => $value) { ?>
                            <tr class="active">
                                <td class="text-center"> <?= ++$key; ?> </td>
                                <td class="text-center"> <?= $value['country']; ?> </td>
                                <td class="text-center"> <?= $value['adress']; ?> </td>
                                <td class="text-center"> <?= $value['phone']; ?></td>
                                <td class="text-center"> <?= $value['email']; ?></td>
                                <td class="text-center">
                                    <a href="sub-office-edit.php?sub_id=<?= $value['id']; ?>" class="btn btn-success">Edit</a> &nbsp;
                                    <a href="sub-office-delete.php?id=<?= $value['id']; ?>" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                    </tbody>
                <?php }  ?>
                </table>
            </div><!-- Sub office address end -->
        </div>
    </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';
    ?>