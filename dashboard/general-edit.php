<?php
require 'inc/header.php';
$id = $_GET['id'];
$genral = "SELECT * FROM `general` WHERE id = $id";
$genral_q = mysqli_query($data, $genral);
$genral_asoc =  mysqli_fetch_assoc($genral_q);
$_SESSION['general_edit_id'] = $id;

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Add General</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="general-edit-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="logo">Logo: <span class="tx-danger">*</span></label>
                                <input type="file" name="logo" class="form-control" id="logo" onchange="document.getElementById('logo_img').src= window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label">Preview Logo: <span class="tx-danger">*</span></label>
                                <img src="img-upload/logo/<?=$genral_asoc['logo'];?>" id="logo_img" style="width: 150px;">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="copyright" >Copyright: <span class="tx-danger">*</span></label>
                                <input value="<?=$genral_asoc['copyright']?>" class="form-control" type="text" name="copyright"  id="copyright"  type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button name="submit" class="btn btn-info mg-r-5">Submit Form</button>
                        <button name="cancel" class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </form><!-- form-layout -->
            <!-- col-4 -->
        </div><!-- row -->
    </div>
</div>

<?php
require 'inc/footer.php';
?>