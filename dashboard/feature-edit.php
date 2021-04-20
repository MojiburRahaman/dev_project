<?php
require 'inc/header.php';
$id = $_GET['id'];
$feature = "SELECT * FROM `features` WHERE id = $id";
$feature_q = mysqli_query($data, $feature);
$feature_assoc = mysqli_fetch_assoc($feature_q);
$_SESSION['feature_edit_id'] = $id ;
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
                <form action="feature-edit-post.php" method="POST">
                    <div class="row mg-b-25">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="item">Feature Item: <span class="tx-danger">*</span></label>
                                <input value="<?= $feature_assoc['feature_item']; ?>" type="number" class="form-control" id="item" placeholder="Enter Feature Item" name="feature">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="product">Active Products: <span class="tx-danger">*</span></label>
                                <input value="<?= $feature_assoc['active_product']; ?>" type="number" class="form-control" id="product" placeholder="Enter Active Product" name="product">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="year">Year Experience: <span class="tx-danger">*</span></label>
                                <input value="<?= $feature_assoc['year']; ?>" type="number" class="form-control" id="year" placeholder="Enter Year Experience" name="year">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="client">Our Clients: <span class="tx-danger">*</span></label>
                                <input value="<?= $feature_assoc['client']; ?>" type="number" class="form-control" id="client" placeholder="Enter Our Clientse" name="client">
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