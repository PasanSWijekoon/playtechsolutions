<?php

session_start();
require "includes/connection.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>PlayTechSolutions - Add Model</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

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
                                <li><a href="addmodeluser.php" class="active">Add Modal</a></li>
                              
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
                        <li>
                            <a href="chat.php"><i data-feather="columns"></i> <span>
                            Chat</span> </a>
                        </li>
                        
                        <li >
                            <a href="profile.php"><img src="assets/img/icons/users1.svg" alt="img"><span>
                            Profile</span> </a>
                        </li>
                        
                       
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Modal ADD</h4>
                        <h6>Create new Modal</h6>
                    </div>
                </div>


                <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Parent Brand</label>
                                        <select class="select" id="c1">
                                            <option value="0">Brand</option>
                                            <?php

                                            $category_rs = Database::search("SELECT*FROM `brand`");
                                            $category_num = $category_rs->num_rows;
                                            for ($x = 0; $x < $category_num; $x++) {
                                                $category_data = $category_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Modal Name</label>
                                        <input type="text" id="b">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <a onclick="saveModal();" class="btn btn-submit me-2">Submit</a>
                                    <a href="modellist.php" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
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

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script2.js"></script>
</body>

</html>

