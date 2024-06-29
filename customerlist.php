﻿<?php

session_start();
require "includes/connection.php";


if (isset($_SESSION["au"])) {

    $email = $_SESSION["au"]["email"];
    $pageno;


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
        <title>PlayTechSolutions - Customer List</title>

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/css/animate.css">

        <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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

                            <li class="active">
                                <a href="customerlist.php"><img src="assets/img/icons/users1.svg" alt="img"><span>
                                        Users</span> </a>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content">
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Users List</h4>
                            <h6>Manage your Users</h6>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-top">
                                <div class="search-set">
                                    <div class="search-path">
                                        <a class="btn btn-filter" id="filter_search">
                                            <img src="assets/img/icons/filter.svg" alt="img">
                                            <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                        </a>
                                    </div>
                                    <div class="search-input">
                                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                                    </div>
                                </div>
                                <div class="wordset">
                                    <ul>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card" id="filter_inputs">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Customer Code">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Customer Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12  ms-auto">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table  datanew">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="checkboxs">
                                                    <input type="checkbox" id="select-all">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Register Date</th>
                                            <th>Block User</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "SELECT * FROM `user`";


                                        $user_rs = Database::search($query);
                                        $user_num = $user_rs->num_rows;



                                        for ($x = 0; $x < $user_num; $x++) {
                                            $selected_data = $user_rs->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <?php
                                                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $selected_data["email"] . "'");
                                                $image_data = $image_rs->fetch_assoc();
                                                ?>
                                                <td>

                                                    <a href="javascript:void(0);"><?php echo ($selected_data["fname"] . " " . $selected_data["lname"]); ?></a>
                                                </td>

                                                <td><?php echo ($selected_data["email"]); ?></td>
                                                <td><?php echo ($selected_data["mobile"]); ?></td>
                                                <td><?php echo ($selected_data["joined_date"]); ?> </td>

                                                <td><?php
                                                    if ($selected_data["status"] == 1) {
                                                    ?>
                                                        <button class="btn btn-danger" id="ub<?php echo ($selected_data['email']); ?>" onclick="blockUser('<?php echo ($selected_data['email']); ?>');">Block</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button class="btn btn-success" id="ub<?php echo ($selected_data['email']); ?>" onclick="blockUser('<?php echo ($selected_data['email']); ?>');">Unblock</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>

                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Show Payments</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Reference</th>
                                        <th>Amount </th>
                                        <th>Paid By </th>
                                        <th>Paid By </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bor-b1">
                                        <td>2022-03-07 </td>
                                        <td>INV/SL0101</td>
                                        <td>$ 1500.00 </td>
                                        <td>Cash</td>
                                        <td>
                                            <a class="me-2" href="javascript:void(0);">
                                                <img src="assets/img/icons/printer.svg" alt="img">
                                            </a>
                                            <a class="me-2" href="javascript:void(0);" data-bs-target="#editpayment" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                <img src="assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <a class="me-2 confirm-text" href="javascript:void(0);">
                                                <img src="assets/img/icons/delete.svg" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Payment</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <div class="input-group">
                                        <input type="text" value="2022-03-07" class="datetimepicker">
                                        <a class="scanner-set input-group-text">
                                            <img src="assets/img/icons/datepicker.svg" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input type="text" value="INV/SL0101">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Received Amount</label>
                                    <input type="text" value="1500.00">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Paying Amount</label>
                                    <input type="text" value="1500.00">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Payment type</label>
                                    <select class="select">
                                        <option>Cash</option>
                                        <option>Online</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-submit">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Payment</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <div class="input-group">
                                        <input type="text" value="2022-03-07" class="datetimepicker">
                                        <a class="scanner-set input-group-text">
                                            <img src="assets/img/icons/datepicker.svg" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input type="text" value="INV/SL0101">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Received Amount</label>
                                    <input type="text" value="1500.00">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Paying Amount</label>
                                    <input type="text" value="1500.00">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Payment type</label>
                                    <select class="select">
                                        <option>Cash</option>
                                        <option>Online</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-submit">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="assets/js/jquery-3.6.0.min.js"></script>

        <script src="assets/js/feather.min.js"></script>

        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <script src="assets/plugins/select2/js/select2.min.js"></script>

        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

        <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

        <script src="assets/js/script2.js"></script>
    </body>

    </html>

<?php

} else {
    header("location:Adminsignin.php");
}

?>