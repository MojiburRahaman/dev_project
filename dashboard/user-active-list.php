<?php
require 'inc/header.php';
// active user data_query
$select_data = 'SELECT * FROM `users` WHERE `status` = 1';
$data_query = mysqli_query($data, $select_data);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">All active Users</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <!-- warning message -->
            <?php
            if (isset($_SESSION['usr_inactive'])) { ?>
                <div class="alert alert-warning ">
                    <span>
                        <?php
                        echo  $_SESSION['usr_inactive'];
                        unset($_SESSION['usr_inactive']);
                        ?>
                    </span>
                </div>

            <?php  }
            ?>
            <?php
            if (isset($_SESSION['usr_update'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo  $_SESSION['usr_update'];
                        unset($_SESSION['usr_update']);
                        ?>
                    </span>
                </div>

            <?php  }
            ?>
            <?php
            if (isset($_SESSION['delete_user'])) { ?>
                <div class="alert alert-danger ">
                    <span>
                        <?php
                        echo  $_SESSION['delete_user'];
                        unset($_SESSION['delete_user']);
                        ?>
                    </span>
                </div>

            <?php  }
            ?>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr class="info">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_query as $key => $value) { ?>
                        <tr class="active">
                            <td> <?= ++$key; ?> </td>
                            <td> <?= $value['name']; ?> </td>
                            <td> <?= $value['email']; ?></td>
                            <td>
                            <img width="60" src="img-upload/<?= $value['profile_img']; ?>" >
                            </td>
                            <td class="text-center">
                                <?php
                                if ($value['role'] == 1) {
                                    echo 'User';
                                } elseif ($value['role'] == 2) {
                                    echo 'Employee';
                                } else {
                                    echo 'Admin';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="user_inactive.php?user_id=<?= $value['id']; ?>" class="btn btn-success">Active</a>
                            </td>
                            <td class="text-center">
                                <a href="user-edit.php?user_edit_id=<?= $value['id']; ?>" class="btn btn-primary">Edit</a> &nbsp;
                                <button data-id="<?= $value['id']; ?>" class="btn btn-danger userDelete_button">Delete</button>
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

<script type="text/javascript">
    $('.userDelete_button').click(function() {
        var delete_id = $(this).attr("data-id");
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this User!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("The User will be deleted", {
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        window.location.href = "user_delete.php?usr_dlt_id=" + delete_id;
                    }, 3000);
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    })
</script>