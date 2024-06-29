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
                                <li ><a href="productlist.php" class="active">Product List</a></li>
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
                            <h4>Product List</h4>
                            <h6>Manage your products</h6>
                        </div>
                        <div class="page-btn">
                            <a href="addproduct.html" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
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
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Items </th>
                                            <th>change Status</th>
                                          
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php



                                        $product_rs = Database::search("SELECT * FROM`product` WHERE `user_email`='" . $email . "'");
                                        $product_num = $product_rs->num_rows;



                                        for ($x = 0; $x < $product_num; $x++) {
                                            $selected_data = $product_rs->fetch_assoc();


                                        ?>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <?php

                                                $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                                $product_img_data = $product_img_rs->fetch_assoc();
                                                ?>
                                                <td class="productimgname">
                                                    <a href="javascript:void(0);" class="product-img">
                                                        <img src="<?php echo $product_img_data["code"]; ?>" alt="product">
                                                    </a>
                                                    <a href="javascript:void(0);"><?php echo $selected_data["title"]; ?></a>
                                                </td>
                                                <td>Rs.<?php echo $selected_data["price"];?>.00</td>
                                                <td><?php echo $selected_data["qty"];?> Items available</td>
                                                <td>
                                                <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch"id="fd<?php echo $selected_data["id"];?>"
                                                                <?php if($selected_data["status_id"]==2)  {?>checked<?php }?> onclick="changeStatus(<?php echo $selected_data['id']?>);"/>
                                                               <label class="form-check-label fw-bold text-info" for="fd<?php echo $selected_data["id"];?>">
                                                               
                                                                <?php if ($selected_data["status_id"]==2){?>
                                                                   </label>
                                                                    <?php }else{?>
                                                                  
                                                                    <?php
                                                                    
                                                                    }

                                                                    ?>

                                                                </label>

                                                            </div>
                                                </td>
                                            
                                                <td>
                                                    
                                                    <a class="me-3" onclick="sendId(<?php echo $selected_data['id'];?>);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="confirm-text" href="javascript:void(0);">
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