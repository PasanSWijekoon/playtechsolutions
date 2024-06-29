<?php
require "includes/connection.php";
session_start();
if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="POS - Bootstrap Admin Template">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>PlayTechSolutions - User Profile</title>

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/css/animate.css">

        <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="assets/css/style2.css">
    </head>

    <body>
        <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div>

        <div class="main-wrapper">

            <div class="header">

                <div class="header-left active">
                    <a href="index.php" class="logo">
                        <img src="assets/img/logo.png" alt="">
                    </a>
                    <a href="index.php" class="logo-small">
                        <img src="assets/img/logo-small.png" alt="">
                    </a>
                    <a id="toggle_btn" href="javascript:void(0);">
                    </a>
                </div>

                <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <ul class="nav user-menu">



                    <li class="nav-item dropdown has-arrow flag-nav">
                        <a href="signoutProcess.php" class="nav-link">
                            <img src="assets/img/icons/log-out.svg" alt="" height="20"> Logout
                        </a>
                    </li>

                </ul>




                <div class="dropdown mobile-user-menu">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="generalsettings.html">Settings</a>
                        <a class="dropdown-item" href="signin.html">Logout</a>
                    </div>
                </div>

            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                        Home</span> </a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                        Product</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="productlist.php">Product List</a></li>
                                    <li><a href="addproduct.php">Add Product</a></li>
                                    <li><a href="addcolor.php">Add Color</a></li>
                                    <li><a href="addmodeluser.php">Add Modal</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="purchaselist.php"><img src="assets/img/icons/expense1.svg" alt="img"><span>
                                        My Orders</span> </a>
                            </li>
                            <li>
                                <a href="mysellings.php"><img src="assets/img/icons/quotation1.svg" alt="img"><span>
                                        My Sellings</span> </a>
                            </li>

                            <li>
                                <a href="cart.php"><img src="assets/img/icons/sales1.svg" alt="img"><span>
                                        Cart</span> </a>
                            </li>
                            <li>
                                <a href="whishlist.php"><img src="assets/img/icons/purchase1.svg" alt="img"><span>
                                        Whishlist</span> </a>
                            </li>
                            <li class="active">
                                <a href="chat.php"><i data-feather="columns"></i> <span>
                                        Chat</span> </a>
                            </li>

                            <li>
                                <a href="profile.php"><img src="assets/img/icons/users1.svg" alt="img"><span>
                                        Profile</span> </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content">
                    <div class="col-lg-12">
                        <div class="row chat-window">

                            <div class="col-lg-5 col-xl-4 chat-cont-left">
                                <div class="card mb-sm-3 mb-md-0 contacts_card flex-fill">
                                    <div class="card-header chat-search">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="search_btn"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" placeholder="Search" class="form-control search-chat rounded-pill">
                                        </div>
                                    </div>
                                    <div class="card-body contacts_body chat-users-list chat-scroll">
                                        <a href="javascript:void(0);" class="media d-flex active">
                                            <div class="media-img-wrap flex-shrink-0">
                                                <div class="avatar avatar-away">
                                                    <img src="assets/img/customer/customer1.jpg" alt="User Image" class="avatar-img rounded-circle">
                                                </div>
                                            </div>
                                            <div class="media-body flex-grow-1">
                                                <div>
                                                    <div class="user-name">Jeffrey Akridge</div>
                                                    <div class="user-last-chat">Hey, How are you?</div>
                                                </div>
                                                <div>
                                                    <div class="last-chat-time">2 min</div>
                                                    <div class="badge badge-success badge-pill">15</div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-7 col-xl-8 chat-cont-right">

                                <div class="card mb-0">
                                    <div class="card-header msg_head">
                                        <div class="d-flex bd-highlight">
                                            <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                            <div class="img_cont">
                                                <img class="rounded-circle user_img" src="assets/img/customer/profile2.jpg" alt="">
                                            </div>
                                            <div class="user_info">
                                                <span><strong id="receiver_name">Jeffrey Akridge</strong></span>
                                                <p class="mb-0">Messages</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body msg_card_body chat-scroll">
                                        <ul class="list-unstyled">
                                            <li class="media sent d-flex">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="assets/img/customer/customer5.jpg" alt="User Image" class="avatar-img rounded-circle">
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <div class="msg-box">
                                                        <div>
                                                            <p>Hello. What can I do for you?</p>
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>8:30 AM</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="media received d-flex">
                                                <div class="avatar flex-shrink-0">
                                                    <img src="assets/img/customer/profile2.jpg" alt="User Image" class="avatar-img rounded-circle">
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <div class="msg-box">
                                                        <div>
                                                            <p>I'm just looking around.</p>
                                                            <p>Will you tell me something about yourself?</p>
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>8:35 AM</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="msg-box">
                                                        <div>
                                                            <p>Are you there? That time!</p>
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>8:40 AM</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="msg-box">
                                                        <div>
                                                            <div class="chat-msg-attachments">
                                                                <div class="chat-attachment">
                                                                    <img src="assets/img/product/product12.jpg" alt="Attachment">
                                                                    <a href="" class="chat-attach-download">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="chat-attachment">
                                                                    <img src="assets/img/product/product13.jpg" alt="Attachment">
                                                                    <a href="" class="chat-attach-download">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>8:41 AM</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <div class="input-group">
                                            <input class="form-control type_msg mh-auto empty_check" id="msg" placeholder="Type your message...">
                                            <button class="btn btn-primary btn_send" onclick="sendChat();"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="searchpart">
            <div class="searchcontent">
                <div class="searchhead">
                    <h3>Search </h3>
                    <a id="closesearch"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                </div>
                <div class="searchcontents">
                    <div class="searchparts">
                        <input type="text" placeholder="search here">
                        <a class="btn btn-searchs">Search</a>
                    </div>
                    <div class="recentsearch">
                        <h2>Recent Search</h2>
                        <ul>
                            <li>
                                <h6><i class="fa fa-search me-2"></i> Settings</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-search me-2"></i> Report</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-search me-2"></i> Invoice</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-search me-2"></i> Sales</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery-3.6.0.min.js"></script>

        <script src="assets/js/feather.min.js"></script>

        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
        <script src="assets/plugins/apexchart/chart-data.js"></script>

        <script src="assets/js/script2.js"></script>
    </body>

    </html>


<?php

} else {

    header("Location:profile.php");
}

?>