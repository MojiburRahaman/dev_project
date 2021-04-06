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
            <h5>Change Password</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <div class="form-layout">
                <form action="change-password-post.php" method="POST">

                    <?php
                    if (isset($_SESSION['pwd_update'])) { ?>
                        <div class="alert alert-success ">
                            <span>
                                <?php
                                echo  $_SESSION['pwd_update'];
                                unset($_SESSION['pwd_update']);
                                ?>
                            </span>
                        </div>

                    <?php  }
                    ?>

                    <div class="col-xl-8 m-auto">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Current Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="current_pwd" type="password" class="form-control
                                     <?php if (isset($_SESSION['old_pass_empty'])) {
                                            echo 'old_pass_empty';
                                        } else if (isset($_SESSION['old_pass_match_err'])) {
                                            echo 'old_pass_match_err';
                                        }
                                        ?>" placeholder="Enter Current Password">
                                    <span class="text-danger">
                                        <style>
                                            .old_pass_empty {
                                                border: 1px solid red;
                                            }

                                            .old_pass_match_err {
                                                border: 1px solid red;
                                            }
                                        </style>

                                        <?php
                                        if (isset($_SESSION['old_pass_empty'])) {
                                            echo $_SESSION['old_pass_empty'];
                                            unset($_SESSION['old_pass_empty']);
                                        } elseif (isset($_SESSION['old_pass_match_err'])) {
                                            echo $_SESSION['old_pass_match_err'];
                                            unset($_SESSION['old_pass_match_err']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">New Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="new_pwd" type="Password" class="form-control
                                    <?php
                                    if (isset($_SESSION['new_pass_empty'])) {
                                        echo 'new_pass_empty';
                                    } elseif (isset($_SESSION['new_pwd_value_err'])) {
                                        echo 'new_pwd_value_err';
                                    } elseif (isset($_SESSION['new_pwd_captial_err'])) {
                                        echo 'new_pwd_captial_err';
                                    } elseif (isset($_SESSION['new_pwd_small_err'])) {
                                        echo 'new_pwd_small_err';
                                    } elseif (isset($_SESSION['new_pwd_number_err'])) {
                                        echo 'new_pwd_number_err';
                                    } elseif (isset($_SESSION['new_pwd_charecter_err'])) {
                                        echo 'new_pwd_charecter_err';
                                    }
                                    ?>" placeholder="Enter New Password">
                                    <span class="text-danger">
                                        <style>
                                            .new_pass_empty {
                                                border: 1px solid red;
                                            }

                                            .new_pwd_value_err {
                                                border: 1px solid red;
                                            }

                                            .new_pwd_captial_err {
                                                border: 1px solid red;
                                            }

                                            .new_pwd_small_err {
                                                border: 1px solid red;
                                            }

                                            .new_pwd_charecter_err {
                                                border: 1px solid red;
                                            }

                                            .new_pwd_charecter_err {
                                                border: 1px solid red;
                                            }
                                        </style>

                                        <?php
                                        if (isset($_SESSION['new_pass_empty'])) {
                                            echo $_SESSION['new_pass_empty'];
                                            unset($_SESSION['new_pass_empty']);
                                        } elseif (isset($_SESSION['new_pwd_value_err'])) {
                                            echo $_SESSION['new_pwd_value_err'];
                                            unset($_SESSION['new_pwd_value_err']);
                                        } elseif (isset($_SESSION['new_pwd_captial_err'])) {
                                            echo $_SESSION['new_pwd_captial_err'];
                                            unset($_SESSION['new_pwd_captial_err']);
                                        } elseif (isset($_SESSION['new_pwd_small_err'])) {
                                            echo $_SESSION['new_pwd_small_err'];
                                            unset($_SESSION['new_pwd_small_err']);
                                        } elseif (isset($_SESSION['new_pwd_number_err'])) {
                                            echo $_SESSION['new_pwd_number_err'];
                                            unset($_SESSION['new_pwd_number_err']);
                                        } elseif (isset($_SESSION['new_pwd_charecter_err'])) {
                                            echo $_SESSION['new_pwd_charecter_err'];
                                            unset($_SESSION['new_pwd_charecter_err']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="confirm_new_pwd" type="Password" class="form-control
                                    <?php
                                    if (isset($_SESSION['confirm_new_pass_empty'])) {
                                        echo 'confirm_new_pass_empty';
                                    } else if (isset($_SESSION['new_password_confirm'])) {
                                        echo 'new_password_confirm';
                                    }
                                    ?>" placeholder="Confirm Password">
                                    <span class="text-danger">
                                        <style>
                                            .confirm_new_pass_empty {
                                                border: 1px solid red;
                                            }

                                            .new_password_confirm {
                                                border: 1px solid red;
                                            }
                                        </style>

                                        <?php
                                        if (isset($_SESSION['confirm_new_pass_empty'])) {
                                            echo $_SESSION['confirm_new_pass_empty'];
                                            unset($_SESSION['confirm_new_pass_empty']);
                                        } elseif (isset($_SESSION['new_password_confirm'])) {
                                            echo $_SESSION['new_password_confirm'];
                                            unset($_SESSION['new_password_confirm']);
                                        }
                                        ?>
                                    </span>

                                </div>
                            </div>
                            <div class="form-layout-footer mg-t-30">
                                <button class="btn btn-info mg-r-5">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- card -->
                    </div><!-- col-6 -->
                </form><!-- form-layout -->
            </div>
        </div>
    </div>
        <?php
        require 'inc/footer.php';
        ?>