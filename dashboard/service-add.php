<?php
require 'inc/header.php';
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
                <form action="service-add-post.php" method="POST">
                    <div class="row mg-b-25">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="icon">Icon: <span class="tx-danger">*</span></label>
                                <select name="icon" id="icon" class="form-control">
                                    <option value="">Select Icon</option>
                                    <option value="fa fa-react">Creative Design</option>
                                    <option value="fab fa-free-code-camp">Features</option>
                                    <option value="fa fa-edit">Edit</option>
                                    <option value="fa fa-linkedin">LinkedIn</option>
                                    <option value="fa fa-desktop">Github</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="summary">Summary: <span class="tx-danger">*</span></label>
                                <textarea name="summary" id="summary" class="form-control"></textarea>
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