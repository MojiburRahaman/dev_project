<?php
require 'inc/header.php';
$id = $_GET['id'];

$primnary_offc = "SELECT *  FROM `offices` WHERE id = id";
$primnary_offc_q = mysqli_query($data, $primnary_offc);
$primnary_offc_assoc =  mysqli_fetch_assoc($primnary_offc_q);
$_SESSION['primary_edit_office_id'] = $id ;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Add Head Office Address</h5>
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
        <form action="primary-office-edit-post.php" method="POST">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="office">Head Office Address: <span class="tx-danger">*</span></label>
                <input value="<?=$primnary_offc_assoc['adress'];?>" type="text" class="form-control" id="office" placeholder="Enter Head Office Addresses" name="office">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="email">Email address: <span class="tx-danger">*</span></label>
                <input value="<?=$primnary_offc_assoc['email'];?>" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
            </div>


            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="number">Phone Number: <span class="tx-danger">*</span></label>
                <input value="<?=$primnary_offc_assoc['phone'];?>" type="number" class="form-control" id="number" placeholder="Phone Number" name="number">
              </div>
            </div>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
       <!-- form-layout -->
      </div>
      </form>
      <!-- col-4 -->
    </div><!-- row -->
  </div>
</div>

<?php
require 'inc/footer.php';
?>