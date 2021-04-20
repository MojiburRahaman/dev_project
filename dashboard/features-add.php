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
            <h5>Add Feature Item And Product</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="feature-add-post.php" method="POST">
                    <div class="row mg-b-25">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="item">Feature Item: <span class="tx-danger">*</span></label>
                                <input type="number" class="form-control" id="item" placeholder="Enter Feature Item" name="feature">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="product">Active Products: <span class="tx-danger">*</span></label>
                                <input type="number" class="form-control" id="product" placeholder="Enter Active Product" name="product">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="year">Year Experience: <span class="tx-danger">*</span></label>
                                <input type="number" class="form-control" id="year" placeholder="Enter Year Experience" name="year">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="client">Our Clients: <span class="tx-danger">*</span></label>
                                <input type="number" class="form-control" id="client" placeholder="Enter Our Clientse" name="client">
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button name="submit" class="btn btn-info mg-r-5">Submit Form</button>
                        <button name="cancel" class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </form><!-- form-layout -->
            </div>
            <!-- col-4 -->
        </div><!-- row -->
    </div>
</div>

<?php
require 'inc/footer.php';
?>