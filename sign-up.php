<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="assets/css/starlight.css">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Sign Up <span class="tx-info tx-normal">Page</span></div>
            <!-- <div class="tx-center mg-b-60">Professional Admin Template Design</div> -->
            <?php
            if (isset($_SESSION['email_exist'])) : ?>
                <div class="alert alert-danger alert-fadeout">
                    <span>
                        <?php
                        echo $_SESSION['email_exist'];
                        unset($_SESSION['email_exist']);
                        ?>
                    </span>
                </div>
            <?php endif
            ?>
            <form action="sign-up-post.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="name" class="form-control <?php if (isset($_SESSION['name_err'])) {
                                                                echo 'name_err';
                                                            } elseif (isset($_SESSION['name_alpha_err'])) {
                                                                echo 'name_alpha_err';
                                                            } ?>" id="name" placeholder="Enter name" name="name" value="<?php
                                                                                                                        if (isset($_SESSION['name'])) {
                                                                                                                            echo $_SESSION['name'];
                                                                                                                            unset($_SESSION['name']);
                                                                                                                        }
                                                                                                                        ?>">
                    <span class="text-danger">
                        <style>
                            .name_err {
                                border: 1px solid red;
                            }

                            .name_alpha_err {
                                border: 1px solid red;
                            }
                        </style>
                        <?php
                        if (isset($_SESSION['name_err'])) {
                            echo $_SESSION['name_err'];
                            unset($_SESSION['name_err']);
                        } elseif (isset($_SESSION['name_alpha_err'])) {
                            echo $_SESSION['name_alpha_err'];
                            unset($_SESSION['name_alpha_err']);
                        }
                        ?>
                    </span>
                </div>
                <div class="form-group ">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control <?php if (isset($_SESSION['email_err'])) {
                                                                echo 'email_err';
                                                            } elseif (isset($_SESSION['email_preg_err'])) {
                                                                echo 'email_preg_err';
                                                            } ?>" id="email" placeholder="Enter email" name="email" value="<?php
                                                                                                                            if (isset($_SESSION['email'])) {
                                                                                                                                echo $_SESSION['email'];
                                                                                                                                unset($_SESSION['email']);
                                                                                                                            }
                                                                                                                            ?>">
                    <span class="text-danger">
                        <style>
                            .email_err {
                                border: 1px solid red;
                            }

                            .email_preg_err {
                                border: 1px solid red;
                            }
                        </style>
                        <?php
                        if (isset($_SESSION['email_err'])) {
                            echo $_SESSION['email_err'];
                            unset($_SESSION['email_err']);
                        } elseif (isset($_SESSION['email_preg_err'])) {
                            echo $_SESSION['email_preg_err'];
                            unset($_SESSION['email_preg_err']);
                        }
                        ?>
                    </span>
                </div>
                <div class="form-group ">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control <?php if (isset($_SESSION['pwd_err'])) {
                                                                    echo 'pwd_err';
                                                                } elseif (isset($_SESSION['pwd_value_err'])) {
                                                                    echo 'pwd_value_err';
                                                                } elseif (isset($_SESSION['pwd_captial_err'])) {
                                                                    echo 'pwd_captial_err';
                                                                } elseif (isset($_SESSION['pwd_small_err'])) {
                                                                    echo 'pwd_small_err';
                                                                } elseif (isset($_SESSION['pwd_number_err'])) {
                                                                    echo 'pwd_number_err';
                                                                } elseif (isset($_SESSION['pwd_charecter_err'])) {
                                                                    echo 'pwd_charecter_err';
                                                                } ?>" id="pwd" placeholder="Enter password" name="pwd" value="<?php
                                                                                                                                if (isset($_SESSION['password'])) {
                                                                                                                                    echo $_SESSION['password'];
                                                                                                                                    unset($_SESSION['password']);
                                                                                                                                }
                                                                                                                                ?>">
                    <span class="text-danger">
                        <style>
                            .pwd_err {
                                border: 1px solid red;
                            }

                            .pwd_value_err {
                                border: 1px solid red;
                            }

                            .pwd_captial_err {
                                border: 1px solid red;
                            }

                            .pwd_small_err {
                                border: 1px solid red;
                            }

                            .pwd_number_err {
                                border: 1px solid red;
                            }

                            .pwd_charecter_err {
                                border: 1px solid red;
                            }
                        </style>
                        <?php
                        if (isset($_SESSION['pwd_err'])) {
                            echo $_SESSION['pwd_err'];
                            unset($_SESSION['pwd_err']);
                        } 
                        elseif (isset($_SESSION['pwd_value_err'])) {
                            echo $_SESSION['pwd_value_err'];
                            unset($_SESSION['pwd_value_err']);
                        }
                        elseif (isset($_SESSION['pwd_captial_err'])) {
                            echo $_SESSION['pwd_captial_err'];
                            unset($_SESSION['pwd_captial_err']);
                        } 
                        elseif (isset($_SESSION['pwd_small_err'])) {
                            echo $_SESSION['pwd_small_err'];
                            unset($_SESSION['pwd_small_err']);
                        } 
                        elseif (isset($_SESSION['pwd_number_err'])) {
                            echo $_SESSION['pwd_number_err'];
                            unset($_SESSION['pwd_number_err']);
                        } 
                        elseif (isset($_SESSION['pwd_charecter_err'])) {
                            echo $_SESSION['pwd_charecter_err'];
                            unset($_SESSION['pwd_charecter_err']);
                        }
                        ?>
                    </span>
                </div>
                <div class="form-group ">
                    <label for="confirm_pwd">Confirm Password:</label>
                    <input type="password" class="form-control <?php if (isset($_SESSION['confirm_password_err'])) {
                                                                    echo 'confirm_password_err';
                                                                } elseif (isset($_SESSION['password_confirm'])) {
                                                                    echo 'password_confirm';
                                                                } ?>" id="confirm_pwd" placeholder="Enter Confirm password" name="confirm_pwd" value="<?Php
                                                                                                                                                        if (isset($_SESSION['confirm_pwd'])) {
                                                                                                                                                            echo $_SESSION['confirm_pwd'];
                                                                                                                                                            unset($_SESSION['confirm_pwd']);
                                                                                                                                                        }
                                                                                                                                                        ?>">
                    <span class="text-danger">
                        <style>
                            .confirm_password_err {
                                border: 1px solid red;
                            }

                            .password_confirm {
                                border: 1px solid red;
                            }
                        </style>
                        <?php
                        if (isset($_SESSION['confirm_password_err'])) {
                            echo $_SESSION['confirm_password_err'];
                            unset($_SESSION['confirm_password_err']);
                        } elseif (isset($_SESSION['password_confirm'])) {
                            echo $_SESSION['password_confirm'];
                            unset($_SESSION['password_confirm']);
                        }
                        ?>
                    </span>
                </div><!-- form-group -->
                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
            </form>
            <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign In</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
    <script>
        $(function() {
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>

</body>

</html>