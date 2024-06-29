<?php
session_start();
if (isset($_SESSION["u"])) {

    require "includes/connection.php";

    $umail = $_SESSION["u"]["email"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $umail . "'");
    $invoice_num = $invoice_rs->num_rows;

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
        <title>PlayTechSolutions - User Profile</title>

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css" />
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
                                <li ><a href="productlist.php" >Product List</a></li>
                                <li><a href="addproduct.php">Add Product</a></li>
                                <li><a href="addcolor.php">Add Color</a></li>
                                <li><a href="addmodeluser.php">Add Modal</a></li>
                            </ul>
                        </li>
                        <li class="active">
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

            <?php

            if ($invoice_num == 0) {

            ?>
                <div class="page-wrapper">
                    <div class="content">
                        <div class="page-header">
                            <div class="page-title">
                                <h4>PURCHASE LIST</h4>
                                <h6>you have not purchased any product yet..!</h6>
                            </div>
                            <div class="page-btn">
                                <a href="shop.php" class="btn btn-added">
                                    <img src="assets/img/icons/plus.svg" alt="img">Buy Products
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            } else {



            ?>


                <div class="page-wrapper">
                    <div class="content">
                        <div class="page-header">
                            <div class="page-title">
                                <h4>PURCHASE LIST</h4>
                                <h6>Manage your purchases</h6>
                            </div>
                            <div class="page-btn">
                                <a href="shop.php" class="btn btn-added">
                                    <img src="assets/img/icons/plus.svg" alt="img">Buy Products
                                </a>
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
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Enter Reference">
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Supplier</option>
                                                        <option>Supplier</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Status</option>
                                                        <option>Inprogress</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Payment Status</option>
                                                        <option>Payment Status</option>
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

                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>

                                            <tr>
                                                <th>
                                                    <label class="checkboxs">
                                                        <input type="checkbox" id="select-all">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </th>
                                                <th>Product Name</th>
                                                <th>Seller Details</th>
                                                <th>QTY</th>
                                                <th>Total</th>
                                                <th>Purchase Date & Time</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            for ($x = 0; $x < $invoice_num; $x++) {

                                                $invoice_data = $invoice_rs->fetch_assoc();

                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();

                                                $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                                $seller_data = $seller_rs->fetch_assoc();

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();



                                            ?>
                                                <tr>
                                                    <td>
                                                        <label class="checkboxs">
                                                            <input type="checkbox">
                                                            <span class="checkmarks"></span>
                                                        </label>
                                                    </td>
                                                    <td class="productimgname">
                                                        <a href="javascript:void(0);" class="product-img">
                                                            <img src="<?php echo $image_data["code"]; ?>" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);"><?php echo $product_data["title"]; ?></a>
                                                    </td>
                                                    <td><?php echo $seller_data["fname"] . " " . $seller_data["lname"]; ?></td>
                                                    <td><?php echo $invoice_data["qty"]; ?></td>
                                                    <td>Rs . <?php echo $invoice_data["total"]; ?>.00</td>
                                                    <td><?php echo $invoice_data["date"]; ?></td>

                                                    <td>
                                                        <a class="me-3" onclick="addFeedback(<?php echo $invoice_data['product_id'] ?>);">
                                                            <img src="assets/img/icons/plus.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="invoice.php?id=<?php echo $invoice_data['order_id']; ?>"target="_blank">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>

                         <!-- modal -->
                         <div class="modal" tabindex="-1" id="feedbackModal<?php echo $invoice_data['product_id']; ?>">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title">Add New Feedback</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="col-12">
                                                   <div class="row">
                                                      <div class="col-12">
                                                         <div class="row">
                                                            <div class="col-3">
                                                               <label class="form-label fw-bold">Type</label>
                                                            </div>
                                                            <div class="col-3">
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="type" id="type1">
                                                                  <label class="form-check-label fw-bold text-success" for="type1">
                                                                     Positive
                                                                  </label>
                                                               </div>
                                                            </div>
                                                            <div class="col-3">
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="type" id="type2" checked>
                                                                  <label class="form-check-label fw-bold text-warning" for="type2">
                                                                     Neutral
                                                                  </label>
                                                               </div>
                                                            </div>
                                                            <div class="col-3">
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="type" id="type3">
                                                                  <label class="form-check-label fw-bold text-danger" for="type3">
                                                                     Negative
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>

                                                      <div class="col-12">
                                                         <div class="row">
                                                            <div class="col-3">
                                                               <label class="form-label fw-bold">User's email</label>
                                                            </div>
                                                            <div class="col-9">
                                                               <input class="form-control" type="text" value="<?php echo $umail;?>" disabled/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-12 mt-2">
                                                         <div class="row">
                                                            <div class="col-3">
                                                               <label class="form-label fw-bold">Feedback</label>
                                                            </div>
                                                            <div class="col-9">
                                                               <textarea cols="50" rows="8" class="form-control" id="feed"></textarea>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="saveFeedback(<?php echo $invoice_data['product_id']; ?>);">Save changes</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- modal -->

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


               

            <?php

            } ?>
        </div>



        <script src="assets/js/jquery-3.6.0.min.js"></script>

        <script src="assets/js/feather.min.js"></script>

        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/bootstrap.bundle.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

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