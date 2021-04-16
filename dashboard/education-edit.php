<?php
require 'inc/header.php';
$id = $_GET['id'];
$education = "SELECT * FROM `educations` WHERE id = $id";
$education_q = mysqli_query($data, $education);
$education_assoc = mysqli_fetch_assoc($education_q);
$_SESSION['edu_id'] = $id;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Add Educations</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="education-edit-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title">Title: <span class="tx-danger">*</span></label>
                                <input value="<?=strtoupper($education_assoc['title'])?>" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="year">Year: <span class="tx-danger">*</span></label>
                                <input value="<?=$education_assoc['year']?>" type="number" class="form-control" id="catagory" placeholder="Enter Year" name="year">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="progess">Progress: <span class="tx-danger">*</span></label>
                                <input value="<?=$education_assoc['progress']?>" type="number" class="form-control" id="progess" placeholder="Enter Progress" name="progess">
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