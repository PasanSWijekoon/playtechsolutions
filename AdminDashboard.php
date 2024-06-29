<?php

session_start();

require 'includes/connection.php';

if (isset($_SESSION["au"])) {

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
        <title>PlayTechSolutions - Admin Dashboard</title>

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
                            <li class="active">
                                <a href="AdminDashboard.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                        Dashboard</span> </a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                        Product</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="Adminproductlist.php">Product List</a></li>
                                    <li><a href="categorylist.php">Category List</a></li>
                                    <li><a href="addcategory.php">Add Category</a></li>
                                    <li><a href="brandlist.php">Brand List</a></li>
                                    <li><a href="addbrand.php">Add Brand List</a></li>
                                    <li><a href="modellist.php">Modal List</a></li>
                                    <li><a href="addmodel.php">Add Modal</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="customerlist.php"><img src="assets/img/icons/users1.svg" alt="img"><span>
                                        Users</span> </a>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="dash-widget">
                                <div class="dash-widgetimg">
                                    <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                                </div>
                                <?php

                                $today = date("Y-m-d");
                                $thismonth = date("m");
                                $thisyear = date("Y");

                                $a = "0";
                                $b = "0";
                                $c = "0";
                                $e = "0";
                                $f = "0";

                                $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                $invoice_num = $invoice_rs->num_rows;

                                for ($x = 0; $x < $invoice_num; $x++) {
                                    $invoice_data = $invoice_rs->fetch_assoc();

                                    $f = $f + $invoice_data["qty"]; //total qty

                                    $d = $invoice_data["date"];
                                    $splitDate = explode(" ", $d); //separate date from time
                                    $pdate = $splitDate[0]; //sold date

                                    if ($pdate == $today) {
                                        $a = $a + $invoice_data["total"];
                                        $c = $c + $invoice_data["qty"];
                                    }

                                    $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                    $pyear = $splitMonth[0]; //year
                                    $pmonth = $splitMonth[1]; //month

                                    if ($pyear == $thisyear) {
                                        if ($pmonth == $thismonth) {
                                            $b = $b + $invoice_data["total"];
                                            $e = $e + $invoice_data["qty"];
                                        }
                                    }
                                }

                                ?>
                                <div class="dash-widgetcontent">
                                    <h5>Rs <span class="counters" data-count="<?php echo $a; ?>">Rs. <?php echo $a; ?>.00</span></h5>
                                    <h6>Daily Earnings</h6>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="dash-widget dash1">
                                <div class="dash-widgetimg">
                                    <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                                </div>
                                <div class="dash-widgetcontent">
                                    <h5>RS <span class="counters" data-count="<?php echo $b; ?>">Rs. <?php echo $b; ?> .00</span></h5>
                                    <h6>Monthly Earnings</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="dash-widget dash2">
                                <div class="dash-widgetimg">
                                    <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                                </div>
                                <div class="dash-widgetcontent">
                                    <h5>RS <span class="counters" data-count="385656.50">385,656.50</span></h5>
                                    <h6>Total Sale Amount</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="dash-widget dash3">
                                <div class="dash-widgetimg">
                                    <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                                </div>
                                <div class="dash-widgetcontent">
                                    <h5>RS <span class="counters" data-count="40000.00">400.00</span></h5>
                                    <h6>Total Sale Amount</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 d-flex">
                            <div class="dash-count">
                                <?php
                                $user_rs = Database::search("SELECT * FROM `user`");
                                $user_num = $user_rs->num_rows;
                                ?>
                                <div class="dash-counts">
                                    <h4><?php echo $user_num; ?> Members</h4>
                                    <h5>Total Engagements</h5>
                                </div>
                                <div class="dash-imgs">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 d-flex">
                            <div class="dash-count das1">
                                <div class="dash-counts">
                                    <h4><?php echo $f; ?> Items</h4>
                                    <h5>Total Sellings</h5>
                                </div>
                                <div class="dash-imgs">
                                    <i data-feather="user-check"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 d-flex">
                            <div class="dash-count das2">
                                <div class="dash-counts">
                                    <h4><?php echo $e; ?> Items</h4>
                                    <h5>Monthly Sellings</h5>
                                </div>
                                <div class="dash-imgs">
                                    <i data-feather="file-text"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 d-flex">
                            <div class="dash-count das3">
                                <div class="dash-counts">
                                    <h4><?php echo $c; ?> Items</h4>
                                    <h5>Today Sellings</h5>
                                </div>
                                <div class="dash-imgs">
                                    <i data-feather="file"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 col-sm-12 col-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Purchase & Sales</h5>
                                    <div class="graph-sets">
                                        <ul>
                                            <li>
                                                <span>Sales</span>
                                            </li>
                                            <li>
                                                <span>Purchase</span>
                                            </li>
                                        </ul>
                                        <div class="dropdown">
                                            <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                2024 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">2024</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="sales_charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-12 col-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Mostly Sold Items</h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive dataview">
                                        <table class="table datatable ">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>items</th>
                                                    <th>Sale</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` 
FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY 
`value_occurence` DESC LIMIT 1");

                                                $freq_num = $freq_rs->num_rows;

                                                $freq_data = $freq_rs->fetch_assoc();

                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $freq_data["product_id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                $qty_rs = Database::search("SELECT SUM(`qty`) AS `qty_total` FROM `invoice` WHERE 
    `product_id`='" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                                                $qty_data = $qty_rs->fetch_assoc();

                                                ?>
                                                <tr>
                                                    <td class="productimgname">
                                                        <a href="javascript:void(0);" class="product-img">
                                                            <img src="<?php echo $image_data["code"]; ?>" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);"><?php echo $product_data["title"]; ?></a>
                                                    </td>
                                                    <td><?php echo $qty_data["qty_total"]; ?> items</td>
                                                    <td><?php echo $qty_data["qty_total"] * $product_data["price"]; ?> .00</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-0">
                        <div class="card-body">
                            <h4 class="card-title">Best Sellers</h4>
                            <div class="table-responsive dataview">
                                <table class="table datatable ">
                                    <thead>
                                        <tr>
                                            <th>User details</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE 
                                    `user_email`='" . $product_data["user_email"] . "'");
                                        $profile_data = $profile_rs->fetch_assoc();

                                        $user_rs1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                        $user_data1 = $user_rs1->fetch_assoc();

                                        ?>
                                        <tr>
                                       
                                            <td class="productimgname">
                                                        <a href="javascript:void(0);" class="product-img">
                                                            <img src="<?php echo $profile_data["path"]; ?>" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);"><?php echo $user_data1["fname"] . " " . $user_data1["lname"]; ?></a>
                                                    </td>
                                            <td><?php echo $user_data1["email"]; ?></td>
                                            <td><?php echo $user_data1["mobile"]; ?></td>
                                            
                                        </tr>

                                    </tbody>
                                </table>
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

        <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
        <script src="assets/plugins/apexchart/chart-data.js"></script>

        <script src="assets/js/script2.js"></script>
    </body>

    </html>

<?php

} else {

    header("location:Adminsignin.php");
    exit();
}

?>