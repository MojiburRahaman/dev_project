<?php
require_once '../data.php';
require_once 'session.php';
// active start
$url_explode = explode('/', $_SERVER['PHP_SELF']);
$explode_file = end($url_explode);
// active end
$users_id = $_SESSION['id'];
$select = "SELECT * FROM `users` WHERE `id`= '$users_id' ";
$users_query = mysqli_query($data, $select);
$query_users_assoc = mysqli_fetch_assoc($users_query);

// message start
$msg = "SELECT COUNT(*) as total FROM `message` WHERE status = 1";
$msg_q = mysqli_query($data, $msg);
$msg_assoc = mysqli_fetch_assoc($msg_q);

$contact = "SELECT * FROM `message` WHERE status = 1 ORDER BY id DESC";
$contact_q = mysqli_query($data, $contact);
// message end
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

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link href="../assets/lib/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
  <link href="../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="../assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

  <script src="../assets/lib/jquery/jquery.js"></script>
  <!-- Starlight CSS -->
  <link rel="stylesheet" href="../assets/css/starlight.css">
</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href="dashboard.php"><i class="icon ion-android-star-outline"></i> starlight</a></div>
  <div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="dashboard.php" class="sl-menu-link <?= $explode_file == 'dashboard.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="../index.php" target="_blank" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-globe tx-22" style="color: black;"></i>
          <span class="menu-item-label">Home Page</span>
        </div><!-- menu-item -->
      </a>
      <!-- sl-menu-link -->

      <!-- if role=admin -->
      <?php
      if ($query_users_assoc['role'] == 3) { ?>
        <a href="#" class="sl-menu-link <?= $explode_file == 'user-active-list.php' ? 'active' : '' ?> <?= $explode_file == 'user-inactive-list.php' ? 'active' : '' ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-users tx-20" style="color: black;"></i>
            <span class="menu-item-label">Users</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="user-active-list.php" class="nav-link <?= $explode_file == 'user-active-list.php' ? 'active' : '' ?>">
              <i class="menu-item-icon fa fa-user tx-20"></i>
              &nbsp;Active Users</a>
          </li>
          <li class="nav-item">
            <a href="user-inactive-list.php" class="nav-link <?= $explode_file == 'user-inactive-list.php' ? 'active' : '' ?>">
              <i class="menu-item-icon fa fa-user-times tx-20"></i>
              &nbsp; Inactive Users</a>
          </li>
        </ul>
      <?php }
      ?>
      <!-- if role=admin -->

      <a href="socials.php" class="sl-menu-link <?= $explode_file == 'socials.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-book tx-20" style="color: #0087A4;"></i>
          <span class="menu-item-label">All Socials</span>
        </div><!-- menu-item -->
      </a>
      <a href="services.php" class="sl-menu-link <?= $explode_file == 'services.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-cogs tx-20" style="color: #808080;"></i>
          <span class="menu-item-label">All Services</span>
        </div><!-- menu-item -->
      </a>
      <a href="portfolios.php" class="sl-menu-link <?= $explode_file == 'portfolios.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-images tx-20" style="color: #8FBC8F;"></i>
          <span class="menu-item-label">Portfolios</span>
        </div><!-- menu-item -->
      </a>
      <a href="reviews.php" class="sl-menu-link <?= $explode_file == 'reviews.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-star-half-alt tx-20" style="color: #DAA520;"></i>
          <span class="menu-item-label">Client Reviews</span>
        </div><!-- menu-item -->
      </a>
      <a href="messages.php" class="sl-menu-link <?= $explode_file == 'messages.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-envelope-open-text tx-20" style="color: black;"></i>
          <span class="menu-item-label">Messages</span>
        </div><!-- menu-item -->
      </a>
      <a href="partners.php" class="sl-menu-link <?= $explode_file == 'partners.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-handshake tx-20" style="color: black;"></i>
          <span class="menu-item-label">Partners</span>
        </div><!-- menu-item -->
      </a>
      <a href="#" class="sl-menu-link <?= $explode_file == 'general-settings.php' ? 'active' : '' ?> <?= $explode_file == 'profile.php' ? 'active' : '' ?> <?= $explode_file == 'offices.php' ? 'active' : '' ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-wrench tx-20"></i>
          <span class="menu-item-label">Settings</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column ">
        <li class="nav-item">
          <a href="general-settings.php" class="nav-link <?= $explode_file == 'general-settings.php' ? 'active' : '' ?>">
            <i class="menu-item-icon fa fa-cog tx-20"></i>
            &nbsp;General Settings</a>
        </li>
        <li class="nav-item">
          <a href="profile.php" class="nav-link <?= $explode_file == 'profile.php' ? 'active' : '' ?>">
            <i class="menu-item-icon fa fa-user tx-20"></i>
            &nbsp;Profile</a>
        </li>
        <li class="nav-item">
          <a href="offices.php" class="nav-link  <?= $explode_file == 'offices.php' ? 'active' : '' ?>">
            <i class="menu-item-icon fa fa-briefcase tx-20"></i>
            &nbsp;Office Address</a>
        </li>

      </ul>

    </div><!-- sl-sideleft-menu -->

    <br>
  </div><!-- sl-sideleft -->
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name">
              <?= $_SESSION['name'] ?>
            </span>
            <img src="img-upload/<?= $query_users_assoc['profile_img'] ?>" class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href="edit-profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href="change-password.php"><i class="fa fa-lock"></i> &nbsp; Change password</a></li>
              <li><a href="../log-out.php"><i class="icon ion-power"></i> Log Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      <div class="navicon-right">
        <a id="btnRightMenu" href="" class="pos-relative">
          <i class="icon ion-ios-bell-outline"></i>
          <!-- start: if statement -->
          <span class="square-8  <?= $msg_assoc['total'] > 0 ? 'bg-danger' : '' ?> " ></span>
          <!-- end: if statement -->
        </a>
      </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
  </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (<?= $msg_assoc['total'] ?>)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
      </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
        <div class="media-list">
          <?php
          if ($msg_assoc['total'] < 1) {
          ?>
            <div class="media-body">
              <p class="tx-13 mg-t-10 mg-b-0">No Messages</p>
            </div>
          <?php
          }
          ?>
          <!-- loop starts here -->
          <?php foreach ($contact_q as $key => $value) { ?>
            <a href="message-read.php?id=<?= $value['id']; ?>" class="media-list-link">
              <div class="media">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13"><?= $value['name'] ?></p>
                  <p class="tx-13 mg-t-10 mg-b-0"><?= $value['message'] ?> </p>
                </div>
              </div><!-- media -->
            </a>
          <?php }
          ?>
        </div><!-- media-list -->
        <?php
        if ($msg_assoc['total'] > 3) {
        ?>
          <div class="pd-15">
            <a href="messages.php" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        <?php
        }
        ?>
      </div><!-- #messages -->

      <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
        <div class="media-list">
          <!-- loop starts here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                <span class="tx-12">October 03, 2017 8:45am</span>
              </div>
            </div><!-- media -->
          </a>
          <!-- loop ends here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                <span class="tx-12">October 02, 2017 12:44am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">October 01, 2017 10:20pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">October 01, 2017 6:08pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                <span class="tx-12">September 27, 2017 6:45am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">September 28, 2017 11:30pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                <span class="tx-12">September 26, 2017 11:01am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">September 23, 2017 9:19pm</span>
              </div>
            </div><!-- media -->
          </a>
        </div><!-- media-list -->
      </div><!-- #notifications -->

    </div><!-- tab-content -->
  </div><!-- sl-sideright -->
  <!-- ########## END: RIGHT PANEL ########## --->