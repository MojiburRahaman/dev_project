<?php
require 'inc/header.php';

$portfolio = "SELECT * FROM `portfolios` WHERE status = 1";
$portfolio_q = mysqli_query($data, $portfolio);
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
            <div class="text-right">
                <a href="portfolio-add.php">
                    <i class="fa fa-plus"></i>
                    add
                </a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th style="background-color:#D3D3D3; " class="text-center"> SL</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Catagory</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Title</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Thumbnail</th>
                        <th style="background-color: #D3D3D3; " class="text-center">Featured Image</th>
                        <th style="background-color: #D3D3D3;" class="text-center">Summary</th>
                        <th style="background-color: #D3D3D3;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($portfolio_q as $key => $value) {
                    ?>
                        <tr class="active">
                            <td> <?= ++$key; ?> </td>
                            <td class="text-center"> <?= $value['catagory']; ?> </td>
                            <td class="text-center">
                                <?= $value['title']; ?>
                            </td>
                            <td class="text-center">
                                <img width="30" src="img-upload/portfolio_image/<?= $value['thumbnail']; ?>" alt="">
                            </td>
                            <td class="text-center">
                                <img width="30" src="img-upload/portfolio_image/featured_image/<?= $value['portfolio_image']; ?>" alt="">
                            </td>

                            <td>
                                <?= $value['summary']; ?>
                            </td>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="portfolio-edit.php?id=<?= $value['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="portfolio-delete.php?id=<?= $value['id']; ?>">Delet</a>
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