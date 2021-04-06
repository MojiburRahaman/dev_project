<?php
require 'inc/header.php';

$profile_edit_id = $_SESSION['id'];

// edit user query
$user_edit_query = "SELECT * FROM `users` WHERE id= $profile_edit_id ";
$edit_user = mysqli_query($data, $user_edit_query);
$edit_user_assoc = mysqli_fetch_assoc($edit_user);
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
        <form action="edit-profile-post.php" method="POST" enctype="multipart/form-data">
          <div class="row mg-b-25">
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label" for="name">User Name: <span class="tx-danger">*</span></label>
                <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label" for="email">Email address: <span class="tx-danger">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label" for="profile_image">Profile Image: <span class="tx-danger">*</span></label>
                <input type="file" name="profile_pic" class="form-control" id="profile_image" onchange="document.getElementById('pre_image').src= window.URL.createObjectURL(this.files[0])">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label" for="name">Preview Imagw: </label>
                <img id="pre_image" style="width: 150px;" src="img-upload/<?= $edit_user_assoc['profile_img']; ?>">
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