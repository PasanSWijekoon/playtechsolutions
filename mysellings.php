<?php

session_start();
require "includes/connection.php";


if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
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
        <title>PlayTechSolutions - Product List</title>

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
                                    <li><a href="addmodeluser.php">Add Modal</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="purchaselist.php"><img src="assets/img/icons/expense1.svg" alt="img"><span>
                                        My Orders</span> </a>
                            </li>
                            <li class="active">
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
                    <div class="page-header">
                        <div class="page-title">
                            <h4>My Sellings</h4>
                            <h6>Manage your Received Orders</h6>
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

                            <div class="card mb-0" id="filter_inputs">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select class="select">
                                                            <option>Choose Product</option>
                                                            <option>Macbook pro</option>
                                                            <option>Orange</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select class="select">
                                                            <option>Choose Category</option>
                                                            <option>Computers</option>
                                                            <option>Fruits</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select class="select">
                                                            <option>Choose Sub Category</option>
                                                            <option>Computer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <select class="select">
                                                            <option>Brand</option>
                                                            <option>N/D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg col-sm-6 col-12 ">
                                                    <div class="form-group">
                                                        <select class="select">
                                                            <option>Price</option>
                                                            <option>150.00</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
                                                    </div>
                                                </div>
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
                                            <th>Invoice Id</th>
                                            <th>Product Name</th>
                                            <th>Buyer</th>
                                            <th>Amount </th>
                                            <th>Qty</th>
                                            <th>change Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "SELECT * FROM `invoice`";


                                        $invoice_rs = Database::search($query);
                                        $invoice_num = $invoice_rs->num_rows;



                                        for ($x = 0; $x < $invoice_num; $x++) {
                                            $selected_data = $invoice_rs->fetch_assoc();

                                        ?>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td><?php echo $selected_data["id"]; ?></td>

                                                <?php
                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $selected_data["product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();
                                                ?>
                                                <td class="productimgname">
                                                    <?php

                                                    $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                    $product_img_data = $product_img_rs->fetch_assoc();
                                                    ?>
                                                    <a href="javascript:void(0);" class="product-img">
                                                        <img src="<?php echo $product_img_data["code"]; ?>" alt="product">
                                                    </a>
                                                    <a href="javascript:void(0);"><?php echo $product_data["title"]; ?></a>
                                                </td>
                                                <?php
                                                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $selected_data["user_email"] . "'");
                                                $user_data = $user_rs->fetch_assoc();
                                                ?>
                                                <td><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></td>
                                                <td>Rs. <?php echo $selected_data["total"]; ?> .00</td>
                                                <td><?php echo $selected_data["qty"]; ?></td>

                                                <td><?php
                                                    if ($selected_data["status"] == 0) {
                                                    ?>
                                                        <button class="btn btn-success fw-bold  mt-1 mb-1" onclick="changeorderStatus('<?php echo $selected_data['id']; ?>');" id="btn<?php echo $selected_data['id']; ?>">Confirm Order</button>
                                                    <?php
                                                    } elseif ($selected_data["status"] == 1) {
                                                    ?>
                                                        <button class="btn btn-warning fw-bold  mt-1 mb-1" onclick="changeorderStatus('<?php echo $selected_data['id']; ?>');" id="btn<?php echo $selected_data['id']; ?>">Packing</button>
                                                    <?php
                                                    } elseif ($selected_data["status"] == 2) {
                                                    ?>
                                                        <button class="btn btn-info fw-bold  mt-1 mb-1" onclick="changeorderStatus('<?php echo $selected_data['id']; ?>');" id="btn<?php echo $selected_data['id']; ?>">Dispatch</button>
                                                    <?php
                                                    } elseif ($selected_data["status"] == 3) {
                                                    ?>
                                                        <button class="btn btn-primary fw-bold  mt-1 mb-1" onclick="changeorderStatus('<?php echo $selected_data['id']; ?>');" id="btn<?php echo $selected_data['id']; ?>">Shipping</button>
                                                    <?php
                                                    } elseif ($selected_data["status"] == 4) {
                                                    ?>
                                                        <button class="btn btn-danger fw-bold  mt-1 mb-1 disabled" onclick="changeorderStatus('<?php echo $selected_data['id']; ?>');" id="btn<?php echo $selected_data['id']; ?>">Deliverd</button>
                                                    <?php
                                                    }
                                                    ?>
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

<?php

} else {
    header("Location:Signin.php");
}

?>