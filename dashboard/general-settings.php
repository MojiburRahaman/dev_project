<?php
require 'inc/header.php';

$genral = "SELECT COUNT(*) as total,id,logo,copyright FROM `general`";
$genral_q = mysqli_query($data, $genral);
$genral_asoc =  mysqli_fetch_assoc($genral_q);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">General Settings</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <!-- warning message -->
            <?php
            if (isset($_SESSION['general_add'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['general_add'];
                        unset($_SESSION['general_add']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <?php
            if (isset($_SESSION['general_edit'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['general_edit'];
                        unset($_SESSION['general_edit']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <!-- warning message end -->
            <h3 class="text-center">General Settings</h3>
            <?php
            if ($genral_asoc['total'] < 1) { ?>
                <div class="text-right">
                    <a href="general-add.php">
                        <i class="fa fa-plus"></i>
                        add
                    </a>
                </div>
            <?php } else {
            ?>

                <table class="table table-bordered">
                    <thead>
                        <tr class="info">
                            <th style="background-color:#D3D3D3; " class="text-center"> Logo</th>
                            <th style="background-color: #D3D3D3; " class="text-center">copyright</th>
                            <th style="background-color: #D3D3D3;" class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                            <td  class="text-center"> 
                            <img src="img-upload/logo/<?= $genral_asoc['logo']; ?>" alt="">
                             </td>
                            <td class="text-center">
                                <?=$genral_asoc['copyright']; ?>
                            </td>
                            <td class="text-center">
                                <a href="general-edit.php?id=<?= $genral_asoc['id'] ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            } ?>
        </div>

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';

    ?>