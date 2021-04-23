<?php
require 'inc/header.php';
// services_query
$select_data = "SELECT * FROM `services`";
$data_query = mysqli_query($data, $select_data);

// feature query
$feature = "SELECT COUNT(*) as total,id,feature_item,active_product,year,client FROM `features`";
$feature_q = mysqli_query($data, $feature);
$feature_assoc = mysqli_fetch_assoc($feature_q);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">All Service List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="service">
                <!-- service part start -->
                <!-- warning message -->
                <?php
                if (isset($_SESSION['service_update'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['service_update'];
                            unset($_SESSION['service_update']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['service_edit_update'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['service_edit_update'];
                            unset($_SESSION['service_edit_update']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['service_active'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['service_active'];
                            unset($_SESSION['service_active']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['service_inactive'])) { ?>
                    <div class="alert alert-warning ">
                        <span>
                            <?php
                            echo  $_SESSION['service_inactive'];
                            unset($_SESSION['service_inactive']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['delete_service'])) { ?>
                    <div class="alert alert-danger ">
                        <span>
                            <?php
                            echo  $_SESSION['delete_service'];
                            unset($_SESSION['delete_service']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <h3 class="text-center">All Service List</h3>
                <div class="text-right">
                    <a href="service-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="info">
                            <th>SL</th>
                            <th>Name</th>
                            <th class="text-center">Icon</th>
                            <th>Summary</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_query as $key => $value) { ?>
                            <tr class="active">
                                <td> <?= ++$key; ?> </td>
                                <td> <?= $value['name']; ?> </td>
                                <td class="text-center">
                                    <i class="<?= $value['icon']; ?>"></i>
                                </td>
                                <td> <?= $value['summary']; ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($value['status'] == 1) { ?>
                                        <a href="service-inactive.php?id=<?= $value['id']; ?>" class=" btn btn-success">Active </a>
                                    <?php }
                                    ?>
                                    <?php
                                    if ($value['status'] == 2) { ?>
                                        <a href="service-active.php?id=<?= $value['id']; ?>" class=" btn btn-warning">Inctive </a>
                                    <?php }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="service-edit.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="service-delete.php?id=<?= $value['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
            <!-- service part end -->





            <div class="service_list">
                <h3 class="text-center">Feature Item and Products</h3>
                <!-- warning message -->
                <?php
                if (isset($_SESSION['feature_add'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['feature_add'];
                            unset($_SESSION['feature_add']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['feature_edit'])) { ?>
                    <div class="alert alert-success ">
                        <span>
                            <?php
                            echo  $_SESSION['feature_edit'];
                            unset($_SESSION['feature_edit']);
                            ?>
                        </span>
                    </div>
                <?php  }
                ?>
                <?php
                if ($feature_assoc['total'] < 1) { ?>
                    <div class="text-right">
                        <a href="features-add.php">
                            <i class="fa fa-plus"></i>
                            add feature item and product
                        </a>
                    </div>
                <?php } else {
                ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="info">
                                <th class="text-center">Featured Item</th>
                                <th class="text-center">Active Products</th>
                                <th class="text-center">Year Experience</th>
                                <th class="text-center">Our Client</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td class="text-center"> <?= $feature_assoc['feature_item']; ?> </td>
                            <td class="text-center"><?= $feature_assoc['active_product']; ?></td>
                            <td class="text-center"> <?= $feature_assoc['year']; ?></td>
                            <td class="text-center"> <?= $feature_assoc['client']; ?></td>
                            <td class="text-center">
                                <a href="feature-edit.php?id=<?= $feature_assoc['id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                <?php }
                ?>
            </div>
        </div>
        <!-- active user list end -->
    </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';

    ?>