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
            <h5>Add Social</h5>
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
                <form action="social-add-post.php" method="POST">
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
                                    <option value="fab fa-facebook">Facebook</option>
                                    <option value="fab fa-twitter">Twitter</option>
                                    <option value="fab fa-instagram">Instagram</option>
                                    <option value="fab fa-linkedin">LinkedIn</option>
                                    <option value="fab fa-Github">Github</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="link">Link: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="link" placeholder="Enter Link" name="link">
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