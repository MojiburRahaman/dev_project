<?php
require 'inc/header.php';
require_once'../data.php';
require_once"session.php";
$id= $_GET['id'];
$profile_edit = "SELECT * FROM profile where id = $id";
$profile_edit_q= mysqli_query($data,$profile_edit);
$profile_assoc = mysqli_fetch_assoc($profile_edit_q);
$_SESSION['profile_edit_id'] = $id; 

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Edit Profile</h5>
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
                <form action="profile-edit-post.php" method="POST" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="name">User Name: <span class="tx-danger">*</span></label>
                                <input value="<?=$profile_assoc['user_name'];?>" type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="tagline">Tagline: <span class="tx-danger">*</span></label>
                                <input value="<?=$profile_assoc['tagline'];?>"  type="text" class="form-control" id="tagline" placeholder="Enter Tagline" name="tagline">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="about">About: <span class="tx-danger">*</span></label>
                                <textarea name="about" id="about" class="form-control"><?=$profile_assoc['about'];?> </textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="logo">User Image: <span class="tx-danger">*</span></label>
                                <input  type="file" name="user_image" class="form-control" id="logo" onchange="document.getElementById('user_image').src= window.URL.createObjectURL(this.files[0])">
                                
                                </span>
                                 <span class="tx-danger">*</span><span>Only png formate will allow</span>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="name">User Image Preview: </label>
                                <img id="user_image" style="width: 120px;" src="img-upload/user_image/<?=$profile_assoc['user_image'];?>">
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