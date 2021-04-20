<?php
require 'inc/header.php';
require_once '../data.php';
$id = $_GET['id'];
$select = "SELECT * FROM socials WHERE id =$id";
$q = mysqli_query($data, $select);
$q_assoc =  mysqli_fetch_assoc($q);
$_SESSION['social_edit_id'] = $id;
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Add Social</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <div class="form-layout">
                <form action="social-edit-post.php" method="POST">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name: <span class="tx-danger">*</span></label>
                                <input value="<?= ucwords($q_assoc['name']); ?>" type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="icon">Icon: <span class="tx-danger">*</span></label>
                                <select name="icon" id="icon" class="form-control ">
                                <option value="<?= $q_assoc['icon']; ?>">
                                        <?php
                                        if ($q_assoc['icon'] == "fab fa-facebook") {
                                            echo "Facebook";
                                        } elseif ($q_assoc['icon'] == "fab fa-facebook-messenger") {
                                            echo "Messenger";
                                        } elseif ($q_assoc['icon'] == "fab fa-twitter") {
                                            echo "Twitter";
                                        } elseif ($q_assoc['icon'] == "fab fa-linkedin") {
                                            echo "Linkedin";
                                        } elseif ($q_assoc['icon'] == "fab fa-instagram") {
                                            echo "Instagram";
                                        }
                                        elseif ($q_assoc['icon'] == "fab fa-Github") {
                                            echo "Github";
                                        }
                                        ?>
                                </option>
                                    <option value="">Select Icon</option>
                                    <option value="fab fa-facebook">Facebook</option>
                                    <option value="fab fa-facebook-messenger">Messenger</option>
                                    <option value="fab fa-twitter">Twitter</option>
                                    <option value="fab fa-instagram">Instagram</option>
                                    <option value="fab fa-linkedin">LinkedIn</option>
                                    <option value="fab fa-Github">Github</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="link">Link: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" value="<?= $q_assoc['link']; ?>" id="link" placeholder="Enter Link" name="link">
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