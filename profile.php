<?php

session_start();
require "includes/connection.php";
if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];
    $email = $_SESSION["u"]["email"];

    //$details_rs = Database::search("SELECT * FROM `user` INNER JOIN `profile_image` ON 
    //user.email=profile_image.user_email INNER JOIN `user_has_address` ON
    //user.email=user_has_address.user_email INNER JOIN `city` ON
    // user_has_address.city_id=city.id INNER JOIN `district` ON
    //city.district_id=district_id INNER JOIN `province` ON
    //district.province_id=province.id INNER JOIN `gender` ON 
    //gender.id=user.gender_id WHERE `email`='" . $email . "'");

    $details_rs = Database::search("SELECT*FROM `user` INNER JOIN `gender`ON
    gender.id=user.gender_id WHERE`email`='" . $email . "'");

    $image_rs = Database::search("SELECT*FROM`profile_image`WHERE`user_email`='" . $email . "'");

    $address_rs = Database::search("SELECT*FROM`user_has_address`INNER JOIN `city`ON
    user_has_address.city_id=city.id INNER JOIN `district`ON
    city.district_id=district.id INNER JOIN `province`ON
    district.province_id=province.id WHERE `user_email`='" . $email . "'");



    $data = $details_rs->fetch_assoc();
    $image_data = $image_rs->fetch_assoc();
    $address_data = $address_rs->fetch_assoc();
} else {

    if (isset($_SESSION["jsonData"])) {

        // Retrieve the JSON data from the session
        $retrievedData = $_SESSION['jsonData'];

        // Deserialize the retrieved data
        $deserializedData = json_decode($retrievedData, true);

        if (!empty($deserializedData)) {
            $output     = '<h2>Google Account Details</h2>';
            $output .= '<div class="ac-data">';
            $output .= '<img src="' . $deserializedData['picture'] . '">';
            $output .= '<p><b>Email:</b> ' . $deserializedData['email'] . '</p>';
            $output .= '<p><b>Logged in with:</b> Google Account</p>';
        }
    } else {
        header('Location: Signin.php');
        exit();
    }
}




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
                        
                        <li class="active">
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
                        <h4>Profile</h4>
                        <h6>User Profile</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="profile-set">
                            <div class="profile-head">
                            </div>
                            <div class="profile-top">
                                <div class="profile-content">
                                    <div class="profile-contentimg">
                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="assets/img/customer/customer5.jpg" alt="img" id="blah">
                                        <?php

                                        } else {
                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" alt="img" id="blah">
                                        <?php
                                        }

                                        ?>

                                        <div class="profileupload">
                                            <input type="file" id="imgInp">
                                            <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="profile-contentname">
                                        <h2><?php echo $data["fname"] . " " . $data["lname"]; ?></h2>
                                        <h4>Updates Your Photo and Personal Details.</h4>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a onclick="userpictureupdate();" class="btn btn-submit me-2">Save</a>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" readonly value="<?php echo $data["fname"]; ?>" id="fname" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" readonly value="<?php echo $data["lname"]; ?>" id="lname" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="<?php echo ($data["email"]); ?>" readonly />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" readonly value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" class=" pass-input" readonly value="<?php echo $data["password"]; ?>" readonly>
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" readonly value="<?php echo $data["gender_name"]; ?>" />
                                </div>
                            </div>

                            <?php

                            if (!empty($address_data["line1"])) {
                            ?>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input type="text" value="<?php echo ($address_data["line1"]); ?>" id="line1" />
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input type="text" id="line1">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php

                            if (!empty($address_data["line2"])) {
                            ?>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input type="text" value="<?php echo ($address_data["line2"]); ?>" id="line2" />
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input type="text" id="line2">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php

                            $province_rs = Database::search("SELECT*FROM`province`");
                            $district_rs = Database::search("SELECT*FROM`district`");
                            $city_rs =   Database::search("SELECT*FROM `city`");

                            ?>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="select" id="province">
                                        <option value="0">Select Province</option>
                                        <?php
                                        $province_num = $province_rs->num_rows;
                                        for ($x = 0; $x < $province_num; $x++) {
                                            $province_data = $province_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $province_data["id"]; ?>" <?php if (!empty($address_data["province_id"])) {
                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                ?>selected<?php
                                                                                                        }
                                                                                                    }


                                                                                                            ?>><?php echo $province_data["name"]; ?></option>

                                        <?php
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>District</label>
                                    <select class="select" id="district">
                                        <option value="0">Select District</option>
                                        <?php
                                        $district_num = $district_rs->num_rows;
                                        for ($x = 0; $x < $district_num; $x++) {
                                            $district_data = $district_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                if (!empty($address_data["district_id"])) {
                                                                                                    if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                ?>selected<?php
                                                                                                        }
                                                                                                    }

                                                                                                            ?>><?php echo $district_data["name"]; ?></option>

                                        <?php
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="select" id="city">
                                        <option value="0">Select City</option>
                                        <?php
                                        $city_num = $city_rs->num_rows;
                                        for ($x = 0; $x < $city_num; $x++) {
                                            $city_data = $city_rs->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                            if (!empty($address_data["city_id"])) {
                                                                                                if ($city_data["id"] == $address_data["city_id"]) {
                                                                                            ?>selected<?php
                                                                                                    }
                                                                                                }
                                                                                                        ?>><?php echo $city_data["name"]; ?></option>

                                        <?php

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            if (!empty($address_data["postal_code"])) {

                            ?>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Postal -Code</label>
                                        <input type="text" value="<?php echo $address_data["postal_code"]; ?>" id="pcode" />
                                    </div>
                                </div>
                            <?php

                            } else {
                            ?>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Postal -Code</label>
                                        <input type="text" id="pcode" />
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="col-12">
                                <a onclick="updateProfile();" class="btn btn-submit me-2">Submit</a>

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