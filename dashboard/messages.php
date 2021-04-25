<?php
require 'inc/header.php';

$select_data = "SELECT * FROM `message`";
$data_query = mysqli_query($data, $select_data);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Messages</span>
        
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h3 class="text-center">Messages</h3>
            <?php
            if (isset($_SESSION['dlt_message'])) { ?>
                <div class="alert alert-danger ">
                    <span>
                        <?php
                        echo  $_SESSION['dlt_message'];
                        unset($_SESSION['dlt_message']);
                        ?>
                    </span>
                </div>
            <?php  }
            ?>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr class="info">
                        <th class="text-center">SL</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Message</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_query as $key => $value) { ?>
                        <tr class="active" <?php
                                            if ($value['status'] == 1) { ?> style="font-weight: bold;background-color:rgb(225 227 228);" <?php }
                                                                                                                                    ?>>
                            <td class="text-center"> <?= ++$key; ?> </td>
                            <td class="text-center"> <?= $value['name']; ?> </td>
                            <td class="text-center"> <?= $value['email']; ?> </td>
                            <td class="text-center"> <?= $value['message']; ?> </td>
                            <td class="text-center">
                                <?php
                                if ($value['status'] == 1) { ?>
                                    <a href="message-read.php?id=<?= $value['id']; ?>" class=" btn btn-primary">Unread</a>
                                <?php }
                                ?>
                                <?php
                                if ($value['status'] == 2) { ?>
                                    <a href="message-unread.php?id=<?= $value['id']; ?>" class=" btn btn-success">Read</a>
                                <?php }
                                ?>
                                <a href="message-delete.php?id=<?=$value['id'];?>"  class=" btn btn-danger">Delete</a>
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