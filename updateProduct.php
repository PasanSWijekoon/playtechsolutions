<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>PlayTechSolutions - Add Product</title>

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

    <?php
    session_start();
    require "includes/connection.php";

    if (isset($_SESSION["u"])) {
        if (isset($_SESSION["p"])) {
            $product = $_SESSION["p"];

    ?>
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
                                <li><a href="addproduct.php" class="active">Add Product</a></li>
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
                                <h4>Product Add</h4>
                                <h6>Create new product</h6>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Product Name</label>

                                            <input type="text" value="<?php echo ($product["title"]) ?>" id="t" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="select" disabled>

                                                <?php


                                                $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                                $category_data = $category_rs->fetch_assoc();

                                                ?>

                                                <option><?php echo ($category_data["name"]); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <select class="select" disabled>
                                                <?php
                                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` IN
                                                    (SELECT `brand_id` FROM `brand_has_model` WHERE `id`='" . $product["brand_has_model_id"] . "') ");
                                                $brand_data = $brand_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo ($brand_data["name"]); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Model</label>
                                            <select class="select" disabled>

                                                <?php
                                                $model_rs = Database::search("SELECT * FROM `model` WHERE `id` IN
                                                    (SELECT `model_id` FROM `brand_has_model` WHERE `id`='" . $product["brand_has_model_id"] . "') ");
                                                $model_data = $model_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo ($model_data["name"]); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Colour</label>
                                            <select class="select" id="clr" disabled>
                                                <?php

                                                $color_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product["colour_id"] . "'");
                                                $color_data = $color_rs->fetch_assoc();

                                                ?>

                                                <option><?php echo ($color_data["name"]) ?></option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" value="<?php echo ($product["qty"]); ?>" min="0" id="q" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="d-block">Select Product Condition:</label>
                                            <?php

                                            if ($product["condition_id"] == 1) {
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="b" name="c" checked disabled />
                                                    <label class="form-check-label " for="b">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="u" name="c" disabled/>
                                                    <label class="form-check-label" for="u">Used</label>
                                                </div>

                                            <?php

                                            } else {
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="b" name="c" disabled />
                                                    <label class="form-check-label " for="b">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="u" name="c" checked disabled/>
                                                    <label class="form-check-label" for="u">Used</label>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="d"><?php echo($product["description"]); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Cost Per Item</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-text">Rs</span>
                                                <input type="text" class="form-control" value="<?php echo($product["price"]); ?>" disabled aria-label="Amount (to the nearest dollar)" id="cost">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group row">
                                            <label>Delivery Cost Within Colombo</label>
                                            <div>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rs</span>
                                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo($product["delivery_fee_colombo"]); ?>" id="dwc">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group row">
                                            <label>Delivery Cost Out of Colombo</label>
                                            <div>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rs</span>
                                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo($product["delivery_fee_other"]); ?>" id="doc">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label> Product Gallery</label>
                                            </div>
                                            <div class="offset-lg-3 col-12 col-lg-6">
                                            <?php
                                                
                                                $img = array();
                                                $img [0] = "assets/img/icons/upload.svg";
                                                $img [1] = "assets/img/icons/upload.svg";
                                                $img [2] = "assets/img/icons/upload.svg";

                                                $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$product["id"]."'");
                                                $images_num = $images_rs->num_rows;

                                                for($x = 0;$x < $images_num;$x ++){
                                                    $images_data = $images_rs->fetch_assoc();
                                                    $img [$x] = $images_data["code"];
                                                }
                                                
                                                ?>
                                                <div class="row">
                                                    <div class="col-4 image-upload">
                                                        <img src="<?php echo($img[0]); ?>"  class="img-fluid" style="width: 250px;" id="i0" />

                                                    </div>
                                                    <div class="col-4 image-upload">
                                                        <img src="<?php echo($img[1]); ?>" class="img-fluid" style="width: 250px;" id="i1" />

                                                    </div>
                                                    <div class="col-4 image-upload">
                                                        <img src="<?php echo($img[2]); ?>" class="img-fluid" style="width: 250px;" id="i2" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                                <input type="file" class="d-none" id="imageuploader" multiple />
                                                <label for="imageuploader" onclick="changeProductImage();" class="col-12 btn btn-primary">Upload Images</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <a onclick="updateProduct();" class="btn btn-submit me-2">Submit</a>
                                        <a href="productlist.php" class="btn btn-cancel">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    <?php

        } else {
            header("Location:productlist.php");
        }
    } else {
        header("Location:Signin.php");
    }

    ?>


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