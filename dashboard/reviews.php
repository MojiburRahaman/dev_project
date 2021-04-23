<?php
require 'inc/header.php';

$select_data = "SELECT * FROM `reviews`";
$data_query = mysqli_query($data, $select_data);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">All Reviews</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">

            <!-- warning message start -->
            <?php
            if (isset($_SESSION['review_add'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['review_add'];
                        unset($_SESSION['review_add']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['review_edit'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['review_edit'];
                        unset($_SESSION['review_edit']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['review_delete'])) { ?>
                <div class="alert alert-danger ">
                    <span>
                        <?php
                        echo  $_SESSION['review_delete'];
                        unset($_SESSION['review_delete']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['review_inactive'])) { ?>
                <div class="alert alert-warning ">
                    <span>
                        <?php
                        echo  $_SESSION['review_inactive'];
                        unset($_SESSION['review_inactive']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['review_active'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['review_active'];
                        unset($_SESSION['review_active']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <!-- warning message end -->
            <h3 class="text-center">All Review</h3>
                <div class="text-right">
                    <a href="review-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th class="text-center">SL</th>
                        <th class="text-center">Review Image</th>
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
                            <img height="200px" width="40%" src="img-upload/review_image/<?= $value['image']; ?>" alt="image">
                            </td>
                            <td class="text-center">
                                <?php
                                if ($value['status'] == 1) { ?>
                                    <a href="review-inactive.php?id=<?= $value['id']; ?>" class=" btn btn-success">Active</a>
                                <?php }
                                ?>
                                <?php
                                if ($value['status'] == 2) { ?>
                                    <a href="review-active.php?id=<?= $value['id']; ?>" class=" btn btn-warning">Inctive</a>
                                <?php }
                                ?>


                            </td>
                            <td class="text-center">
                                <a href="review-edit.php?id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a> &nbsp;
                                <a href="review_delete.php?id=<?= $value['id']; ?>" class="btn btn-danger">Delete</a>
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