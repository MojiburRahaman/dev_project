<?php
require 'inc/header.php';

$select_data = "SELECT * FROM `partners`";
$data_query = mysqli_query($data, $select_data);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">All Partners</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">

            <!-- warning message start -->
            <?php
            if (isset($_SESSION['partner_add'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['partner_add'];
                        unset($_SESSION['partner_add']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['partner_edited'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['partner_edited'];
                        unset($_SESSION['partner_edited']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['dlt_partners'])) { ?>
                <div class="alert alert-danger ">
                    <span>
                        <?php
                        echo  $_SESSION['dlt_partners'];
                        unset($_SESSION['dlt_partners']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['partner_inactive'])) { ?>
                <div class="alert alert-warning ">
                    <span>
                        <?php
                        echo  $_SESSION['partner_inactive'];
                        unset($_SESSION['partner_inactive']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['partner_active'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['partner_active'];
                        unset($_SESSION['partner_active']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <!-- warning message end -->
            <h3 class="text-center">All Partners</h3>
                <div class="text-right">
                    <a href="partner-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th class="text-center">SL</th>
                        <th class="text-center">Partner Company Logo</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_query as $key => $value) { ?>
                        <tr class="active">
                            <td class="text-center"> <?= ++$key; ?> </td>
                            <td class="text-center" >
                            <img width="40%" src="img-upload/partner_company/<?= $value['image']; ?>" alt="image">
                            </td>
                            <td class="text-center">
                                <?php
                                if ($value['status'] == 1) { ?>
                                    <a href="partner-inactive.php?id=<?= $value['id']; ?>" class=" btn btn-success">Active</a>
                                <?php }
                                ?>
                                <?php
                                if ($value['status'] == 2) { ?>
                                    <a href="partner-active.php?id=<?= $value['id']; ?>" class=" btn btn-warning">Inctive</a>
                                <?php }
                                ?>


                            </td>
                            <td class="text-center">
                                <a href="partner-edit.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a> &nbsp;
                                <a href="partner_delete.php?id=<?= $value['id']; ?>" class="btn btn-danger">Delete</a>
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