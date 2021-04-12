<?php
require 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM portfolios WHERE id = $id";
$select_q = mysqli_query($data,$select);
$select_assoc = mysqli_fetch_assoc($select_q);
$_SESSION['portfoli_edit_id'] = $id;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Edit Portfolio</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="portfolio-edit-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="title">Title: <span class="tx-danger">*</span></label>
                                <input value="<?=$select_assoc['title']?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="catagory">Catagory: <span class="tx-danger">*</span></label>
                                <input value="<?=$select_assoc['catagory']?>" type="text" class="form-control" id="catagory" placeholder="Enter Tagline" name="catagory">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="thumbnail">Thumbnail: <span class="tx-danger">*</span></label>
                                <input  type="file" name="thumbnail" class="form-control" id="thumbnail" onchange="document.getElementById('thumbnail_img').src= window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label">Preview Thumbnail Image: <span class="tx-danger">*</span></label>
                                <img width="30" src="img-upload/portfolio_image/<?=$select_assoc['thumbnail']?>" id="thumbnail_img" style="width: 150px;"">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="featured">Featured Image: <span class="tx-danger">*</span></label>
                                <input type="file" name="featured" class="form-control" id="featured" onchange="document.getElementById('featured_img').src= window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label">Preview Featured Image: <span class="tx-danger">*</span></label>
                                <img width="30" src="img-upload/portfolio_image/featured_image/<?=$select_assoc['portfolio_image']?>" id="featured_img" style="width: 150px;"">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-control-label" for="summary">Summary: <span class="tx-danger">*</span></label>
                                <textarea id="summary" name="summary" class="form-control"><?=$select_assoc['summary']?></textarea>
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
</div>

<?php
require 'inc/footer.php';
?>