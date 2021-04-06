<?php
require 'inc/header.php';

$user_edit_id = $_GET['user_edit_id'];

// edit user query
$user_edit_query = "SELECT * FROM `users` WHERE id= $user_edit_id ";
$edit_user = mysqli_query($data, $user_edit_query);
$edit_user_assoc = mysqli_fetch_assoc($edit_user);
$_SESSION['user_id'] = $user_edit_id;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    <span class="breadcrumb-item active">Edit User</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Form Layouts</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">

      <div class="form-layout">
        <form action="user-update.php" method="POST">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name">Name: <span class="tx-danger">*</span></label>
                <input type="name" value="<?= $edit_user_assoc['name']; ?>" class="form-control" id="name" placeholder="Enter Name" name="name">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="email">Email address: <span class="tx-danger">*</span></label>
                <input type="email" value="<?= $edit_user_assoc['email']; ?>" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
            </div><!-- col-4 -->
          </div><!-- row -->

          <div class="form-layout-footer">
            <button class="btn btn-info mg-r-5">Submit Form</button>
            <button class="btn btn-secondary">Cancel</button>
          </div><!-- form-layout-footer -->
        </form>
      </div><!-- form-layout -->
    </div><!-- card -->

  </div>

<?php
require 'inc/footer.php';
?>