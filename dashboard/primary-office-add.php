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
      <h5>Add Head Office Address</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="primary-office-add-post.php" method="POST">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="office">Head Office Address: <span class="tx-danger">*</span></label>
                <input type="text" class="form-control" id="office" placeholder="Enter Head Office Addresses" name="office">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="email">Email address: <span class="tx-danger">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
            </div>


            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="number">Phone Number: <span class="tx-danger">*</span></label>
                <input type="number" class="form-control" id="number" placeholder="Phone Number" name="number">
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