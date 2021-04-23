<?php
require 'inc/header.php';
$id = $_GET['id'];
$select_data = "SELECT * FROM `reviews` WHERE id = $id";
$data_query = mysqli_query($data, $select_data);
$assoc=mysqli_fetch_assoc($data_query);
$_SESSION['review_edit'] = $id;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Add Client Review</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="review-edit-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="review">Review Image: <span class="tx-danger">*</span></label>
                                <input type="file" name="review" class="form-control" id="review" onchange="document.getElementById('review_img').src= window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label">Preview Review Image: <span class="tx-danger">*</span></label>
                                <img  height="100%" width="100%" src="img-upload/review_image/<?= $assoc['image']; ?>" id="review_img" style="width: 150px;"">
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

<?php
require 'inc/footer.php';
?>