<?php
require 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM services where id = $id";
$services_q = mysqli_query($data, $select);
$services_assoc = mysqli_fetch_assoc($services_q);
$_SESSION['service_edit_id'] = $id;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Add Services</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <?php
            if (isset($_SESSION['profile_update_msg'])) { ?>
                <div class="alert alert-success ">
                    <span>
                        <?php
                        echo $_SESSION['profile_update_msg'];
                        unset($_SESSION['profile_update_msg']);
                        ?>
                    </span>
                </div>
            <?php }
            ?>

            <div class="form-layout">
                <form action="service-edit-post.php" method="POST">
                    <div class="row mg-b-25">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="name" value="<?= $services_assoc['name']; ?>" placeholder="Enter Name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="icon">Icon: <span class="tx-danger">*</span></label>
                                <select name="icon" id="icon" class="form-control">
                                    <option value="">
                                        <?php
                                        if ($services_assoc['icon'] == "fa fa-react") {
                                            echo "Creative Design";
                                        } elseif ($services_assoc['icon'] == "fab fa-free-code-camp") {
                                            echo "Features";
                                        } elseif ($services_assoc['icon'] == "fa fa-edit") {
                                            echo "Edit";
                                        } elseif ($services_assoc['icon'] == "fa fa-linkedin") {
                                            echo "Linkedin";
                                        } elseif ($services_assoc['icon'] == "fab fa-desktop") {
                                            echo "Desktop";
                                        }
                                        ?>
                                    </option>
                                    <option value="">Select Icon</option>
                                    <option value="fa fa-react">Creative Design</option>
                                    <option value="fab fa-free-code-camp">Features</option>
                                    <option value="fa fa-edit">Edit</option>
                                    <option value="fab fa-linkedin">LinkedIn</option>
                                    <option value="fa fa-desktop">Desktop</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="summary">Summary: <span class="tx-danger">*</span></label>
                                <textarea name="summary" id="summary"   class="form-control"><?= $services_assoc['summary']; ?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit Form</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </form><!-- form-layout -->
            </div>
            <!-- col-4 -->
        </div><!-- row -->
    </div>

    <?php
    require 'inc/footer.php';
    ?>