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
            <h5>Add Profile</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="profile-add-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="name">User Name: <span class="tx-danger">*</span></label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="tagline">Tagline: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" id="tagline" placeholder="Enter Tagline" name="tagline">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="about">About: <span class="tx-danger">*</span></label>
                                <textarea name="about" id="about" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="logo">User Image: <span class="tx-danger">*</span></label>
                                <input type="file" name="user_image" class="form-control" id="logo" onchange="document.getElementById('user_image').src= window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="name">User Image Preview: </label>
                                <img id="user_image" style="width: 120px;">
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